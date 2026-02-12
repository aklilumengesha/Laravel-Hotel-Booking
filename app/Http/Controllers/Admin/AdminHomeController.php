<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index()
    {
        try {
            // Basic Statistics
            $total_completed_orders = Order::where('status','Completed')->count();
            $total_pending_orders = Order::where('status','Pending')->count();
            $total_active_customers = Customer::where('status',1)->count();
            $total_pending_customers = Customer::where('status',0)->count();
            $total_rooms = Room::count();
            $total_subscribers = Subscriber::where('status',1)->count();

            // Revenue Statistics
            $driver = DB::connection()->getDriverName();
            
            if ($driver === 'pgsql') {
                // PostgreSQL - cast text to numeric
                $total_revenue = Order::where('status','Completed')
                    ->selectRaw('COALESCE(SUM(paid_amount::numeric), 0) as total')
                    ->value('total') ?? 0;
                    
                $monthly_revenue = Order::where('status','Completed')
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->selectRaw('COALESCE(SUM(paid_amount::numeric), 0) as total')
                    ->value('total') ?? 0;
                
                $today_revenue = Order::where('status','Completed')
                    ->whereDate('created_at', Carbon::today())
                    ->selectRaw('COALESCE(SUM(paid_amount::numeric), 0) as total')
                    ->value('total') ?? 0;
            } else {
                // MySQL
                $total_revenue = Order::where('status','Completed')->sum('paid_amount') ?? 0;
                $monthly_revenue = Order::where('status','Completed')
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->sum('paid_amount') ?? 0;
                
                $today_revenue = Order::where('status','Completed')
                    ->whereDate('created_at', Carbon::today())
                    ->sum('paid_amount') ?? 0;
            }

            // Monthly Orders Chart Data (Last 12 months)
            $monthly_orders = [];
            $monthly_revenue_chart = [];
            for ($i = 11; $i >= 0; $i--) {
                $date = Carbon::now()->subMonths($i);
                $month_name = $date->format('M Y');
                
                $orders_count = Order::whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count();
                
                if ($driver === 'pgsql') {
                    $revenue_amount = Order::where('status','Completed')
                        ->whereMonth('created_at', $date->month)
                        ->whereYear('created_at', $date->year)
                        ->selectRaw('COALESCE(SUM(paid_amount::numeric), 0) as total')
                        ->value('total') ?? 0;
                } else {
                    $revenue_amount = Order::where('status','Completed')
                        ->whereMonth('created_at', $date->month)
                        ->whereYear('created_at', $date->year)
                        ->sum('paid_amount') ?? 0;
                }
                
                $monthly_orders[] = [
                    'month' => $month_name,
                    'orders' => $orders_count
                ];
                
                $monthly_revenue_chart[] = [
                    'month' => $month_name,
                    'revenue' => $revenue_amount
                ];
            }

            // Room Occupancy Data
            $room_occupancy = Room::select('name', 'id')->get()->map(function($room) {
                $bookings_count = DB::table('booked_rooms')
                    ->where('room_id', $room->id)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->count();
                
                return [
                    'name' => $room->name,
                    'bookings' => $bookings_count
                ];
            });

            // Customer Growth (Last 6 months)
            $customer_growth = [];
            for ($i = 5; $i >= 0; $i--) {
                $date = Carbon::now()->subMonths($i);
                $month_name = $date->format('M Y');
                
                $customers_count = Customer::whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count();
                
                $customer_growth[] = [
                    'month' => $month_name,
                    'customers' => $customers_count
                ];
            }

            // Recent Orders
            $orders = Order::with('customer')->orderBy('id','desc')->limit(5)->get();

            // Top Performing Rooms
            $top_rooms = collect([]);
            try {
                $driver = DB::connection()->getDriverName();
                
                if ($driver === 'pgsql') {
                    $top_rooms = DB::table('booked_rooms')
                        ->join('rooms', 'booked_rooms.room_id', '=', 'rooms.id')
                        ->join('orders', 'booked_rooms.order_no', '=', 'orders.order_no')
                        ->select('rooms.name', DB::raw('COUNT(DISTINCT booked_rooms.id) as bookings_count'), DB::raw('COALESCE(SUM(orders.paid_amount::numeric), 0) as total_revenue'))
                        ->where('orders.status', 'Completed')
                        ->groupBy('rooms.id', 'rooms.name')
                        ->orderBy('bookings_count', 'desc')
                        ->limit(5)
                        ->get();
                } else {
                    $top_rooms = DB::table('booked_rooms')
                        ->join('rooms', 'booked_rooms.room_id', '=', 'rooms.id')
                        ->join('orders', 'booked_rooms.order_no', '=', 'orders.order_no')
                        ->select('rooms.name', DB::raw('COUNT(DISTINCT booked_rooms.id) as bookings_count'), DB::raw('COALESCE(SUM(CAST(orders.paid_amount as DECIMAL(10,2))), 0) as total_revenue'))
                        ->where('orders.status', 'Completed')
                        ->groupBy('rooms.id', 'rooms.name')
                        ->orderBy('bookings_count', 'desc')
                        ->limit(5)
                        ->get();
                }
            } catch (\Exception $e) {
                \Log::error('Top rooms query failed: ' . $e->getMessage());
            }

            // Order Status Distribution
            $order_status = [
                ['status' => 'Completed', 'count' => $total_completed_orders],
                ['status' => 'Pending', 'count' => $total_pending_orders],
            ];

            return view('admin.home', compact(
                'total_completed_orders','total_pending_orders','total_active_customers',
                'total_pending_customers','total_rooms','total_subscribers','orders',
                'total_revenue','monthly_revenue','today_revenue','monthly_orders',
                'monthly_revenue_chart','room_occupancy','customer_growth','top_rooms',
                'order_status'
            ));
        } catch (\Exception $e) {
            \Log::error('Admin home error: ' . $e->getMessage());
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
