@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">TOKEN MAP JNS</div>

            <div class="card-body">
                <div id="searchTokenMap">
                    <form method="GET" action="{{ route('jns.users.index') }}">
                        @csrf
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">Client</label>
                                <select name="client_id" class="form-control" id="client_id">
                                    <option value="">Division</option>

                                    @foreach ($clients as $client)
                                    <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">Division</label>
                                <select name="client_id" class="form-control" id="client_id">
                                    <option value="">division</option>

                                    @foreach ($divisions as $division)
                                    <option value="{{ $division['id'] }}">{{ $division['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success text-white" id="btnSearchTokenMap">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered table-striped" id="jns-tokenmap">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Client</th>
                            <th>Division </th>
                            <th>Mask</th>
                            <th>OTP</th>
                            <th>Non OTP</th>
                            <th>Created</th>
                            <th>Modified</th>
                            {{-- <th>OTP First Join  </th><th>Non OTP First Join</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($response['data'] as $user )
                            
                        <tr>
                            <td>{{$user['division']['name']}}</td>
                        <td>{{$user['client']['name']}}</td>
                        <td><?=$user['api_key'];?></td>
                        <td><?=$user['access_mod'];?></td>
                        <td><?=$user['username'];?></td>
                        <td><?=$user['created'];?></td>
                        <td><?=$user['modified'];?></td>
                        <td><a href="{{route('m2m.users.edit',['user'=>$user['id']])}}" target-modal="#m2mUserForm" class="btn btn-warning btn-sm text-white update-modal-form">Edit</a> <a href="{{route('m2m.users.delete',['user'=>$user['id']])}}" class="btn btn-danger btn-sm text-white ajax-delete">Delete</a> </td>
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





        jnsTokenmap = $('#jns-tokenmap').DataTable({
            //"order": [[ 8, "desc" ]],
            // "scrollX": true,
            "lengthChange": false,
              "paging": true,
            // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
            "pageLength": 10
            , "searching": true
            , "processing": true
            , "serverSide": true
            , "ajax": {
                "url": "{{ route('information.tokenmap.data') }}"
                , "data": function(data) {
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
                },"dataSrc":function(json){
                    json.recordsTotal = json.total;
                    json.dataFiltered = json.total;
                    return json.data;
                }

            }
            , "columns": [{
                    data: 'DT_RowIndex'
                    , name: 'DT_RowIndex'
                }
                , {
                    data: 'client.name'
                    , name: 'client_id'
                }
                , {
                    data: 'division.name'
                    , name: 'division_id'
                }
                , {
                    data: 'mask.name'
                    , name: 'mask_id'
                }
                , {
                    data: 'OTP'
                    , name: 'opt'
                }
                , {
                    data: 'NON OTP'
                    , name: 'opt'
                },

                // {
                //     data: 'description',
                //     name: 'description'
                // },
                // {
                //     data: 'expiry',
                //     name: 'expiry'
                // },

                {
                    data: 'created'
                    , name: 'created'
                }
                , {
                    data: 'modified'
                    , name: 'modified'
                },
                //   {
                //     data: 'action', 
                //     name: 'action', 
                //     orderable: true, 
                //     searchable: true
                // },

            ]
            
            , "columnDefs": [{

                "targets": [4]
                , render: function(data, type, row) {

                    if (row.otp == null) {

                        return 'no';

                    }else{
                        return 'yes';
                    }
                }

            },
        ]


        });

        $('#btnSearchPrefix').on('click', function(e) {
            e.preventDefault();
            jnsPrefix.draw();
        });
    });

</script>
@endsection
