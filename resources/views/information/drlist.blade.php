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
                        <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">Client</label>
                                <select name="client_id" class="form-control" id="client_id">
                                    <option value="">All</option>

                                    @foreach ($clients as $client)
                                    <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">Division</label>
                                <select name="divison_id" class="form-control" id="divison_id">
                                    <option value=""></option>
                                    
                                    <option value="0">All Division</option>

                                    @foreach ($divisions as $division)
                                    <option value="{{ $division['id'] }}">{{ $division['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">Provider</label>
                                <select name="provider_id" class="form-control" id="provider_id">
                                    <option value=""></option>
                                    
                                    <option value="0">All Provider</option>

                                    @foreach ($providers as $provider)
                                    <option value="{{ $provider['id'] }}">{{ $provider['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">category</label>
                                <select name="drpush_category_id" class="form-control" id="drpush_category_id">
                                    <option value="">All</option>

                                    @foreach ($categories as $cat)
                                    <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="group">Type</label>
                                <select name="type" class="form-control" id="type">
                                    <option value=""></option>

                                    <option value="1">Push</option>
                                    <option value="2">Real Push</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success text-white" id="btnSearchDrlist">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered table-striped" id="jns-drlist">
                    <thead class="table-dark">
                        <tr>
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
                            <td>{{$user['division']['name']}}</td>
                        <td>{{$user['client']['name']}}</td>
                        <td><?= $user['api_key'] ?></td>
                        <td><?= $user['access_mod'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['created'] ?></td>
                        <td><?= $user['modified'] ?></td>
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

        drlist = $('#jns-drlist').DataTable({
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
                "url": "{{ route('information.drlist.data') }}"
                , "data": function(data) {
                    // Read values
                    var drpush_category_id = $('#searchJnsDrlist #drpush_category_id').val();
                    var division_id = $('#searchJnsDrlist #division_id').val();
                    var client_id = $('#searchJnsDrlist #client_id').val();
                    var type = $('#searchJnsDrlist #type').val();
                    var provider_id=$("#searchJnsDrlist #provider_id").val();


                    // Append to data
                    data.drpush_category_id = drpush_category_id;
                    data.client_id=client_id;
                    data.division_id=division_id;
                    data.type=type;
                    data.provider_id=provider_id;

                }

            }
            , "columns": [{
                    data: 'client.name'
                    , name: 'client_id'
                }
                , {
                    data: 'division.name'
                    , name: 'division_id'
                },

                {
                    data: 'mask_name'
                    , name: 'mask_name'
                }
                , {
                    data: 'provider_id'
                    , name: 'provider_id'
                },


                {
                    data: 'category.name'
                    , name: 'drpush_category_id'
                }
                , {
                    data: 'callback_url'
                    , name: 'callback_url'
                }
                , {
                    data: 'user_id'
                    , name: 'user_id'
                }
                , {
                    data: 'password'
                    , name: 'password'
                },

            ]
            , "columnDefs": [{

                "targets": [1]
                , render: function(data, type, row) {

                    if (row.division_id == 0) {

                        return 'All';

                    }else{
                        return row.division.name;
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
