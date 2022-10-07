@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">PREFIX JNS</div>

            <div class="card-body">
                <div id="searchJnsPrefix">
                    <form method="GET" action="{{ route('jns.users.index') }}">
                        @csrf
                        <div class="row">


                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="group">Provider</label>
                                    <select name="provider_id" class="form-control" id="provider_id">
                                        <option value="">Provider</option>

                                        @foreach ($providers as $provider)
                                        <option value="{{ $provider['id'] }}">{{ $provider['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="user">Description</label>
                                    <input class="form-control" name="description" id="description" type="text" placeholder="description">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success text-white" id="btnSearchPrefix">Search</button>
                                </div>
                            </div>
                    </form>
                </div>
                <table class="table table-bordered table-striped" id="jns-prefix">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Regex</th>
                            <th>Regex Order</th>
                            <th>Provider</th>
                            <th>Description </th>
                            <th>created</th>
                            <th>Modified</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {


        jnsPrefix = $('#jns-prefix').DataTable({
            //"order": [[ 8, "desc" ]],
            // "scrollX": true,
            "lengthChange": false,
            //  "paging": true,
            // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
            "pageLength": 20
            , "searching": true
            , "processing": true
            , "serverSide": true
            , "ajax": {
                "url": "{{ route('information.prefix.data') }}"
                , "data": function(data) {
                    // Read values
                    var description = $('#searchJnsPrefix #description').val();
                    var provider_id = $('#searchJnsPrefix #provider_id').find(':selected').val();


                    // Append to data
                    data.description = description;
                    data.provider_id = provider_id;
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
                    data: 'regex'
                    , name: 'regex'
                }
                , {
                    data: 'regex_order'
                    , name: 'regex_order'
                }
                , {
                    data: 'provider.name'
                    , name: 'provider_id'
                }
                , {
                    data: 'description'
                    , name: 'description'
                }
                , {
                    data: 'created'
                    , name: 'created'
                },

                {
                    data: 'modified'
                    , name: 'modified'
                },
                //   {
                //     data: 'action', 
                //     name: 'action', 
                //     orderable: true, 
                //     searchable: true
                // },

            ],

        });

        $('#btnSearchPrefix').on('click', function(e) {
            e.preventDefault();
            jnsPrefix.draw();
        });
    });

</script>

@endsection
