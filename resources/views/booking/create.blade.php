@extends('../layout')

@section('content')
    <form action={!! url("/booking/create") !!} method="POST">
        @csrf
        <input type="text" name="booking_pointA" />
        <input type="text" name="booking_pointB" />

        <input type="submit" name="submit" value="Submit" />
    </form>
@endsection
