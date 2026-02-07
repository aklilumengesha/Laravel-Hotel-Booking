<form method="POST" action="{{ route('chapa.pay') }}">
    @csrf
    <input type="hidden" name="room_id" value="{{ $room->id }}">
    <input type="hidden" name="amount" value="{{ $room->price }}">
    <input type="hidden" name="first_name" value="{{ Auth::user()->name }}">
    <input type="hidden" name="last_name" value="">
    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
    <button type="submit" class="btn btn-primary">Pay Now with Chapa</button>
</form>
