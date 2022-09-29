@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">TOKEN BALANCE JNS</div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped" id="jns-token">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Account Number</th>
                                    <th>Account Type </th>
                                    <th>Owner</th>
                                    <th>Balance</th>
                                    <th>Description</th>
                                    <th>Expiry</th>
                                    <th>Modified</th>
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
    </div>


    <script type="text/javascript">
        $(function() {
            $('#end_date,#start_date').datepicker({
                format: 'yyyy-mm-dd',
            });




            jnsPrivilege = $('#jns-token').DataTable({
                //"order": [[ 8, "desc" ]],
                // "scrollX": true,
                "lengthChange": false,
                //  "paging": true,
                // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
                "pageLength": 20,
                "searching": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('information.tokenbalance.data') }}",
                    "data": function(data) {
                        // Read values
                        // var model = $('#searchJnsAudit #model').val();
                        // var client_id = $('#searchJnsAudit #client_id').find(':selected').val();
                        // var division_id = $('#m2mUssearchJnsAuditerSearchForm #division_id').find(
                        //     ':selected').val();
                        // var event = $('#searchJnsAudit #event').val();
                        // var start_date = $('#searchJnsAudit #start_date').val();
                        // var end_date = $('#searchJnsAudit #end_date').val();

                        // // Append to data
                        // data.model = model;
                        // data.client_id = client_id;
                        // data.division_id = division_id;
                        // data.event=event;
                        // data.start_date=start_date;
                        // data.end_date=end_date;
                    }

                },
                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'account_number',
                        name: 'account_number'
                    },
                    {
                        data: 'account_type_id',
                        name: 'account_type_id'
                    },
                    {
                        data: 'owner_id',
                        name: 'owner_id'
                    },
                    {
                        data: 'balance',
                        name: 'balance'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'expiry',
                        name: 'expiry'
                    },

                    {
                        data: 'modified',
                        name: 'modified'
                    },
                    //   {
                    //     data: 'action', 
                    //     name: 'action', 
                    //     orderable: true, 
                    //     searchable: true
                    // },

                ],
                "columnDefs": [{

                        "targets": [2],
                        render: function(data, type, row) {

                            if (row.account_type_id == 1) {

                                return 'PREPAID';

                            } else if (row.account_type_id == 2) {

                                return 'POSTPAID';

                            } else if (row.account_type_id == 3) {

                                return 'HYBRID';

                            }
                        }

                    },
                    {
                        "targets": [3],
                        render: function(data, type, row) {

                            if (row.owner_id == 1) {

                                return 'JATIS';

                            } else if (row.owner_id == 3) {

                                return 'BCA';

                            } else if (row.owner_id == 9) {

                                return 'TANGCITY';

                            } else if (row.owner_id == 10) {

                                return 'PT. DWIDAYA WORLDWIDE';

                            } else if (row.owner_id == 11) {

                                return 'PT. Gloria Origita Cosmetics';

                            } else if (row.owner_id == 10) {

                                return 'PT. Inti Selaras Mandiri';

                            } else if (row.owner_id == 11) {

                                return '= PT.PMC Teamindo Global';

                            }
                        }
                    }
                ]

            });

            $('#btnSearchPrefix').on('click', function(e) {
                e.preventDefault();
                jnsPrefix.draw();
            });
        });
    </script>
@endsection
