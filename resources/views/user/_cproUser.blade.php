<div class="row" id="cpro-filter">
    <div class="col-4">
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" id="username" type="text" placeholder="Username" name="username">
        </div>
    </div>
    <div class="col-4">
        <div class="mb-3">
            <label class="form-label" for="group">Privilege</label>
            <select name="privilege-id" class="form-control" id="privilege_id">
                <option value="">Group</option>
                @foreach ($privileges as $privilege)
                <option value="{{$privilege['id']}}">{{$privilege['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="mb-3">
            <label class="form-label" for="division">Division</label>
            <select name="division_id" class="form-control" id="divison_id">
                <option value="">DIvision</option>
                @foreach ($divisions as $division)
                <option value="{{$division['id']}}">{{$division['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <div class="mb-3">
            <label class="form-label" for="sender_id">Sender ID</label>
            <select name="privilege-id" class="form-control" id="privilege_id">
                <option value=""></option>
                @foreach ($cproSenders['Data'] as $sender)
                <option value="{{$sender['sender-id']}}">{{$sender['sender-name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="mb-3">
            <label class="form-label" for="group">Client</label>
            <select name="client_id" class="form-control" id="client_id">
                <option value="">Client</option>

                @foreach ($clients as $client)
                <option value="{{$client['id']}}">{{$client['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <button type="submit" id="searchCproUser" class="btn btn-success text-white">Search</button>
    </div>
</div>
{{-- </form> --}}
<hr />
<button id="addCproUser" data-href="{{route('cpro.users.store')}}" class="btn btn-success float-left mb-3 text-white">Add user</button>
<table class="table table-striped table-bordered" id="cpro-user-table">
    <thead class="table-dark">
        <tr>
            <th>Client</th>
            <th>Fullname</th>
            <th>Division</th>
            <th>Privilege</th>
            <th>Username</th>
            <th>Sender ID</th>
            <th>status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>


    </tbody>
</table>

<div class="modal fade modalUserCpro" id="CproUserForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="">
                <form method="POST" action="{{route('cpro.users.store')}}">
                    <input name="id" id="id" value="" type="hidden" />
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Client</label>
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Full name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Full name</label>
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

                        </div>
                        <div class="col-6">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="group">Privilege</label>
                                    <select name="privilege_id" class="form-control" id="privilege_id">
                                        @foreach ($privileges as $privilege)
                                        <option value="{{$privilege['id']}}">{{$privilege['name']}}</option>
                                        @endforeach
                                    </select> </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="group">Client</label>
                                    <select name="client_id" class="form-control" id="client_id">
                                        @foreach ($clients as $client)
                                        <option value="{{$client['id']}}">{{$client['name']}}</option>
                                        @endforeach
                                    </select> </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="division">Division</label>
                                    <select name="division_id" class="form-control" id="divison_id">
                                        @foreach ($divisions as $division)
                                        <option value="{{$division['id']}}">{{$division['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="group">Sender</label>
                                    <select class="form-control" name="sender_id" id="sender_id">
                                        @foreach ($cproSenders['Data'] as $sender)
                                        <option value="{{$sender['sender-id']}}">{{$sender['sender-name']}}</option>
                                        @endforeach
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

        </div>
        <!-- <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div> -->
    </div>
</div>
</div>
<script type="text/javascript">
    function cproUserDatatable() {
        $('#cpro-user-table').DataTable().destroy();
        cproUser = $('#cpro-user-table').DataTable({
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
                "url": "{{route('cpro.users.index')}}"
                , "data": function(data) {
                    // Read values
                    var username = $('#cpro-filter #username').val();
                    var group_id = $('#cpro-filter  #group_id').find(':selected').val();
                    var client_id = $('#cpro-filter  #client_id').find(':selected').val();
                    var division_id = $('#cpro-filter  #division_id').find(':selected').val();

                    // Append to data
                    data.username = username;
                    data.group_id = group_id;
                    data.client_id = client_id;
                    data.division_id = division_id;
                }

            }
            , "columns": [{
                    data: 'client-name'
                    , name: 'client-name'
                }
                , {
                    data: 'full-name'
                    , name: 'full-name'
                }
                , {
                    data: 'division-name'
                    , name: 'division-name'
                }
                , {
                    data: 'privilege-name'
                    , name: 'privilege-name'
                }
                , {
                    data: 'username'
                    , name: 'username'
                }
                , {
                    data: 'sender-id'
                    , name: 'sender-id'
                }
                , {
                    data: 'status'
                    , name: 'status'
                }
                


            ]
            , "columnDefs": [{

                "targets": [7]
                , render: function(data, type, row) {
                    
                    var urlDelete = '{{ route("cpro.users.delete", ["user"=>":userid"]) }}';
                    urlDelete = urlDelete.replace(':userid', row.username);


                    return '<a href="' + urlDelete + '" data-id="' + row.username + '" class="delete btn btn-danger btn-sm text-white cproUserDelete">Delete</a>'
                }

            }]
        });

        $('#searchCproUser').on('click', function() {
            cproUser.draw();
        });

        $("#addCproUser").on('click', function() {
            console.log('add');
            var action = $(this).attr('data-href');
            $("#CproUserForm form #id").val("");
            $("#CproUserForm form").attr("action", action)
            $("#CproUserForm").modal('show');

            $("#CproUserForm form").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                , }).done(function(data) {
                    $("#CproUserForm").modal('hide');
                    Jnsuser.draw();
                });
            })
        });


        $("#jns-user-table").on('click', '.jnsUserEdit', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var action = $(this).attr('data-href');
            var id = $(this).attr("data-id");
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
                $("#JnsUserForm form #username").val(data.username);
                $("#JnsUserForm form #email").val(data.email);
                $("#JnsUserForm form #id").val(data.id);
                $("#JnsUserForm form #group_id option:selected").val(data.group_id);
                $("#JnsUserForm form #client_id").val(data.client_id);
                $("#JnsUserForm form #division_id").val(data.division_id);
                $("#JnsUserForm form #expiry_mode_id").val(data.expiry_mode_id);
                $("#JnsUserForm form #expiry").val(data.expiry);

                $("#JnsUserForm").modal('show');

            });



            $(".modalForm form").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                , }).done(function(data) {
                    $(".modalForm").modal('hide');
                    cproUser.draw();
                });
            })



        });
        $("#cpro-user-table").on('click', '.cproUserDelete', function(e) {
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
                        cproUser.draw();
                    }
                    , error: function(res) {
                        console.log(res);
                    }
                });
            }


        })

    }

</script>
