@extends('../layout')

@section('content')
    <div class="row">
        <div class="offset-2 col-8">
            <div class="jumbotron">
                <h3>Register a New Driver</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="offset-md-4 col-md-4">
            <form class="cmxForm" id="createDriverForm" action={!! url("/driver/create") !!} method="POST">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" id="driver_name" minlength="3" name="driver_name" placeholder="Name" required/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="tel"id="driver_tel" minlength="10" name="driver_tel" placeholder="H/P No." required/>
                </div>
                
                <div class="form-group">
                    <input class="form-control" type="text" name="car_model" placeholder="Model" required/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="car_color" placeholder="Color" required/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="car_plate_no" placeholder="Plate no." required/>
                </div>
                
                <div class="form-group">
                    <input class="form-control btn btn-primary" type="submit" name="submit" value="Submit" />
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#createDriverForm').validate();
    </script>
@endsection
