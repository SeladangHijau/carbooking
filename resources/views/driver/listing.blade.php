@extends('../layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href={!! url('/driver/createDriver') !!} class="btn btn-primary">Create New Driver</a>
            
            @foreach ($drivers as $key => $driver)
                <div class="row">
                    <div class="col-md-4">{!! $driver->name !!} : {!! $driver->car_model !!}</div>
                    <div class="col-md-3">
                        <button class="btn btn-success" onclick="editDriver({!! $driver->id !!})">Edit</button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-danger" onclick="deleteDriver({!! $driver->id !!})">Delete</button>
                    </div>
                </div>
            @endforeach
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="driver_name">Driver Name</label>
                                    <input id="driver_name" name="driver_name" type="text" class="form-control" value="" />
                                </div>
                                <div class="form-group">
                                    <label for="driver_tel">Driver Name</label>
                                    <input id="driver_tel" name="driver_tel" type="text" class="form-control" placeholder="H/P No." value="" />
                                </div>
                                <div class="form-group">
                                    <label for="driver_location">Driver Name</label>
                                    <input id="driver_location" name="driver_location" type="text" class="form-control" placeholder="Location" value="" />
                                </div>
                                

                                <div class="form-group">
                                    <label for="car_model">Driver Name</label>
                                    <input id="car_model" name="car_model" type="text" class="form-control" placeholder="Car model" value="" />
                                </div>
                                <div class="form-group">
                                    <label for="car_color">Driver Name</label>
                                    <input id="car_color" name="car_color" type="text" class="form-control" placeholder="Car color" value="" />
                                </div>
                                <div class="form-group">
                                    <label for="car_plate_no">Driver Name</label>
                                    <input id="car_plate_no" name="car_plate_no" type="text" class="form-control" placeholder="Car plate no." value="" />
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
        
        function editDriver(driverId) {
            var driverName = $('#driver_name');
            var driverTel = $('#driver_tel');
            var driverLocation = $('#driver_location');
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
                    driverLocation.val(data.driverInfo.location);
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
