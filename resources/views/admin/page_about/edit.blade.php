{{-- resources/views/admin/page_about/edit.blade.php --}}
@extends('admin.layout.app')
@section('heading', 'Edit About Us Page')

@section('main_content')
<form action="{{ route('admin.about.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Heading</label>
        <input type="text" name="heading" class="form-control" value="{{ $data->heading }}">
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="5">{{ $data->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Hero Image</label>
        <input type="file" name="image" class="form-control">
        @if($data->image)
            <img src="{{ asset('storage/' . $data->image) }}" width="150">
        @endif
    </div>
    <div class="mb-3">
        <label>Improvements (JSON Array)</label>
        <textarea name="improvements" class="form-control" placeholder='["Free WiFi", "24/7 Support"]'>{{ json_encode($data->improvements) }}</textarea>
    </div>
    <div class="mb-3">
        <label>Awards (JSON Array of image paths)</label>
        <textarea name="awards" class="form-control" placeholder='["uploads/award1.jpg", "uploads/award2.jpg"]'>{{ json_encode($data->awards) }}</textarea>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1" {{ $data->status ? 'selected' : '' }}>Show</option>
            <option value="0" {{ !$data->status ? 'selected' : '' }}>Hide</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
