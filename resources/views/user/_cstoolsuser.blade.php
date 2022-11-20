<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">CSTOOLS USERS</div>

                <div class="card-body">
                    <div class="card">
                        <div class="card-body" id="searchCstools">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Name</label>
                                        <input class="form-control" id="name" type="text" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <input class="form-control" id="email" type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Status</label>
                                        <select name="status" id="status" class="form-control" id="status">
                                            <option value=""></option>
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success text-white" id="btnSearchCstools">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <button id="addCstoolsUser" data-href="{{ route('users.store') }}" class="btn btn-success text-white mb-3">Add user</button>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-hover mb-0 mt-2" id="cstoolsuser-table">
                        <thead>
                            <tr class="table-dark">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="cstoolsUserForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display: none"></div>
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <input type="hidden" name="id" value="" />
                    <div class="row">


                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="username">Email</label>
                                <input class="form-control" id="email" type="text" name="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" type="text" name="password" placeholder="password">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="password">Confirm Password</label>
                                <input class="form-control" id="password" type="text" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="password">Status</label>
                                <select name="status" id="status" class="form-control" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cstoolsresetpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display: none"></div>


                <form method="POST" action="{{route('users.resetpassword')}}">
                    <div class="alert alert-danger" style="display: none"></div>
                    <input name="id" id="id" value="" type="hidden" />
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="username">Old password</label>
                                <input class="form-control" id="old_password" name="old_password" type="password" placeholder="Old password">
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
                    </div>



                    <div class="col-12">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success text-white">Reset Password</button>
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

<script type="text/javascript">
    function cstoolsDataTable() {
        $('#cstoolsuser-table').DataTable().destroy();
        cstoolsuser = $('#cstoolsuser-table').DataTable({
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
                "url": "{{route('users.list')}}"
                , "data": function(data) {
                    // Read values
                    var name = $('#searchCstools #name').val();
                    var email = $('#searchCstools #email').val();
                    var status = $('#searchCstools #status').find(':selected').val();

                    // Append to data
                    data.name = name;
                    data.email = email;
                    data.status = status;
                }

            }
            , "columns": [{
                    data: 'DT_RowIndex'
                    , name: 'DT_RowIndex'
                }
                , {
                    data: 'name'
                    , name: 'name'
                }
                , {
                    data: 'email'
                    , name: 'email'
                }
                , {
                    data: 'status'
                    , name: 'status'
                }

                , {
                    data: 'action'
                    , name: 'action'
                    , orderable: true
                    , searchable: true
                },

            ]
        });

        $('#btnSearchCstools').on('click', function() {
            cstoolsuser.draw();
        });

        $("#addCstoolsUser").on('click', function(e) {
            e.preventDefault();
            var action = $(this).attr('data-href');
            $("#cstoolsUserForm form #id").val("");
            $("#cstoolsUserForm form").attr("action", action)
            $("#cstoolsUserForm").modal('show');
            $("#cstoolsUserForm form #name").val("").prop("disabled", false);
            $("#cstoolsUserForm form #email").val("").prop("disabled", false);
            $("#cstoolsUserForm form #password").val("").prop("disabled", false)
            $("#cstoolsUserForm form #password_confirmation").val("").prop("disabled", false)

            $("#cstoolsUserForm form").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                    , error: function(data) {
                        error = '';
                        $.each(data.responseJSON.errors, function(key, value) {
                            error = error + "<p>" + value + "</p>";
                        });
                        $(".alert.alert-danger").show();
                        $(".alert.alert-danger").html(error);
                    }
                , }).done(function(data, status) {
                    $("#cstoolsUserForm").modal('hide');
                    cstoolsuser.draw();
                })
            })
        });


        $("#cstoolsuser-table").on('click', '.reset-password', function(e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $("#cstoolsresetpassword form #id").val(id);

            $("#cstoolsresetpassword").modal('show');

            $("#cstoolsresetpassword form").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                    , error: function(data) {
                        error = '';
                        $.each(data.responseJSON.errors, function(key, value) {
                            error = error + "<p>" + value + "</p>";
                        });
                        $(".alert.alert-danger").show();
                        $(".alert.alert-danger").html(error);
                        console.log('error');
                    }
                , }).done(function(data) {
                    $("#cstoolsUserForm").modal('hide');
                    location.reload();
                    //cstoolsuser.draw();
                    onsubmit = false;
                });

            });



        });


        $("#cstoolsuser-table").on('click', '.userEdit', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var action = $(this).attr('data-href');
            var id = $(this).attr("data-id");
            $("#cstoolsUserForm form #id").val(id);
            $("#cstoolsUserForm form").attr("action", action)

            $.ajax({
                type: "GET"
                , url: href

            }).done(function(data) {
                $("#cstoolsUserForm form #id").val(data.id);
                $("#cstoolsUserForm form #name").val(data.name).prop("disabled", true);
                $("#cstoolsUserForm form #email").val(data.email).prop("disabled", true);
                $("#cstoolsUserForm form #status").val(data.status);
                $("#cstoolsUserForm form #password").parent().hide();
                $("#cstoolsUserForm form #password_confirmation").parent().hide();



                $("#cstoolsUserForm").modal('show');

            });
            var onsubmit = false;



            $("#cstoolsUserForm form").on('submit', function(e) {
                e.preventDefault();
                onsubmit = true;
                if (onsubmit) {
                    $.ajax({
                        type: "POST"
                        , url: $(this).attr('action')
                        , data: $(this).serialize()
                        , error: function(data) {
                            error = '';
                            $.each(data.responseJSON.errors, function(key, value) {
                                error = error + "<p>" + value + "</p>";
                            });
                            $(".alert.alert-danger").show();
                            $(".alert.alert-danger").html(error);
                        }
                    , }).done(function(data) {
                        $("#cstoolsUserForm").modal('hide');
                        location.reload();
                        //cstoolsuser.draw();
                        onsubmit = false;
                    });
                } else {
                    console.log('submit on progress');
                }
            });



        });
        $("#cstoolsuser-table").on('click', '.userDelete', function(e) {
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
                        cstoolsuser.draw();
                    }
                    , error: function(data) {
                        error = '';
                        $.each(data.responseJSON.errors, function(key, value) {
                            error = error + "<p>" + value + "</p>";
                        });
                        alert(error);
                    }
                });
            }


        })

    }

</script>
