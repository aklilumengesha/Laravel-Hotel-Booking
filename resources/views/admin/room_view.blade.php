@extends('admin.layout.app')

@section('heading', 'View Rooms')

@section('right_top_button')
<a href="{{ route('admin.room.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Price (per night)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$row->featured_photo) }}" alt="" class="w_200">
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>${{ $row->price }}</td>
                                    <td class="pt_10 pb_10">
                                        <button type="button" class="btn btn-warning btn-detail" data-room-id="{{ $row->id }}">Detail</button>
                                        <a href="{{ route('admin.room.gallery',$row->id) }}" class="btn btn-success">Gallery</a>
                                        <a href="{{ route('admin.room.edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.room.destroy', $row->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals placed outside the table -->
@foreach($rooms as $row)
<div class="modal fade" id="roomModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="roomModalLabel{{ $row->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roomModalLabel{{ $row->id }}">Room Detail: {{ $row->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Photo</label></div>
                    <div class="col-md-8">
                        <img src="{{ asset('uploads/'.$row->featured_photo) }}" alt="" class="w_200">
                    </div>
                </div>
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Name</label></div>
                    <div class="col-md-8">{{ $row->name }}</div>
                </div>
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Description</label></div>
                    <div class="col-md-8">{!! $row->description !!}</div>
                </div>
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Price (per night)</label></div>
                    <div class="col-md-8">${{ $row->price }}</div>
                </div>
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Total Rooms</label></div>
                    <div class="col-md-8">{{ $row->total_rooms }}</div>
                </div>
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Amenities</label></div>
                    <div class="col-md-8">
                        @if($row->amenities)
                            @php
                                $arr = explode(',', $row->amenities);
                                foreach ($arr as $amenity_id) {
                                    $temp_row = \App\Models\Amenity::find(trim($amenity_id));
                                    if ($temp_row) {
                                        echo '<span class="badge badge-info mr-1 mb-1">' . e($temp_row->name) . '</span>';
                                    }
                                }
                            @endphp
                        @else
                            <span class="text-muted">No amenities</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Size</label></div>
                    <div class="col-md-8">{{ $row->size ?: 'N/A' }}</div>
                </div>
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Total Beds</label></div>
                    <div class="col-md-8">{{ $row->total_beds ?: 'N/A' }}</div>
                </div>
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Total Bathrooms</label></div>
                    <div class="col-md-8">{{ $row->total_bathrooms ?: 'N/A' }}</div>
                </div>
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Total Balconies</label></div>
                    <div class="col-md-8">{{ $row->total_balconies ?: 'N/A' }}</div>
                </div>
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Max Guests</label></div>
                    <div class="col-md-8">{{ $row->total_guests ?: 'N/A' }}</div>
                </div>
                @if($row->video_id)
                <div class="form-group row bdb1 pt_10 mb_0">
                    <div class="col-md-4"><label class="form-label">Video</label></div>
                    <div class="col-md-8">
                        <div class="iframe-container1">
                            <iframe width="100%" height="250" src="https://www.youtube.com/embed/{{ $row->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('admin.room.edit', $row->id) }}" class="btn btn-primary">Edit Room</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@push('scripts')
<script>
$(document).ready(function() {
    // Use event delegation for detail buttons (works with DataTables pagination)
    $(document).on('click', '.btn-detail', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var roomId = $(this).data('room-id');
        $('#roomModal' + roomId).modal('show');
    });
});
</script>
@endpush
@endsection
