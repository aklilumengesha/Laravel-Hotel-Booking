@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->forget_password_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">

                <form action="{{ route('customer.forget_password.submit') }}" method="post">
                    @csrf
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="email">
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="book-now-btn">Submit</button>
                            <a href="{{ route('customer_login') }}" class="back-link">Back to Login Page</a>
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
.back-link {
    display: inline-block;
    margin-top: 15px;
    color: #b8a055;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}
.back-link:hover {
    color: #a08f4a;
    text-decoration: underline;
}
</style>
@endsection