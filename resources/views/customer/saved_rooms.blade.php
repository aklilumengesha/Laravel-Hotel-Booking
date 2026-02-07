@extends('customer.layout.app')

@section('heading', 'Saved Rooms')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-bookmark text-primary me-2"></i>My Saved Rooms</h4>
                </div>
                <div class="card-body">
                    @if(isset($saved_rooms) && $saved_rooms->count() > 0)
                        <div class="row">
                            @foreach($saved_rooms as $item)
                                @if($item->room)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        <img src="{{ asset('uploads/'.$item->room->featured_photo) }}" class="card-img-top" alt="{{ $item->room->name }}" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->room->name }}</h5>
                                            <p class="card-text text-primary fw-bold">{{ $item->room->price }} ETB / night</p>
                                            <div class="d-flex gap-2">
                                                <span class="badge bg-secondary"><i class="fas fa-users"></i> {{ $item->room->total_guests ?? $item->room->total_adult }}</span>
                                                <span class="badge bg-secondary"><i class="fas fa-bed"></i> {{ $item->room->total_beds }}</span>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('room_detail', $item->room->id) }}" class="btn btn-primary btn-sm w-100">View Details</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        
                        @if(method_exists($saved_rooms, 'links'))
                        <div class="d-flex justify-content-center mt-4">
                            {{ $saved_rooms->links() }}
                        </div>
                        @endif
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-bookmark fa-4x text-muted mb-3" style="opacity: 0.3;"></i>
                            <h4>No Saved Rooms Yet</h4>
                            <p class="text-muted">You haven't saved any rooms yet. Browse our rooms and click the bookmark icon to save them!</p>
                            <a href="{{ route('room') }}" class="btn btn-primary mt-3">
                                <i class="fas fa-search me-2"></i>Browse Rooms
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
