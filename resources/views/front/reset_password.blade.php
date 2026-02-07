@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->reset_password_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">

                <form action="{{ route('customer.reset_password.submit') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Retype Password</label>
                            <input type="password" class="form-control" name="retype_password">
                            @if($errors->has('retype_password'))
                                <span class="text-danger">{{ $errors->first('retype_password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="book-now-btn">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<style>
.book-now-btn {
    display: block;
    width: 100%;
    background: linear-gradient(135deg, #1a365d, #2c5282);
    color: white;
    padding: 14px;
    border-radius: 12px;
    text-align: center;
    text-decoration: none;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
}
.book-now-btn:hover {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    transform: translateY(-2px);
}
</style>
@endsection