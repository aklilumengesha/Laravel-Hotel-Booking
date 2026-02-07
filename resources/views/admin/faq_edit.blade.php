@extends('admin.layout.app')

@section('heading', 'Edit FAQ')

@section('right_top_button')
<a href="{{ route('admin.faq.index') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.faq.update', $faq_data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Question *</label>
                                    <input type="text" class="form-control" name="question" value="{{ $faq_data->question }}" required>
                                    @error('question')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Answer *</label>
                                    <textarea name="answer" class="form-control snote" cols="30" rows="10" required>{{ $faq_data->answer }}</textarea>
                                    @error('answer')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">This answer will be displayed on the Contact page FAQ section.</small>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Update
                                    </button>
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