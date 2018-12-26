@extends('../layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="offset-md-2 col-md-8 text-center">
                <h3>List of Bookings</h3>
            </div>
        </div>

        <div class="row">
            <div class="offset-md-4 col-md-4">
                <div class="form-group">
                    <a href={!! url('/') !!} class="form-control btn btn-primary">New Booking</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Driver Name</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $key => $booking)
                                <tr>
                                    <th scope="row">{!! ($key + 1) !!}</th>
                                    <td>{!! $booking['user_name'] !!}</td>
                                    <td>{!! $booking['driver_name'] !!}</td>
                                    <td>{!! $booking['location_from'] !!}</td>
                                    <td>{!! $booking['location_to'] !!}</td>
                                    <td>
                                        <div class="form-group">
                                            <button class="btn btn-success form-control" onclick="editBooking({!! $booking['id'] !!})">Edit</button>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-danger form-control" onclick="deleteBooking({!! $booking['id'] !!})">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    
                    <form action="{!! url('/booking/edit') !!}" method="POST">
                        @csrf
                        <input type="hidden" id="bookingId_edit" name="id" value="" />
    
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="user_name">User Name</label>
                                        <input id="user_name" id="user_name" minlength="3" name="driver_tel" type="text" class="form-control" placeholder="User Name" value="" disabled required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="driver_name">Driver Name</label>
                                        <input id="driver_name" id="driver_name" minlength="3" name="driver_name" type="text" class="form-control" placeholder="Driver Name" value="" disabled required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="location_from">Location from</label>
                                        <input id="location_from" id="location_from" name="location_from" type="text" class="form-control" placeholder="Location From" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="location_to">Location To</label>
                                        <input id="location_to" id="location_to" name="location_to" type="text" class="form-control" placeholder="Location To" value="" required/>
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
                    
                    <form action="{!! url('/booking/delete') !!}" method="POST">
                        @csrf
                        <input type="hidden" id="bookingId_delete" name="id" value="" />
    
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

        function editBooking(bookingId) {
            var userName = $('#user_name');
            var driverName = $('#driver_name');
            var locationFrom = $('#location_from');
            var locationTo = $('#location_to');
            var routeURL = "{!! url('/booking/getBookingInfo/') !!}";

            $.ajax({
                type: 'GET',
                url: routeURL,
                data: {
                    'id': bookingId
                },
                success: function(data) {
                    console.log(data);
                    userName.val(data.bookingInfo.user_name);
                    driverName.val(data.bookingInfo.driver_name);
                    locationFrom.val(data.bookingInfo.point_a);
                    locationTo.val(data.bookingInfo.point_b);
                    
                    $('#bookingId_edit').val(bookingId);
                    editModal.modal();
                }
            });
        }

        function deleteBooking(bookingId) {
            $('#bookingId_delete').val(bookingId);
            deleteModal.modal();
        }
    </script>
@endsection
