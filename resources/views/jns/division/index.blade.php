@extends('layouts.app')

@section('content')
<div class="">
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

                                        </select>
                                    </div>
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
                            <Button id="addDivision" data-href="{{route('jns.divisions.store')}}" class="btn btn-success float-left mb-3 text-white" id="addDivision">Add New</Button>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped" id="jnsDivisionTable">
                        <thead>
                            <tr class="table-dark">
                                <th>Division</th>
                                <th>Client</th>
                                <th>BA Type</th>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" id="division_name" type="text" name="division_name" placeholder="Division Name">
                                <input type="hidden" name="division_id" id="division_id">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="group">Client</label>
                                <input name="client_name" id="select-client" placeholder="click to select client" class="form-control" readonly />
                                <input name="client_id" id="client_id" type="hidden" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="group">BA Type</label>
                                <select class="form-control" name="ba_type" id="ba_type">
                                    <option value="0">POSTPAID</option>
                                    <option value="1">PREPAID_BY_CLIENT</option>
                                    <option value="2">PREPAID_BY_DIVISION</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="group">Token Type</label>
                                <select class="form-control" name="token_type" id="token_type">
                                    <option value="0">POSTPAID</option>
                                    <option value="1">PREPAID_BY_CLIENT</option>
                                    <option value="2">PREPAID_BY_DIVISION</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="group">Owner</label>
                                <select class="form-control" name="i_arm_id" id="owner">

                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="checkbox" name="broadcast" /> Broadcast JNS 6
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="checkbox" name="wa" /> Whatsapp
                            </div>
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

