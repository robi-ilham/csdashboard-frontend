@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">CSTOOLS INFORMATIONS</div>

                <div class="card-body">
                    <div class="card">
                        <div class="card-body" id="searchCstools">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="system_name">System Name</label>
                                        <input class="form-control" id="name" type="text" placeholder="name">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="information">information</label>
                                        <input class="form-control" id="information" type="text" placeholder="information">
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
                            <button id="addCstoolsUser" data-href="{{ route('cstools-informations.store') }}" class="btn btn-success text-white mb-3">Add Information</button>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-hover mb-0 mt-2" id="informations-table">
                        <thead>
                            <tr class="table-dark">
                                <th>No</th>
                                <th>System Name</th>
                                <th>Information</th>
                                <th>Created</th>
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
                                <label class="form-label" for="system_name">System Name</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="System Name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="information">Information</label>
                                <textarea class="form-control" id="information" type="text" name="information" placeholder="Information"></textarea>
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



<script type="text/javascript">
    $(function() {
        $('#informations-table').DataTable().destroy();
        information = $('#informations-table').DataTable({
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
                "url": "{{route('cstools-informations.list')}}"
                , "data": function(data) {
                    // Read values
                    var name = $('#searchCstools #name').val();
                    var information = $('#searchCstools #information').val();

                    // Append to data
                    data.name = name;
                    data.information = information;
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
                    data: 'information'
                    , name: 'email'
                }
                , {
                    data: 'created_at'
                    , name: 'created'
                }

                , {
                    data: 'action'
                    , name: 'action'
                },

            ]
        });

        $('#btnSearchCstools').on('click', function() {
            information.draw();
        });

        $("#addCstoolsUser").on('click', function(e) {
            e.preventDefault();
            var action = $(this).attr('data-href');
            $("#cstoolsUserForm form #id").val("");
            $("#cstoolsUserForm form").attr("action", action)
            $("#cstoolsUserForm").modal('show');
            $("#cstoolsUserForm form #name").val("").prop("disabled", false);
            $("#cstoolsUserForm form #information").val("").prop("disabled", false);
            

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
                    information.draw();
                })
            })
        });




        $("#informations-table").on('click', '.infoEdit', function(e) {
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
                $("#cstoolsUserForm form #name").val(data.name)
                $("#cstoolsUserForm form #information").val(data.information)
              



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
                        information.draw();
                        onsubmit = false;
                    });
                } else {
                    console.log('submit on progress');
                }
            });



        });
        $("#informations-table").on('click', '.infoDelete', function(e) {
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
                        information.draw();
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
    })

</script>
@endsection
