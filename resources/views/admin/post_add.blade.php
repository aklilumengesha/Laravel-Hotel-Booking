@extends('admin.layout.app')

@section('heading', 'Add Post')

@section('right_top_button')
<a href="{{ route('admin.post.index') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="mb-4">
                                    <label class="form-label">Photo * (Max: 10MB)</label>
                                    <div>
                                        <input type="file" name="photo" accept="image/jpeg,image/png,image/jpg,image/gif">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Heading *</label>
                                    <input type="text" class="form-control" name="heading" value="{{ old('heading') }}">
                                </div>
                                <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" required>
</div>

                                <div class="mb-4">
                                    <label class="form-label">Short Content *</label>
                                    <textarea name="short_content" class="form-control h_100" cols="30" rows="10">{{ old('short_content') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Content *</label>
                                    <textarea name="content" class="form-control snote" cols="30" rows="10">{{ old('content') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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