<div class="modal fade" id="client-list-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Clients</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped" id="pct-client">
                    <tr class="table-dark">
                        <th>Select</th>
                        <th>Client Name</th>
                        <th>PIC</th>
                    </tr>
                </table>
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
    function loadClient() {
        client = $('#pct-client').DataTable({
            //"order": [[ 8, "desc" ]],
            // "scrollX": true,
            "destroy": true
            , "lengthChange": false,
            //  "paging": true,
            // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
            "pageLength": 10
            , "searching": true
            , "processing": true
            , "serverSide": true
            , "ajax": {
                "url": "{{route('jns.client.list')}}"
                , "data": function(data) {}

            }
            , "columns": [{
                    data: 'szDivision'
                    , name: 'division_name'
                }
                , {
                    data: 'szClient'
                    , name: 'name'
                }
                , {
                    data: 'detail.szFirstName'
                    , name: 'pic'
                }



            ]
            , "columnDefs": [{

                    "targets": [0]
                    , render: function(data, type, row) {



                        var type = 0;
                        if (row.config != null) {
                            type = row.config.iPaymentTypeId
                        }

                        return '<a href="#" data-type="' + type + '" data-name="' + row.szClient + '"  data-id="' + row.iId + '" class="edit btn btn-success text-white btn-sm select-client">Select</a>'
                    }

                }
                , {

                    "targets": [2]
                    , render: function(data, type, row) {



                        if (row.detail == null) {
                            return "-";
                        } else {
                            return row.detail.szFirstName;
                        }

                    }

                }

            ]
        }, );

        $("#pct-client").on('click', 'a.select-client', function() {
            id = $(this).attr('data-id');
            name = $(this).attr('data-name');
            type = $(this).attr('data-type');
            $("#divisionForm #select-client").val(name);
            $("#divisionForm #client_id").val(id);
            $("#divisionForm #ba-type").val(type);
            $("#divisionForm #token-type").val(type);
            var client = '<option value="' + id + '">' + name + '</option>';
            $("#searchDivision #client_id").html(client);
            $.ajax({
                url: "{{route('jns.owner.list')}}"
                , method: "get"
                , data: "id=" + id
                , success: function(res) {
                    console.log(res);
                    var opt = '';
                    $.each(res, function(index, data) {
                        console.log(data);
                        opt = opt + '<option select="' + data.iARMId + '">' + data.szARMName + '</option>';

                    })
                    $("#divisionForm #owner").html(opt);
                    $("#client-list-modal").modal('hide');
                }
                , error: function(res) {
                    alert('error');

                }
            })

        })
    }

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
                    data.division_name = name;
                    data.client_id = client_id;
                }

            }
            , "columns": [{
                    data: 'szDivision'
                    , name: 'division_name'
                }
                , {
                    data: 'client.szClient'
                    , name: 'client_id'
                }
                , {
                    data: 'client.config.iPaymentTypeId'
                    , name: 'batype'
                }
                , {
                    data: 'dtmDateInserted'
                    , name: 'created'
                }
                , {
                    data: 'dtmDateUpdated'
                    , name: 'created'
                }


            ]
            , "columnDefs": [{

                    "targets": [5]
                    , render: function(data, type, row) {
                        var division_id = row.iId;
                        var divisionName = row.szDivision;
                        var clientId = row.iClientId;
                        var ClientName = row.client.szClient;
                        var baType = (row.config != null) ? client.config.iPaymentTypeId : 0;



                        return '<a href="#"  data-id="' + division_id + '" data-divisionName="' + divisionName + '" data-clientid="' + clientId + '" data-clientName="' + ClientName + '" data-batype="' + baType + '" class="edit btn btn-success text-white btn-sm jnsDivisionEdit">Edit</a>'
                    }

                }
                , {

                    "targets": [2]
                    , render: function(data, type, row) {
                        if (row.client.config == null) {
                            return '-';
                        } else {
                            if (row.client.config.iPaymentTypeId == 1) {
                                return 'PREPAID_BY_CLIENT';
                            } else if (row.client.config.iPaymentTypeId == 2) {
                                return 'PREPAID_BY_DIVISION';
                            } else {
                                return 'POSTPAID';
                            }
                        }

                        //return '<a href="' + urlEdit + '" data-href="' + urlUpdate + '" data-id="' + row.id + '" class="edit btn btn-success text-white btn-sm jnsDivisionEdit">Edit</a>'
                    }

                }
            ]
        }, );

        $('#searchDiv').on('click', function(e) {
            division.draw();
        });
        $("#select-client,#searchDivision #client_id").on('click', function() {
            $("#client-list-modal").modal('show');
            loadClient();
        });
        $("#addDivision").on('click', function(e) {
            e.preventDefault();
            var action = $(this).attr('data-href');
            $("#divisionForm form #division_id").val("");
            $("#divisionForm form #division_name").val("");
            $("#divisionForm form #ba_type").val("").attr('disabled',false);
            $("#divisionForm form #token_type").val("").attr('disabled',false);
            $("#divisionForm form #owner").val("").attr('disabled',false);;
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
                    location.reload();
                    //division.draw();
                })
            })
        });



        $("#jnsDivisionTable").on('click', '.jnsDivisionEdit', function(e) {
            e.preventDefault();
            var updateUrl = '{{route("jns.division.update",["id"=>1])}}';
            $("#divisionForm form").attr("action", updateUrl)

            var divisionId = $(this).attr('data-id');
            var divisionName = $(this).attr('data-divisionName');
            var clientId = $(this).attr('data-clientId');
            var clientName = $(this).attr('data-clientName');
            var batype = $(this).attr('data-batype');

            $("#divisionForm form #division_id").val(divisionId);
            $("#divisionForm form #division_name").val(divisionName);
            $("#divisionForm form #select-client").val(clientName);
            $("#divisionForm form #client_id").val(clientId);
            $("#divisionForm form #ba_type").val(batype).attr('disabled',true);
            $("#divisionForm form #token_type").val(batype).attr('disabled',true);
            $("#divisionForm form #owner").val("").attr('disabled',true);;
            $.ajax({
                url: "{{route('jns.owner.list')}}"
                , method: "get"
                , data: "id=" + clientId
                , success: function(res) {
                    console.log(res);
                    var opt = '';
                    $.each(res, function(index, data) {
                        console.log(data);
                        opt = opt + '<option select="' + data.iARMId + '">' + data.szARMName + '</option>';

                    })
                    $("#divisionForm #owner").html(opt);
                    $("#client-list-modal").modal('hide');
                }
                , error: function(res) {
                    alert('error');

                }
            })
            $("#divisionForm").modal('show');





            $("#divisionForm form").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                , }).done(function(data) {
                    $("#divisionForm").modal('hide');
                    location.reload();
                    //division.draw();
                    onsubmit = false;
                });

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
