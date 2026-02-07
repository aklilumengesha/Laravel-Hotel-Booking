<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;

class AdminCustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::withCount('reviews');
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                  ->orWhere('email', 'like', '%'.$search.'%')
                  ->orWhere('phone', 'like', '%'.$search.'%');
            });
        }
        
        // Status filter
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);
        
        $customers = $query->paginate(15);
        
        return view('admin.customer', compact('customers'));
    }

    public function change_status($id)
    {
        $customer_data = Customer::where('id',$id)->first();
        if($customer_data->status == 1) {
            $customer_data->status = 0;
        } else {
            $customer_data->status = 1;
        }
        $customer_data->update();
        return redirect()->back()->with('success', 'Status changed successfully.');
    }
    
    public function view($id)
    {
        $customer = Customer::with('reviews')->findOrFail($id);
        $orders = Order::where('customer_id', $id)->orderBy('created_at', 'desc')->get();
        return view('admin.customer_view', compact('customer', 'orders'));
    }
    
    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        
        // Delete customer photo if exists
        if($customer->photo != '' && file_exists(public_path('uploads/'.$customer->photo))) {
            unlink(public_path('uploads/'.$customer->photo));
        }
        
        $customer->delete();
        
        return redirect()->route('admin.customer')->with('success', 'Customer deleted successfully.');
    }
    
    public function bulk_delete(Request $request)
    {
        $ids = $request->ids;
        
        if(empty($ids)) {
            return redirect()->back()->with('error', 'Please select customers to delete.');
        }
        
        $customers = Customer::whereIn('id', $ids)->get();
        
        foreach($customers as $customer) {
            if($customer->photo != '' && file_exists(public_path('uploads/'.$customer->photo))) {
                unlink(public_path('uploads/'.$customer->photo));
            }
            $customer->delete();
        }
        
        return redirect()->back()->with('success', count($ids) . ' customer(s) deleted successfully.');
    }
    
    public function export()
    {
        $customers = Customer::all();
        
        $filename = "customers_" . date('Y-m-d') . ".csv";
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        $output = fopen('php://output', 'w');
        
        fputcsv($output, ['ID', 'Name', 'Email', 'Phone', 'Country', 'Address', 'City', 'State', 'Zip', 'Status', 'Registered Date']);
        
        foreach($customers as $customer) {
            fputcsv($output, [
                $customer->id,
                $customer->name,
                $customer->email,
                $customer->phone,
                $customer->country,
                $customer->address,
                $customer->city,
                $customer->state,
                $customer->zip,
                $customer->status == 1 ? 'Active' : 'Inactive',
                $customer->created_at->format('Y-m-d H:i:s')
            ]);
        }
        
        fclose($output);
        exit();
    }
}
