@extends('../layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="offset-2 col-8">
                <div class="jumbotron">
                    <h3>List of Available Drivers</h3>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="offset-2 col-8">
                <div class="row">
                    <div class="offset-4 col-4">
                        <div class="form-group">
                            <a href={!! url('/driver/createDriverPage') !!} class="form-control btn btn-primary">Register New Driver</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Driver Name</th>
                                    <th scope="col">Car Model</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drivers as $key => $driver)
                                    <tr>
                                        <th scope="row">{!! $key + 1 !!}</th>
                                        <td>{!! $driver->name !!}</td>
                                        <td>{!! $driver->car_model !!}</td>
                                        <td>
                                            <button class="btn btn-success" onclick="editDriver({!! $driver->id !!})">Edit</button>
                                            <button class="btn btn-danger" onclick="deleteDriver({!! $driver->id !!})">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Driver Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="{!! url('/driver/edit') !!}" method="POST">
                    @csrf
                    <input type="hidden" id="driverId_edit" name="id" value="" />

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="driver_name">Driver Name</label>
                                    <input id="driver_name" id="driver_name" minlength="3" name="driver_name" type="text" class="form-control" value="" required/>
                                </div>
                                <div class="form-group">
                                    <label for="driver_tel">H/P No.</label>
                                    <input id="driver_tel" id="driver_tel" minlength="10" name="driver_tel" type="text" class="form-control" placeholder="H/P No." value="" required/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="car_model">Car Model</label>
                                    <input id="car_model" id="car_model" minlength="3" name="car_model" type="text" class="form-control" placeholder="Car model" value="" required/>
                                </div>
                                <div class="form-group">
                                    <label for="car_color">Car Color</label>
                                    <input id="car_color" id="car_color" minlength="3" name="car_color" type="text" class="form-control" placeholder="Car color" value="" required/>
                                </div>
                                <div class="form-group">
                                    <label for="car_plate_no">Car Plate No.</label>
                                    <input id="car_plate_no" id="car_plate_no" minlength="3" name="car_plate_no" type="text" class="form-control" placeholder="Car plate no." value="" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="{!! url('/driver/delete') !!}" method="POST">
                    @csrf
                    <input type="hidden" id="driverId_delete" name="id" value="" />

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const editModal = $('#editModal');
        const deleteModal = $('#deleteModal');

        $('#editDriverForm').validate();

        setInterval(function() {
            window.location.reload();
        }, 60000); 
        
        function editDriver(driverId) {
            var driverName = $('#driver_name');
            var driverTel = $('#driver_tel');
            var carModel = $('#car_model');
            var carColor = $('#car_color');
            var carPlateNo = $('#car_plate_no');
            var routeURL = "{!! url('/driver/getDriverInfo/') !!}";

            $.ajax({
                type: 'GET',
                url: routeURL,
                data: {
                    'id': driverId
                },
                success: function(data) {
                    driverName.val(data.driverInfo.name);
                    driverTel.val(data.driverInfo.tel);
                    carModel.val(data.carInfo.model);
                    carColor.val(data.carInfo.color);
                    carPlateNo.val(data.carInfo.plate_no);
                    
                    $('#driverId_edit').val(driverId);
                    editModal.modal();
                }
            });
        }

        function deleteDriver(driverId) {
            $('#driverId_delete').val(driverId);
            deleteModal.modal();
        }
    </script>
@endsection
