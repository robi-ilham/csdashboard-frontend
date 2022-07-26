<div class="search-list">
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" type="text" placeholder="Username" name="username">
            </div>
        </div>

        <div class="col-4">
            <div class="mb-3">
                <label class="form-label" for="group">Client</label>
                <select name="client_id" class="form-control select-client" id="client_id">

                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label" for="division">Division</label>
                <select name="division_id" class="form-control select-division" id="division_id">
                    {{-- @foreach ($divisions as $division)
                <option value="{{$division['id']}}">{{$division['name']}}</option>
                    @endforeach --}}
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label" for="group">Group</label>
                <select name="group_id" class="form-control" id="group_id">
                    <option value="">Group</option>
                    @foreach ($groups as $group)
                    <option value="{{$group['id']}}">{{$group['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="new retail">New Retail</option>
                        <option value="new">New</option>
                        <option value="active">Active</option>
                        <option value="blocked">Blocked</option>
                        <option value="disabled">Disabled</option>
                        <option value="waiting approval">Waiting Approval</option>
                        <option value="inactive">inactive</option>
                    </select>
                </div>
            </div>


        <div class="row">
            <div class="col-12">
                <button type="submit" id="searchJnsUser" class="btn btn-success text-white">Search</button>
            </div>
        </div>
    </div>
</div>
    {{-- </form> --}}
    <hr />
    <button id="addJnsuser" data-href="{{route('jns.users.store')}}" class="btn btn-success float-left mb-3 text-white">Add user</button>
    <table class="table table-striped table-bordered" id="jns-user-table">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>client</th>
                <th>group</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>


        </tbody>
    </table>

    <div class="modal fade modalForm" id="JnsUserForm"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>

                    <form method="POST"  action="{{route('jns.users.store')}}">
                        <input name="id" id="id" value="" type="hidden" />
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Full name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control" id="email" name="email" type="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input class="form-control" id="username" name="username" type="text" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-12" id="password">
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-12" id="password_confirmation">
                                    <div class="mb-3">
                                        <label class="form-label" for="password_confirmation">Retype Password</label>
                                        <input class="form-control" name="password_confirmation" type="password" placeholder="Retype Password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="group">Group</label>
                                        <select name="group_id" class="form-control select-group" id="group_id">
                                            @foreach ($groups as $group)
                                            <option value="{{$group['id']}}">{{$group['name']}}</option>
                                            @endforeach
                                        </select> </div>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label select-client" for="group">Client</label>
                                        <div>
                                        <select name="client_id" class="form-control" id="client_id_1">

                                        </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label select-division" for="division">Division</label>
                                        <select name="division_id" class="form-control" id="division_id_1">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="group">Expiry Mode</label>
                                        <select class="form-control" name="expiry_mode_id" id="expiry_mode_id">
                                            <option value="1">Date</option>
                                            <option value="2">Month</option>
                                            <option value="3">Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Expiry</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" class="form-control" name="expiry" id="expiry" />
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-light d-block">
                                                    <svg class="nav-icon" style="width: 20px;height:20px">
                                                        <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-calendar') }}"></use>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="new retail">New Retail</option>
                                            <option value="new">New</option>
                                            <option value="active">Active</option>
                                            <option value="blocked">Blocked</option>
                                            <option value="disabled">Disabled</option>
                                            <option value="waiting approval">Waiting Approval</option>
                                            <option value="inactive">inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success text-white">Save</button>
                                </div>
                            </div>
                    </form>
                </div>
                <script type="text/javascript">
                    $(function() {
                        $('#datepicker').datepicker({
                            format: 'yyyy-mm-dd'
                            , startDate: '-1d'
                        });
                    });

                </script>
            </div>
            <!-- <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div> -->
        </div>
    </div>
</div>
@include('user._reset_password')

<script type="text/javascript">
    function jnsUserDatatable() {
        $('#jns-user-table').DataTable().destroy();
        Jnsuser = $('#jns-user-table').DataTable({

            "lengthChange": false,

            "pageLength": 10
            , "searching": false
            , "processing": '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>'
            , "serverSide": true
            , "ajax": {
                "url": "{{route('jns.user.list')}}"
                , "data": function(data) {
                    // Read values
                    var username = $('#username').val();
                    var group_id = $('#group_id').find(':selected').val();
                    var client_id = $('#client_id').find(':selected').val();
                    var division_id = $('#division_id').find(':selected').val();

                    // Append to data
                    data.username = username;
                    data.group_id = group_id;
                    data.client_id = client_id;
                    data.division_id = division_id;
                }

            }
            , "columns": [{
                    data: 'name'
                    , name: 'name'
                }
                , {
                    data: 'email'
                    , name: 'email'
                }
                , {
                    data: 'username'
                    , name: 'username'
                }
                , {
                    data: 'client.name'
                    , name: 'client'
                }
                , {
                    data: 'group.name'
                    , name: 'group'
                }
                , {
                    data: 'status'
                    , name: 'status'
                }
                , {
                    data: 'action'
                    , name: 'action',

                },


            ]
            , "columnDefs": [{

                "targets": [6]
                , render: function(data, type, row) {
                    var urlUpdate = '{{ route("jns.user.update", ["id"=>":userid"]) }}';
                    urlUpdate = urlUpdate.replace(':userid', row.id);

                    var urlEdit = '{{ route("jns.users.edit", ["user"=>":userid"]) }}';
                    urlEdit = urlEdit.replace(':userid', row.id);

                    var urlReset = '{{ route("jns.users.reset-password") }}';
                    var urlDelete = '{{ route("jns.user.delete", ["user"=>":userid"]) }}';
                    urlDelete = urlDelete.replace(':userid', row.id);
                    var division_name=row.division!=null? row.division.name:"";
                    var division_id = row.division!=null? row.division.id:"";


                    return '<a href="' + urlEdit + '" data-href="' + urlUpdate + '" data-division_name="'+division_name+'" data-division_id="'+ division_id+'" data-client_name="'+row.client.name+'" data-client_id="'+row.client.id+'" data-id="' + row.id + '" class="edit btn btn-success text-white btn-sm jnsUserEdit">Edit</a> <a href="' + urlReset + '" data-id="' + row.id + '" class="delete btn btn-warning btn-sm text-white reset-password">Reset Password</a> <a href="' + urlDelete + '" data-id="' + row.id + '" class="delete btn btn-danger btn-sm text-white jnsUserDelete">Delete</a>'
                }

            }]
        });

        $('#searchJnsUser').on('click', function() {
            Jnsuser.draw();
        });

        $("#addJnsuser").off('click','#addJnsuser').on('click', function() {

            var action = $(this).attr('data-href');
            resetForm();
            $("#JnsUserForm form").attr("action", action)
            $("#JnsUserForm").modal('show');
            modalSelect("JnsUserForm");
            $(".modalForm form").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                    , error: function(data) {
                        $.each(data.responseJSON, function(key, value) {
                            $(".alert.alert-danger").show();
                            $(".alert.alert-danger").html("<p>" + value + "</p>");
                        });
                    }

                }).done(function(data) {
                    $(".modalForm").modal('hide');
                   // Jnsuser.draw();
                    location.reload();
                });
            })
        });


        $("#jns-user-table").on('click', '.jnsUserEdit', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var action = $(this).attr('data-href');
            var id = $(this).attr("data-id");
            var client_id = $(this).attr("data-client_id");
            var client_name = $(this).attr("data-client_name");
            var division_id = $(this).attr("data-division_id");
            var division_name = $(this).attr("data-division_name");
            var selectClient='<option value="'+client_id+'">'+client_name+'</option>';
            var selectDivision='<option value="'+division_id+'">'+division_name+'</option>';

            $("#JnsUserForm form #id").val(id);
            $("#JnsUserForm form").attr("action", action)



            $.ajax({
                type: "GET"
                , url: href

            }).done(function(data) {
                $("#JnsUserForm form #password").hide();
                $("#JnsUserForm form #password_confirmation").hide();
                $("#JnsUserForm form #id").val(data.id);
                $("#JnsUserForm form #name").val(data.name);
                $("#JnsUserForm form #username").val(data.username).prop("readonly", true);
                $("#JnsUserForm form #email").val(data.email);
                $("#JnsUserForm form #group_id").val(data.group_id).prop("disabled", true);
               // $("#JnsUserForm form #client_id_1").val(data.client_id).prop("disabled", true);
              // $("#JnsUserForm form #division_id_1").val(data.division_id).prop("disabled", true);
                $("#JnsUserForm form #client_id_1").html(selectClient).prop("disabled", true);
                $("#JnsUserForm form #division_id_1").html(selectDivision).prop("disabled", true);
                $("#JnsUserForm form #expiry_mode_id").val(data.expiry_mode_id).prop("disabled", true);
                $("#JnsUserForm form #expiry").val(data.expiry).prop("readonly", true);
                $("#JnsUserForm form #status").val(data.status);

                $("#JnsUserForm").modal('show');

            });


            $(".modalForm form").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                    , error: function(data) {
                        $.each(data.responseJSON, function(key, value) {
                            $(".alert.alert-danger").show();
                            $(".alert.alert-danger").html("<p>" + value + "</p>");
                        });
                    }

                }).done(function(data) {
                    $(".modalForm").modal('hide');
                    resetForm();
                    location.reload();
                   // Jnsuser.draw();
                });
            })



        });
        $("#jns-user-table").on('click', '.jnsUserDelete', function(e) {
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
                        Jnsuser.draw();
                    }
                });
            }


        });

        $("#jns-user-table").on('click', '.reset-password', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $(".alert.alert-danger").hide();
            // $("#resetPasswordForm form").reset();
            $("#resetPasswordForm #id").val(id);
            $("#resetPasswordForm").modal('show');
            $("#resetPasswordForm form").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                    , error: function(data) {
                        $.each(data.responseJSON, function(key, value) {
                            $(".alert.alert-danger").show();
                            $(".alert.alert-danger").html("<p>" + value + "</p>");
                        });
                    }
                , }).done(function(data, status) {
                    $("#resetPasswordForm").modal('hide');
                    Jnsuser.draw();
                })
            })

        })

        function resetForm() {



            $("#JnsUserForm form #password").show();
            $("#JnsUserForm form #password_confirmation").show();
            $("#JnsUserForm form #id").val("");
            $("#JnsUserForm form #password").val("");
            $("#JnsUserForm form #password_confirmation").val("");
            $("#JnsUserForm form #name").val("");
            $("#JnsUserForm form #username").val("").prop("readonly", false);
            $("#JnsUserForm form #email").val("");
            $("#JnsUserForm form #group_id option:selected").val("").prop("disabled", false);
            $("#JnsUserForm form #client_id").val("").prop("disabled", false);
            $("#JnsUserForm form #division_id").val("").prop("disabled", false);
            $("#JnsUserForm form #expiry_mode_id").val("").prop("disabled", false);
            $("#JnsUserForm form #expiry").val("").prop("readonly", false);
            $("#JnsUserForm form #status").val("");
        }

    }

</script>
