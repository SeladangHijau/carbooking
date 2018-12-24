@extends('../layout')

@section('content')
    <form action={!! url("/driver/create") !!} method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" />
        <input type="tel" name="tel" placeholder="H/P No." />
        <input type="text" name="location" placeholder="Location" />
        
        <input type="text" name="model" placeholder="Model" />
        <input type="text" name="color" placeholder="Color" />
        <input type="text" name="plate_no" placeholder="Plate no." />

        <input type="submit" name="submit" value="Submit" />
    </form>
@endsection
