@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">JNS DIVISIONS</div>

                <div class="card-body">
                    <div class="card" id="searchDivision">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Name</label>
                                            <input class="form-control" id="name" type="text" placeholder="name">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="group">Client</label>
                                            <select class="form-control" id="client_id" name="client_id">
                                                <option value="">ALL </option>
                                                @foreach ($clients as $client )
                                                    <option value="<?=$client['id']?>" ><?=$client['name']?></option>
                                                @endforeach
                                            </select>                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="">
                                            <label class="form-label" for="group">&nbsp;</label>
                                        </div>
                                        <button type="submit" class="btn btn-success text-white" id="searchDiv">Search</button>
                                    </div>
                                </div>


                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <Button id="addDivision" data-href="{{route('jns.divisions.store')}}" class="btn btn-success float-left mb-3 text-white" id="addDivision" >Add New</Button>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped" id="jnsDivisionTable">
                        <thead>
                            <tr>
                                <th>Division</th>
                                <th>Client</th>
                                <th>Created</th>
                                <th>Modified</th>
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
<div class="modal fade" id="divisionForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Division</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('jns.divisions.store') }}">
                    @csrf
                    <input type="hidden" name="id" id="id" />
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="CLient Name">
                              </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="group">Client</label>
                                <select class="form-control" id="client_id" name="client_id">
                                    @foreach ($clients as $client )
                                        <option value="<?=$client['id']?>" ><?=$client['name']?></option>
                                    @endforeach
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
@endsection
@section('script')
<script type="text/javascript">
    function jnsDivisionTable() {
        $('#jnsDivisionTable').DataTable().destroy();
        division = $('#jnsDivisionTable').DataTable({
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
                "url": "{{route('jns.division.list')}}"
                , "data": function(data) {
                    // Read values
                        var name = $('#searchDivision #name').val();
                        var client_id = $('#searchDivision #client_id').find(':selected').val();

                        // Append to data
                        data.name = name;
                        data.client_id = client_id;
                }

            }
            , "columns": [{
                    data: 'name'
                    , name: 'division_name'
                }
                , {
                    data: 'client.name'
                    , name: 'client_id'
                }
                , {
                    data: 'created'
                    , name: 'created'
                }
                , {
                    data: 'modified'
                    , name: 'created'
                }
                

            ]
            , "columnDefs": [{

                "targets": [4]
                , render: function(data, type, row) {
                    var urlUpdate = '{{ route("jns.division.update", ["id"=>":userid"]) }}';
                    urlUpdate = urlUpdate.replace(':userid', row.id);

                    var urlEdit = '{{ route("jns.divisions.edit", ["division"=>":userid"]) }}';
                    urlEdit = urlEdit.replace(':userid', row.id);

                    var urlReset = '{{ route("jns.users.reset-password") }}';
                    var urlDelete = '{{ route("jns.division.delete", ["division"=>":userid"]) }}';
                    urlDelete = urlDelete.replace(':userid', row.id);


                    return '<a href="' + urlEdit + '" data-href="' + urlUpdate + '" data-id="' + row.id + '" class="edit btn btn-success text-white btn-sm jnsDivisionEdit">Edit</a>  <a href="' + urlDelete + '" data-id="' + row.id + '" class="delete btn btn-danger btn-sm text-white jnsDivisionDelete">Delete</a>'
                }

            }]
        });

        $('#searchDiv').on('click', function(e) {
            division.draw();
        });

        $("#addDivision").on('click', function(e) {
            e.preventDefault();
            var action = $(this).attr('data-href');
            $("#divisionForm form #id").val("");
            $("#divisionForm form").attr("action", action)
            $("#divisionForm").modal('show');

            $("#divisionForm form").on('submit', function(e) {
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
                    $("#divisionForm").modal('hide');
                    division.draw();
                })
            })
        });


      
        $("#jnsDivisionTable").on('click', '.jnsDivisionEdit', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var action = $(this).attr('data-href');
            var id = $(this).attr("data-id");
            $("#divisionForm form #id").val(id);
            $("#divisionForm form").attr("action", action)

            $.ajax({
                type: "GET"
                , url: href

            }).done(function(data) {
                $("#divisionForm form #id").val(data.id);
                $("#divisionForm form #name").val(data.name);
                $("#divisionForm form #client_id").val(data.client_id);
               

                $("#divisionForm").modal('show');

            });
            var onsubmit = false;



            $("#divisionForm form").on('submit', function(e) {
                e.preventDefault();
                onsubmit = true;
                if (onsubmit) {
                    $.ajax({
                        type: "POST"
                        , url: $(this).attr('action')
                        , data: $(this).serialize()
                    , }).done(function(data) {
                        $("#divisionForm").modal('hide');
                        division.draw();
                        onsubmit = false;
                    });
                } else {
                    console.log('submit on progress');
                }
            });



        });
        $("#jnsDivisionTable").on('click', '.jnsDivisionDelete', function(e) {
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
                        division.draw();
                    }
                });
            }


        })

    }
    jnsDivisionTable();

</script>
@endsection
