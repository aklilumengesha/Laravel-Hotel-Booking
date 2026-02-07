@extends('admin.layout.app')

@section('main_content')
 <div class="container py-5">

    <h2 class="mb-4">Edit About Section</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Update Form --}}
    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label">Section Title</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $about->title ?? '') }}">
        </div>

        {{-- Subtitle --}}
        <div class="mb-3">
            <label class="form-label">Subtitle</label>
            <input type="text" name="subtitle" class="form-control"
                   value="{{ old('subtitle', $about->subtitle ?? '') }}">
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="6" class="form-control">{{ old('description', $about->description ?? '') }}</textarea>
        </div>

        {{-- Button Text --}}
        <div class="mb-3">
            <label class="form-label">Button Text</label>
            <input type="text" name="button_text" class="form-control"
                   value="{{ old('button_text', $about->button_text ?? '') }}">
        </div>

        {{-- Button Link --}}
        <div class="mb-3">
            <label class="form-label">Button Link</label>
            <input type="url" name="button_link" class="form-control"
                   value="{{ old('button_link', $about->button_link ?? '') }}">
        </div>

        {{-- Counters --}}
        <div class="mb-3">
            <label class="form-label">Counters</label>
            <small class="d-block text-muted mb-2">Enter counters (icon, number, label)</small>

            <div id="counters-wrapper">
                @php
                    $counters = old('counters', $about->counters ?? []);
                @endphp

                @foreach($counters as $index => $counter)
                    <div class="card p-3 mb-2 counter-item">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-4">
                                <input type="text" name="counters[{{ $index }}][icon]" class="form-control"
                                       placeholder="FontAwesome Icon (e.g., fa fa-hotel)"
                                       value="{{ $counter['icon'] ?? '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="counters[{{ $index }}][number]" class="form-control"
                                       placeholder="Number" value="{{ $counter['number'] ?? '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="counters[{{ $index }}][label]" class="form-control"
                                       placeholder="Label (e.g., Rooms)" value="{{ $counter['label'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-counter" class="btn btn-sm btn-secondary mt-2">+ Add Counter</button>
        </div>

        {{-- Images --}}
        <div class="mb-3">
            <label class="form-label">Images</label>
            <small class="d-block text-muted mb-2">Upload multiple images with ALT text</small>

            <div id="images-wrapper">
                @php
                    $images = old('images', $about->images ?? []);
                @endphp

                @foreach($images as $index => $img)
                    <div class="card p-3 mb-2 image-item">
                        <div class="row g-2 align-items-center">
                            {{-- This is the NEW corrected code --}}

<div class="col-md-6">
    <input type="file" name="images[{{ $index }}][file]" class="form-control">
    
    {{-- This entire @if block is the change --}}
    @if(!empty($img['path']))
        {{-- The line below is the most critical addition --}}
        <input type="hidden" name="images[{{ $index }}][path]" value="{{ $img['path'] }}">

        <small class="text-muted">Current: 
            <a href="{{ asset('storage/'.$img['path']) }}" target="_blank">View Image</a>
        </small>
    @endif
</div>
                            <div class="col-md-6">
                                <input type="text" name="images[{{ $index }}][alt]" class="form-control"
                                       placeholder="Alt Text" value="{{ $img['alt'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-image" class="btn btn-sm btn-secondary mt-2">+ Add Image</button>
        </div>

        {{-- Submit --}}
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update About Section</button>
        </div>
    </form>
</div>

{{-- Dynamic JS for adding counters/images --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    // COUNTERS
    let counterIndex = {{ count($counters ?? []) }};
    document.getElementById('add-counter').addEventListener('click', function() {
        let wrapper = document.getElementById('counters-wrapper');
        let html = `
        <div class="card p-3 mb-2 counter-item">
            <div class="row g-2 align-items-center">
                <div class="col-md-4">
                    <input type="text" name="counters[${counterIndex}][icon]" class="form-control" placeholder="FontAwesome Icon">
                </div>
                <div class="col-md-4">
                    <input type="number" name="counters[${counterIndex}][number]" class="form-control" placeholder="Number">
                </div>
                <div class="col-md-4">
                    <input type="text" name="counters[${counterIndex}][label]" class="form-control" placeholder="Label">
                </div>
            </div>
        </div>`;
        wrapper.insertAdjacentHTML('beforeend', html);
        counterIndex++;
    });

    // IMAGES
    let imageIndex = {{ count($images ?? []) }};
    document.getElementById('add-image').addEventListener('click', function() {
        let wrapper = document.getElementById('images-wrapper');
        let html = `
        <div class="card p-3 mb-2 image-item">
            <div class="row g-2 align-items-center">
                <div class="col-md-6">
                    <input type="file" name="images[${imageIndex}][file]" class="form-control">
                </div>
                <div class="col-md-6">
                    <input type="text" name="images[${imageIndex}][alt]" class="form-control" placeholder="Alt Text">
                </div>
            </div>
        </div>`;
        wrapper.insertAdjacentHTML('beforeend', html);
        imageIndex++;
    });

});
</script>
@endpush

@endsection
