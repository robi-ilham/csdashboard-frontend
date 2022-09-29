@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">DR LIST JNS</div>

                <div class="card-body">
                  <div id="searchJnsDrlist">
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
                                    id="btnSearchDrlist">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                    <table class="table table-bordered table-striped" id="jns-drlist">
                        <thead class="table-dark">
                            <tr>
                              <th>No</th>
                                <th>Client</th>
                                <th>Division </th>
                                <th>Mask</th>
                                <th>Provider</th>
                                <th>Category</th>
                                <th>callback_url</th>
                                <th>User</th>
                                <th>Password</th>
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

                    drlist = $('#jns-drlist').DataTable({
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
                                "url": "{{ route('information.drlist.data') }}",
                                "data": function(data) {
                                    // // Read values
                                    // var invalid_regex = $('#invalidForm #invalid_regex').val();


                                    // // Append to data
                                    // data.invalid_regex = invalid_regex;

                                }

                            },
                            "columns": [{
                                    data: 'DT_RowIndex',
                                    name: 'DT_RowIndex'
                                },
                                {
                                    data: 'client.name',
                                    name: 'client_id'
                                },
                                {
                                    data: 'division.name',
                                    name: 'division_id'
                                },

                                {
                                    data: 'mask_name',
                                    name: 'mask_name'
                                },
                                {
                                    data: 'provider_id',
                                    name: 'provider_id'
                                },


                                {
                                    data: 'category.name',
                                    name: 'drpush_category_id'
                                },
                                {
                                    data: 'callback_url',
                                    name: 'callback_url'
                                },
                                {
                                    data: 'user_id',
                                    name: 'user_id'
                                },
                                {
                                    data: 'password',
                                    name: 'password'
                                },

                            ],
                            "columnDefs": [{

                                    "targets": [2],
                                    render: function(data, type, row) {

                                        if (row.division_id == 0 ) {

                                            return 'All';

                                        }
                                      }

                                    }]
                            });

                        $('#btnSearchDrlist').on('click', function(e) {
                            e.preventDefault();
                            drlist.draw();
                        });
                    });
    </script>
@endsection
