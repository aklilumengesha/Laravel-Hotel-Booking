@extends('admin.layout.app')

@section('heading', 'View Testimonials')

@section('right_top_button')
<a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
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
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$row->photo) }}" alt="" class="w_100">
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->designation }}</td>
                                    <td class="pt_10 pb_10">
    {{-- Corrected Edit Link --}}
    <a href="{{ route('admin.testimonial.edit', $row->id) }}" class="btn btn-primary">Edit</a>

    {{-- Corrected and Secure Delete Button --}}
    <form action="{{ route('admin.testimonial.destroy', $row->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">
            Delete
        </button>
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
@endsection