<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">SMPP USERS</div>

            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                            <div class="row" id="smppUserSearchForm">

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Client</label>
                                        <select class="form-control" name="client_id" id="client_id">
                                            <option></option>
                                            @foreach ($clients as $client )
                                            <option value="{{$client['id']}}">{{$client['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="group">Division</label>
                                        <select class="form-control" name="division_id" id="division_id">
                                            <option value=""></option>
                                            @foreach ($divisions as $division )
                                            <option value="{{$division['id']}}">{{$division['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="group">Batch Name</label>
                                        <input class="form-control" id="batchname" type="text" placeholder="BatchName">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="group">Service Type</label>
                                        <select class="form-control" name="service_type" id="service_type">
                                            <option value=""></option>

                                            <option value="1">Http</option>
                                            <option value="2">Alert</option>
                                            <option value="3">Otp</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">System Id</label>
                                        <input class="form-control" name="system_id" id="system_id" type="text" placeholder="system id ">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="">
                                        <label class="form-label" for="group">&nbsp;</label>
                                    </div>
                                    <button type="submit" class="btn btn-success text-white" id="searchSmppUser">Search</button>
                                </div>
                            </div>


                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <Button data-href="{{route('smpps.users.store')}}" class="btn btn-success text-white addsmppuser mb-3" id="addsmppuser">Add New</Button>
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="smpp-user-table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Division</th>
                            <th>Client</th>
                            <th>service_type</th>
                            <th>Batchname</th>
                            <th>Created</th>
                            <th>Modified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="smppUserForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SMPP User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('smpps.users.store') }}">
                    @csrf
                    <div class="row">

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="client_id">Client</label>
                                <select class="form-control" name="client_id" id="client_id">
                                    @foreach ($clients as $client )
                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="batchname">batch Name</label>
                                <input class="form-control" id="batchname" type="text" name="batchname" placeholder="Batch Name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="divisiaon">Division</label>
                                <select class="form-control" id="division" name="division">
                                    @foreach ($divisions as $division )
                                    <option value="{{$division['name']}}">{{$division['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="max_connection">Max Connection</label>
                                <input class="form-control" id="max_connection" type="text" name="max_connection" placeholder="max Connection">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="system_id">System Id</label>
                                <input class="form-control" id="system_id" type="text" name="system_id" placeholder="System ID">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" type="text" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="password">Upload By</label>
                                <input class="form-control" id="upload_by" type="text" name="upload_by" placeholder="Upload By">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="service_type">service Type</label>
                                <select class="form-control" name="service_type" id="service_type">
                                    <option value="0">HTTP</option>
                                    <option value="1">ALERT</option>
                                    <option value="2">OTP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="dr_format">DR Format</label>
                                <select class="form-control" id="dr_format" type="text" name="dr_format" placeholder="DR format">
                                    <option value="hex">Hex</option>
                                    <option value="int">Int</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <input type="checkbox" id="use_optional_parameter" name="use_optional_parameter" value="1"> use optional parameter
                        </div>
                        <div class="col-6">
                            <input type="checkbox" id="use_expired_session" name="use_expired_session" value="1"> use expired session
                        </div>
                        <div class="col-12">
                            <div class="">
                                <label class="form-label" for="group">&nbsp;</label>
                            </div>
                            <button type="submit" class="btn btn-success text-white">Create</button>
                        </div>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="smpp-view-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SMPP User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="client_id">Client</label>
                            <select class="form-control" name="client_id" id="client_id">
                                @foreach ($clients as $client )
                                <option value="{{$client['id']}}">{{$client['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="batchname">batch Name</label>
                            <input class="form-control" id="batchname" type="text" name="batchname" placeholder="Batch Name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="divisiaon">Division</label>
                            <select class="form-control" id="division" name="division">
                                @foreach ($divisions as $division )
                                <option value="{{$division['name']}}">{{$division['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="max_connection">Max Connection</label>
                            <input class="form-control" id="max_connection" type="text" name="max_connection" placeholder="max Connection">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="system_id">System Id</label>
                            <input class="form-control" id="system_id" type="text" name="system_id" placeholder="System ID">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" id="password" type="text" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="password">Upload By</label>
                            <input class="form-control" id="upload_by" type="text" name="upload_by" placeholder="Upload By">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="service_type">service Type</label>
                            <select class="form-control" name="service_type" id="service_type">
                                <option value="0">HTTP</option>
                                <option value="1">ALERT</option>
                                <option value="2">OTP</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="dr_format">DR Format</label>
                            <select class="form-control" id="dr_format" type="text" name="dr_format" placeholder="DR format">
                                <option value="hex">Hex</option>
                                <option value="int">Int</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <input type="checkbox" id="use_optional_parameter" name="use_optional_parameter" value="1"> use optional parameter
                    </div>
                    <div class="col-6">
                        <input type="checkbox" id="use_expired_session" name="use_expired_session" value="1"> use expired session
                    </div>
                    <div class="col-12">
                        <div class="">
                            <label class="form-label" for="group">&nbsp;</label>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    function smppUserDatatable() {
        $('#smpp-user-table').DataTable().destroy();
        smppuser = $('#smpp-user-table').DataTable({
            //"order": [[ 8, "desc" ]],
            // "scrollX": true,
            "lengthChange": false,
            //  "paging": true,
            // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
            "pageLength": 10
            , "searching": false
            , "processing": true
            , "serverSide": true
            , "ajax": {
                "url": "{{route('smpps.user.list')}}"
                , "data": function(data) {
                    // Read values
                    var username = $('#smppUserSearchForm #username').val();
                    var client_id = $('#smppUserSearchForm #client_id').find(':selected').val();
                    var division_id = $('#smppUserSearchForm #division_id').find(':selected').val();
                    var batchname=$('#smppUserSearchForm #batchname').val();
                    var service_type=$('#smppUserSearchForm #service_type').val();
                    var system_id=$('#smppUserSearchForm #system_id').val();

                    // Append to data
                    data.username = username;
                    data.client_id = client_id;
                    data.division_id = division_id;
                    data.batchname=batchname;
                    data.service_type=service_type;
                    data.system_id=system_id;
                }

            }
            , "columns": [{
                    data: 'DT_RowIndex'
                    , name: 'DT_RowIndex'
                }
                , {
                    data: 'division'
                    , name: 'division'
                }
                , {
                    data: 'client.name'
                    , name: 'client_id'
                }
                , {
                    data: 'service_type'
                    , name: 'service_type'
                }
                , {
                    data: 'batchname'
                    , name: 'batchname'
                }
                , {
                    data: 'date_created'
                    , name: 'date_created'
                }
                , {
                    data: 'date_modified'
                    , name: 'date_modified'
                }
                , {
                    data: 'action'
                    , name: 'action'
                    , orderable: true
                    , searchable: true
                },

            ]
            , "columnDefs": [{

                "targets": [3]
                , render: function(data, type, row) {
                    if (data == 1) {
                        return "HTTP";
                    } else if (data == 2) {
                        return "Alert";
                    } else if (data == 3) {
                        return "OTP";
                    }
                }

            }]
        });

        $('#searchSmppUser').on('click', function() {
            smppuser.draw();
        });

        $("#addsmppuser").on('click', function(e) {
            e.preventDefault();
            var action = $(this).attr('data-href');
            $("#smppUserForm form #id").val("");
            $("#smppUserForm form").attr("action", action)
            $("#smppUserForm").modal('show');

            $("#smppUserForm form").on('submit', function(e) {
                e.preventDefault();
                console.log('submit')
                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                , }).done(function(data) {
                    $("#smppUserForm").modal('hide');
                    location.reload();
                    //smppuser.draw();
                });
            })
        });


        $("#smpp-user-table").on('click', '.view-data', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');



            $.ajax({
                type: "GET"
                , url: href

            }).done(function(data) {
                $("#smpp-view-data  #id").val(data.id).prop("disabled", true);
                $("#smpp-view-data   #batchname").val(data.batchname).prop("disabled", true);
                $("#smpp-view-data   #system_id").val(data.system_id).prop("disabled", true);
                $("#smpp-view-data   #password").val(data.password).prop("disabled", true);
                $("#smpp-view-data   #client_id").val(data.client_id).prop("disabled", true);
                $("#smpp-view-data   #division").val(data.division).prop("disabled", true);
                $("#smpp-view-data   #service_type").val(data.service_type).prop("disabled", true);
                $("#smpp-view-data   #dr_format").val(data.dr_format).prop("disabled", true);
                $("#smpp-view-data   #upload_by").val(data.upload_by).prop("disabled", true);
                $("#smpp-view-data   #max_connection").val(data.max_connection).prop("disabled", true);
                if (data.use_optional_parameter == 1) {
                    $("#smpp-view-data   #use_optional_parameter").prop("checked", true).prop("disabled", true);;
                }
                if (data.use_expired_session == 1) {
                    $("#smpp-view-data   #use_expired_session").prop("checked", true).prop("disabled", true);;
                }


                $("#smpp-view-data").modal('show');

            });

        });
        $("#smpp-user-table").on('click', '.smppUserEdit', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var action = $(this).attr('data-href');
            var id = $(this).attr("data-id");
            $("#smppUserForm form #id").val(id);
            $("#smppUserForm form").attr("action", action)


            $.ajax({
                type: "GET"
                , url: href

            }).done(function(data) {
                $("#smppUserForm form #id").val(data.id);
                $("#smppUserForm form #batchname").val(data.batchname);
                $("#smppUserForm form #system_id").val(data.system_id);
                $("#smppUserForm form #password").val(data.password);
                $("#smppUserForm form #client_id").val(data.client_id);
                $("#smppUserForm form #division").val(data.division);
                $("#smppUserForm form #service_type").val(data.service_type);
                $("#smppUserForm form #dr_format").val(data.dr_format);
                $("#smppUserForm form #upload_by").val(data.upload_by);
                $("#smppUserForm form #max_connection").val(data.max_connection);
                if (data.use_optional_parameter == 1) {
                    $("#smppUserForm form #use_optional_parameter").prop("checked", true);
                }
                if (data.use_expired_session == 1) {
                    $("#smppUserForm form #use_expired_session").prop("checked", true);
                }


                $("#smppUserForm").modal('show');

            });


            $("#smppUserForm form").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                , }).done(function(data) {
                    $("#smppUserForm").modal('hide');
                    location.reload();
                   // smppuser.draw();
                });
            })



        });
        $("#smpp-user-table").on('click', '.smppUserDelete', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var deleteConfirm = confirm("Are you sure?");
            const postFormData = {
                "_token": "{{ csrf_token() }}"
            };
            console.log(href);
            if (deleteConfirm) {
                $.ajax({
                    url: href
                    , data: postFormData
                    , type: 'post'
                    , success: function(response) {
                        smppuser.draw();
                    }
                });
            }


        })

    }

</script>
