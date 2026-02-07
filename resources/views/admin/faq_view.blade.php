@extends('admin.layout.app')

@section('heading', 'View FAQs')

@section('right_top_button')
<a href="{{ route('admin.faq.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if($faqs->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Question</th>
                                        <th>Answer Preview</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($faqs as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <strong>{{ $row->question }}</strong>
                                        </td>
                                        <td>
                                            {{ Str::limit(strip_tags(html_entity_decode($row->answer)), 100) }}
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin.faq.edit', $row->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.faq.destroy', $row->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to delete this FAQ?');">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-question-circle fa-4x mb-3" style="color: #ccc;"></i>
                            <h5 style="color: #666;">No FAQs Added Yet</h5>
                            <p style="color: #999;">Click the "Add New" button above to create your first FAQ.</p>
                            <p style="color: #999;">FAQs will be displayed on the Contact page for your visitors.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection