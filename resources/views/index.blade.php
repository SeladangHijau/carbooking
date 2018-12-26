@extends('../layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="offset-2 col-8">
                <div class="jumbotron">
                    <div class="row">
                        <div class="offset-4 col-6">
                            <h3>Car Booking System</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="offset-1 col-10">
                <div class="row">
                    <div class="offset-2 col-8">
                        <div class="row">
                            <div class="col-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">From</span>
                                    </div>
                                    <input type="text" class="mr-sm-2 form-control" id="point_a" aria-label="point_a" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">To</span>
                                    </div>
                                    <input type="text" class="mr-sm-2 form-control" id="point_b" aria-label="point_b" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-2">
                                <button class="mr-sm-2 btn btn-primary" onclick="getDriver()">Select Driver</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <button class="btn btn-success form-control" onclick="registerUser({!! $driver->id !!})">{!! $driver->name !!}</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        const createUser = $('#createUser');
        const findDriver = $('#findDriver');

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
