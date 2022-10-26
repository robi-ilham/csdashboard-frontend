@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ALERT</div>

                <div class="card-body">
                    <div id="searchJnsAudit">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="system_name">Alert Name</label>
                                    <input class="form-control "  id="name" type="text" placeholder="name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="system_name">Application</label>
                                    <input class="form-control " id="application" type="text" placeholder="application">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="system_name">date</label>
                                    <input class="form-control datepicker" value="{{date('Y-m-d')}}" id="created_at" type="text" placeholder="created_at">
                                </div>
                            </div>
                            <div class="col-12">
                                <button id="searchAuditJns" class="btn btn-success text-white">Search</button>
                            </div>
                    </div>
                    <table class="table table-bordered table-striped table-responsive mt-3" id="alert-table">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Application </th>
                                <th>Message</th>
                                <th>created</th>
                               
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
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });




            alertdata = $('#alert-table').DataTable({
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
                    "url": "{{ route('alerts.list') }}",
                    "data": function(data) {
                        // Read values
                        var name = $('#searchJnsAudit #name').val();
                        var application = $('#searchJnsAudit #application').val();
                        var created_at = $('#searchJnsAudit #created_at').val();
                        

                        // Append to data
                        data.created_at = created_at;
                        data.name=name;
                        data.application=application;
                        
                    }

                },
                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'application',
                        name: 'application'
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    

                ],
                
            });

            $('#searchAuditJns').on('click', function(e) {
                e.preventDefault();
                alertdata.draw();
            });
        });
    </script>
@endsection
