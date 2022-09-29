@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">AUDIT TRAIL JNS</div>

                <div class="card-body">
                    <div id="searchJnsAudit">
                        <form method="GET" action="{{ route('jns.users.index') }}">
                            @csrf
                            <div class="row">


                                {{-- <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="division">Division</label>
                                        <select name="division_id" class="form-control" id="divison">
                                            <option value="">DIvision</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division['id'] }}">{{ $division['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="group">Client</label>
                                        <select name="client_id" class="form-control" id="client_id">
                                            <option value="">Client</option>

                                            @foreach ($clients as $client)
                                                <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="group">Event Audit</label>
                                        <select name="event" class="form-control" id="event">
                                            <option value="">Event</option>
                                            <option value="create">CREATE</option>
                                            <option value="edit">EDIT</option>
                                            <option value="delete">DELETE</option>
                                            <option value="delete">DOWNLOAD</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="user">User</label>
                                        <input class="form-control" name="model" id="model" type="text"
                                            placeholder="User">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="start_date">Start date</label>
                                        <input class="form-control" id="start_date" type="text" placeholder="start date"
                                            name="start_date">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="end_date">End date</label>
                                        <input class="form-control" id="end_date" type="text" placeholder="end date"
                                            name="end_date">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success text-white"
                                        id="searchAuditJns">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered table-striped table-responsive" id="jns-audittrail">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Event</th>
                                <th>Model </th>
                                <th>Entity ID</th>
                                <th>Json Object</th>
                                <th>Description</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($response['data'] as $user)
                            
                        <tr>
                            <td>{{$user['division']['name']}}</td><td>{{$user['client']['name']}}</td>  <td><?= $user['api_key'] ?></td><td><?= $user['access_mod'] ?></td><td><?= $user['username'] ?></td><td><?= $user['created'] ?></td><td><?= $user['modified'] ?></td><td><a href="{{route('m2m.users.edit',['user'=>$user['id']])}}" target-modal="#m2mUserForm" class="btn btn-warning btn-sm text-white update-modal-form">Edit</a> <a href="{{route('m2m.users.delete',['user'=>$user['id']])}}" class="btn btn-danger btn-sm text-white ajax-delete">Delete</a> </td>
                        </tr>
                        @endforeach --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(function() {
            $('#end_date,#start_date').datepicker({
                format: 'yyyy-mm-dd',
            });




            jnsAuditTrail = $('#jns-audittrail').DataTable({
                //"order": [[ 8, "desc" ]],
                // "scrollX": true,
                "lengthChange": false,
                //  "paging": true,
                // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
                "pageLength": 20,
                "searching": false,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('information.audittrail.data') }}",
                    "data": function(data) {
                        // Read values
                        var model = $('#searchJnsAudit #model').val();
                        var client_id = $('#searchJnsAudit #client_id').find(':selected').val();
                        var division_id = $('#m2mUssearchJnsAuditerSearchForm #division_id').find(
                            ':selected').val();
                        var event = $('#searchJnsAudit #event').val();
                        var start_date = $('#searchJnsAudit #start_date').val();
                        var end_date = $('#searchJnsAudit #end_date').val();

                        // Append to data
                        data.model = model;
                        data.client_id = client_id;
                        data.division_id = division_id;
                        data.event=event;
                        data.start_date=start_date;
                        data.end_date=end_date;
                    }

                },
                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'event',
                        name: 'event'
                    },
                    {
                        data: 'model',
                        name: 'model'
                    },
                    {
                        data: 'entity_id',
                        name: 'entity_id'
                    },
                    {
                        data: 'json_object',
                        name: 'json_object'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'created',
                        name: 'created'
                    },
                    //   {
                    //     data: 'action', 
                    //     name: 'action', 
                    //     orderable: true, 
                    //     searchable: true
                    // },

                ],
                columnDefs: [{
                    render: function(data, type, full, meta) {
                        return "<div class='text-wrap width-300'>" + data + "</div>";
                    },
                    targets: 4
                }]
            });

            $('#searchAuditJns').on('click', function(e) {
                e.preventDefault();
                jnsAuditTrail.draw();
            });
        });
    </script>
@endsection
