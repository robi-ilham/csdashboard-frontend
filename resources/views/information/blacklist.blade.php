@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">BLACKLIST NUMBER JNS</div>

                <div class="card-body">
                    <div id="searchJnsBlacklist">
                        <form method="GET" action="{{ route('jns.users.index') }}">
                            @csrf
                            <div class="row">

                              <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="user">MSISDN</label>
                                    <input class="form-control" name="msisdn" id="msisdn" type="text"
                                        placeholder="User">
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
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success text-white"
                                        id="btnSearchBlacklist">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered table-striped" id="jns-blacklist">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>MSISDN </th>
                                <th>Client</th>
                                <th>Mask ID</th>
                                <th>created</th>
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


    <script type="text/javascript">
        $(function() {



            blacklist = $('#jns-blacklist').DataTable({
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
                    "url": "{{ route('information.blacklist.data') }}",
                    "data": function(data) {
                        // Read values
                        var msisdn = $('#searchJnsBlacklist #msisdn').val();
                        var client_id = $('#searchJnsBlacklist #client_id').find(':selected').val();


                        // Append to data
                        data.msisdn = msisdn;
                        data.client_id = client_id;
                    }

                },
                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'msisdn',
                        name: 'msisdn'
                    },
                    {
                        data: 'client_id',
                        name: 'client_id'
                    },
                    {
                        data: 'mask_id',
                        name: 'mask_id'
                    },
                    
                    {
                        data: 'created',
                        name: 'created'
                    },
                    {
                        data: 'modified',
                        name: 'modified'
                    }
                    //   {
                    //     data: 'action', 
                    //     name: 'action', 
                    //     orderable: true, 
                    //     searchable: true
                    // },

                ]
            });

            $('#btnSearchBlacklist').on('click', function(e) {
                e.preventDefault();
                blacklist.draw();
            });
        });
    </script>
@endsection
