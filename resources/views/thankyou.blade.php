@extends('front.layout.app')


@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h2>Thank You for Your Payment!</h2>
    <p>Your room has been successfully booked.</p>

    <a href="{{ route('rooms.index') }}" class="btn btn-primary">Back to Rooms</a>
</div>
@endsection
