@extends('admin.layout.app')

@section('heading', 'Edit Video')

@section('right_top_button')
<a href="{{ route('admin.video.index') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.video.update', $video_data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <strong>How to get YouTube Video ID:</strong><br>
                                    From URL: <code>https://youtu.be/uWT23-4g6A4</code> → Enter: <strong>uWT23-4g6A4</strong><br>
                                    From URL: <code>https://www.youtube.com/watch?v=uWT23-4g6A4</code> → Enter: <strong>uWT23-4g6A4</strong><br>
                                    <small class="text-muted">Only enter the video ID, not the full URL</small>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Video Preview</label>
                                    <div class="iframe-container1">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video_data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Video Id * <small class="text-muted">(e.g., uWT23-4g6A4)</small></label>
                                    <input type="text" class="form-control" name="video_id" value="{{ $video_data->video_id }}" placeholder="Enter YouTube video ID only">
                                    <small class="form-text text-muted">Example: For https://youtu.be/uWT23-4g6A4, enter only: uWT23-4g6A4</small>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Caption</label>
                                    <input type="text" class="form-control" name="caption" value="{{ $video_data->caption }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection