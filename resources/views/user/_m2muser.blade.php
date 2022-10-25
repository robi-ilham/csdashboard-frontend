<div class="row" id="m2mUserSearchForm">
    <div class="col-4">
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" id="username" type="text" placeholder="Username">
        </div>
    </div>
    <div class="col-4">
        <div class="mb-3">
            <label class="form-label" for="group">Client</label>
            <select class="form-control" name="client_id" id="client_id">
                <option value="">=== Select Client === </option>
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
                <option value="">=== Select Division === </option>
                @foreach ($divisions as $division )
                <option value="{{$division['id']}}">{{$division['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12">
        <div class="">
            <label class="form-label" for="group">&nbsp;</label>
        </div>
        <button type="submit" class="btn btn-success text-white" id="searchM2mUser">Search</button>
    </div>
</div>
<hr />
<button id="addm2muser" data-href="{{ route('m2m.users.store') }}" class="btn btn-success text-white mb-3">Add user</button>
<table class="table table-bordered table-striped" id="m2m-user-table">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Division</th>
            <th>Client</th>
            <th>APi Key</th>
            <th>Access Mode</th>
            <th>Username</th>
            <th>Created</th>
            <th>Modified</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>


<div class="modal fade" id="m2mUserForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">M2M USER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger" style="display:none"></div>
                <form method="POST" action="{{ route('m2m.users.store') }}">
                    @csrf
                    <input type="hidden" name="id" id="id" value="" />
                    <div class="row">

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">Client</label>
                                <select class="form-control" name="client_id" id="client_id">
                                    @foreach ($clients as $client )
                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Api Key</label>
                                <input class="form-control" id="api_key" type="text" name="api_key" placeholder="API key">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">Division</label>
                                <select class="form-control" name="division_id" id="division_id">
                                    @foreach ($divisions as $division )
                                    <option value="{{$division['id']}}">{{$division['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" id="username" type="text" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Access mode</label>
                                <div>
                                    <input type="checkbox" name="access_mode[]" value="1"> HTTP <br />
                                    <input type="checkbox" name="access_mode[]" value="2"> HTTP Alert <br />
                                    <input type="checkbox" name="access_mode[]" value="4"> OTP <br />
                                    <input type="checkbox" name="access_mode[]" value="8"> Call <br />
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" type="text" name="password" placeholder="password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="expiry">Expiry (Delay time in second)</label>
                                <input class="form-control" id="expiry" type="text" name="expiry" placeholder="expiry">
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" name="unbillable_access" id="unbillable_access" value="1" placeholder="unbillable access" /> Unbillable Access
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="">
                                <label class="form-label" for="group">&nbsp;</label>
                            </div>
                            <button type="submit" class="btn btn-success text-white">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<div class="modal fade" id="view-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">M2M USER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger" style="display:none"></div>
                <form method="POST" action="{{ route('m2m.users.store') }}">
                    @csrf
                    <input type="hidden" name="id" id="id" value="" />
                    <div class="row">

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">Client</label>
                                <select class="form-control" name="client_id" id="client_id">
                                    @foreach ($clients as $client )
                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Api Key</label>
                                <input class="form-control" id="api_key" type="text" name="api_key" placeholder="API key">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">Division</label>
                                <select class="form-control" name="division_id" id="division_id">
                                    @foreach ($divisions as $division )
                                    <option value="{{$division['id']}}">{{$division['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input class="form-control" id="username" type="text" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Access mode</label>
                                <div>
                                    <input type="checkbox" name="access_mode[]" value="1"> HTTP <br />
                                    <input type="checkbox" name="access_mode[]" value="2"> HTTP Alert <br />
                                    <input type="checkbox" name="access_mode[]" value="4"> OTP <br />
                                    <input type="checkbox" name="access_mode[]" value="8"> Call <br />
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" type="text" name="password" placeholder="password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="expiry">Expiry (Delay time in second)</label>
                                <input class="form-control" id="expiry" type="text" name="expiry" placeholder="expiry">
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" name="unbillable_access" id="unbillable_access" value="1" placeholder="unbillable access" /> Unbillable Access
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="">
                                <label class="form-label" for="group">&nbsp;</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    function m2mUserDatatable() {
        $('#m2m-user-table').DataTable().destroy();
        m2muser = $('#m2m-user-table').DataTable({
            //"order": [[ 8, "desc" ]],
            // "scrollX": true,
            "lengthChange": false,
            //  "paging": true,
            // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
            "pageLength": 20
            , "searching": false
            , "processing": true
            , "serverSide": true
            , "ajax": {
                "url": "{{route('m2m.user.list')}}"
                , "data": function(data) {
                    // Read values
                    var username = $('#m2mUserSearchForm #username').val();
                    var client_id = $('#m2mUserSearchForm #client_id').find(':selected').val();
                    var division_id = $('#m2mUserSearchForm #division_id').find(':selected').val();

                    // Append to data
                    data.username = username;
                    data.client_id = client_id;
                    data.division_id = division_id;
                }

            }
            , "columns": [{
                    data: 'DT_RowIndex'
                    , name: 'DT_RowIndex'
                }
                , {
                    data: 'division.name'
                    , name: 'division_id'
                }
                , {
                    data: 'client.name'
                    , name: 'client_id'
                }
                , {
                    data: 'api_key'
                    , name: 'api_key'
                }
                , {
                    data: 'access_mod'
                    , name: 'access_mod'
                }
                , {
                    data: 'username'
                    , name: 'username'
                }
                , {
                    data: 'created'
                    , name: 'created'
                }
                , {
                    data: 'modified'
                    , name: 'created'
                }
                , {
                    data: 'action'
                    , name: 'action'
                    , orderable: true
                    , searchable: true
                },

            ]
        });

        $('#searchM2mUser').on('click', function() {
            m2muser.draw();
        });

        $("#addm2muser").on('click', function(e) {
            e.preventDefault();
            var action = $(this).attr('data-href');
            $("#m2mUserForm form #id").val("");
            $("#m2mUserForm form").attr("action", action)
            $("#m2mUserForm").modal('show');

            $("#m2mUserForm form").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                    , error: function(data) {
                        $.each(data.responseJSON, function(key, value) {
                            $(".alert.alert-danger").show();
                            $(".alert.alert-danger").html("<p>"+value+"</p>");
                        });
                    }
                , }).done(function(data, status) {
                    $("#m2mUserForm").modal('hide');
                    m2muser.draw();
                })
            })
        });


        $("#m2m-user-table").on('click', '.view-data', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');

            $.ajax({
                type: "GET"
                , url: href

            }).done(function(data) {

                $("#view-data form #name").val(data.name).prop("disabled",true);
                $("#view-data form #username").val(data.username).prop("disabled",true);
                $("#view-data form #password").val(data.password).prop("disabled",true);
                $("#view-data form #client_id").val(data.client_id).prop("disabled",true);
                $("#view-data form #division_id").val(data.division_id).prop("disabled",true);
                $("#view-data form #api_key").val(data.api_key).prop("disabled",true);
                $("#view-data form #expiry").val(data.expiry).prop("disabled",true);
                $("#view-data form #unbillable_access").prop("checked", data.unbillable_access).prop("disabled",true);

                $("#view-data").modal('show');

            });



        });
        $("#m2m-user-table").on('click', '.m2mUserEdit', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var action = $(this).attr('data-href');
            var id = $(this).attr("data-id");
            $("#m2mUserForm form #id").val(id);
            $("#m2mUserForm form").attr("action", action)

            $.ajax({
                type: "GET"
                , url: href

            }).done(function(data) {
                $("#m2mUserForm form #id").val(data.id);
                $("#m2mUserForm form #name").val(data.name);
                $("#m2mUserForm form #username").val(data.username);
                $("#m2mUserForm form #password").val(data.password);
                $("#m2mUserForm form #client_id").val(data.client_id);
                $("#m2mUserForm form #division_id").val(data.division_id);
                $("#m2mUserForm form #api_key").val(data.api_key);
                $("#m2mUserForm form #expiry").val(data.expiry);
                $("#m2mUserForm form #unbillable_access").prop("checked", data.unbillable_access);

                $("#m2mUserForm").modal('show');

            });
            var onsubmit = false;



            $("#m2mUserForm form").on('submit', function(e) {
                e.preventDefault();
                onsubmit = true;
                if (onsubmit) {
                    $.ajax({
                        type: "POST"
                        , url: $(this).attr('action')
                        , data: $(this).serialize()
                    , }).done(function(data) {
                        $("#m2mUserForm").modal('hide');
                        m2muser.draw();
                        onsubmit = false;
                    });
                } else {
                    console.log('submit on progress');
                }
            });



        });
        $("#m2m-user-table").on('click', '.m2mUserDelete', function(e) {
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
                        m2muser.draw();
                    }
                });
            }


        })

    }

</script>
