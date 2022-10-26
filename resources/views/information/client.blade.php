@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">JNS DIVISIONS</div>

                <div class="card-body">
                    <div class="card">
                        <div class="card-body" id="clientSearchForm">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Name</label>
                                            <input class="form-control" id="name" type="text" placeholder="name">
                                          </div>
                                    </div>
                                    
                                    <div class="col-4">
                                        <div class="">
                                            <label class="form-label" for="group">&nbsp;</label>
                                          </div>
                                        <button type="submit" class="btn btn-success text-white searchClient" id="searchClient">Search</button>
                                    </div>
                                </div>
                            
                                
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                        </div>
                    </div>
                   <table class="table table-bordered table-striped" id="clientTable">
                    <thead>
                        <tr class="table-dark">
                           <th></th><th>Code</th> <th>Client</th><th>API key</th><th>Status</th><th>Created</th><th>Modified</th>
                        </tr>
                    </thead>
                    
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




        client = $('#clientTable').DataTable({
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
                "url": "{{ route('information.client.data') }}",
                "data": function(data) {
                    // Read values
                    var name = $('#clientSearchForm #name').val();
                    var division_id = $('#m2mUssearchJnsAuditerSearchForm #division_id').find(
                        ':selected').val();
                    

                    // Append to data
                    data.name = name;
                    data.division_id = division_id;
               
                }

            },
            "columns": [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'api_key',
                    name: 'api_key'
                },
                {
                    data: 'active',
                    name: 'active'
                },
                {
                    data: 'created',
                    name: 'created'
                },
                {
                    data: 'modified',
                    name: 'modified'
                },
               

            ],
            // columnDefs: [{
            //     render: function(data, type, full, meta) {
            //         return "<div class='text-wrap width-300'>" + data + "</div>";
            //     },
            //     targets: 4
            // }]
        });

        $('#searchClient').on('click', function(e) {
            client.draw();
        });
    });
</script>
@endsection

  
