<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;

class RoomSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $priceFilter = '';
    public $guestFilter = '';
    public $sortBy = 'name';

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'priceFilter' => ['except' => ''],
        'guestFilter' => ['except' => ''],
        'sortBy' => ['except' => 'name'],
    ];

    // Reset pagination when filters change
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPriceFilter()
    {
        $this->resetPage();
    }

    public function updatedGuestFilter()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->priceFilter = '';
        $this->guestFilter = '';
        $this->sortBy = 'name';
        $this->resetPage();
    }

    public function render()
    {
        $query = Room::query();

        // Search filter
        if (!empty($this->search)) {
            $searchTerm = '%' . $this->search . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                  ->orWhere('description', 'like', $searchTerm);
            });
        }

        // Price filter
        if (!empty($this->priceFilter)) {
            switch ($this->priceFilter) {
                case '0-100':
                    $query->whereBetween('price', [0, 100]);
                    break;
                case '100-200':
                    $query->whereBetween('price', [100, 200]);
                    break;
                case '200-300':
                    $query->whereBetween('price', [200, 300]);
                    break;
                case '300+':
                    $query->where('price', '>=', 300);
                    break;
            }
        }

        // Guest filter
        if (!empty($this->guestFilter)) {
            $guests = (int) str_replace('+', '', $this->guestFilter);
            $query->where('total_guests', '>=', $guests);
        }

        // Sorting
        switch ($this->sortBy) {
            case 'price-low':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->withAvg('reviews', 'rating')->orderByDesc('reviews_avg_rating');
                break;
            case 'name':
            default:
                $query->orderBy('name', 'asc');
                break;
        }

        $rooms = $query->paginate(12);

        return view('livewire.room-search', [
            'rooms' => $rooms,
        ]);
    }
}
