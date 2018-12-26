@extends('../layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="offset-md-2 col-md-8 text-center">
                <h3>Car Booking System</h3>
            </div>
        </div>
        <div class="row">
            <form id="locationForm col-md-12">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input type="text" class="form-control" minlength="3" id="point_a" placeholder="From" required/>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" class="form-control" minlength="3" id="point_b" placeholder="To" required/>
                    </div>
                    
                    <div class="offset-md-1 col-md-3 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Search Driver</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Please register yourself</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="cmxForm" id="createUserForm" action="{!! url('/booking/create') !!}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="driverId_create" name="driver_id" value="" />
                        <input type="hidden" id="booking_pointA" name="booking_pointA" value="" />
                        <input type="hidden" id="booking_pointB" name="booking_pointB" value="" />

                        <div class="form-group">
                            <input type="text" id="user_name" minlength="3" name="user_name" class="form-control" placeholder="Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="tel" id="user_tel" minlength="10" name="user_tel" class="form-control" placeholder="H/P No." required/>
                        </div>
                        <div class="form-group">
                            <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email" required/>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Submit" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="findDriver" tabindex="-1" role="dialog" aria-labelledby="findDriver" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Choose driver</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    @foreach ($drivers as $driver)
                        <div class="form-group">
                            <button class="btn btn-success form-control" onclick="registerUser({!! $driver['driver_id'] !!})">{!! $driver['driver_name'] !!} ({!! $driver['car_model'] !!})</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        const createUser = $('#createUser');
        const findDriver = $('#findDriver');

        $('#locationForm').validate({
            submitHandler: function(form) {
                getDriver();
            }
        });
        $('#createUserForm').validate();

        function registerUser(driverId) {
            var pointA = $('#point_a');
            var pointB = $('#point_b');

            $('#driverId_create').val(driverId);
            $('#booking_pointA').val(pointA.val());
            $('#booking_pointB').val(pointB.val());

            createUser.modal();
            findDriver.modal('hide');
        }

        function getDriver() {
            findDriver.modal();
        }
    </script>
@endsection
