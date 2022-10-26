@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Webhook</div>

            <div class="card-body">


                <table class="table table-bordered table-striped table-responsive" id="webhook-table">
                    <thead>
                        <tr class="table-dark">
                            <th>No</th>
                            <th>Shortcode</th>
                            <th>Queue</th>
                            <th>Url Mapping</th>
                            
                            <th>Created</th>
                            <th>Modified</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(function() {
        $('#end_date,#start_date').datepicker({
            format: 'yyyy-mm-dd'
        , });




        webhook = $('#webhook-table').DataTable({
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
                "url": "{{ route('cpro.webhook.list') }}"
                , "data": function(data) {
                    // Read values
                    var name = $('#clientSearchForm #name').val();
                    var division_id = $('#searchSenderForm #division_id').find(
                        ':selected').val();


                    // Append to data
                    data.division_id = division_id;

                }

            }
            , "columns": [{
                    data: 'DT_RowIndex'
                    , name: 'DT_RowIndex'
                }
                , {
                    data: 'Shortcode'
                    , name: 'shortcode'
                }
                , {
                    data: 'Queue'
                    , name: 'queue'
                }
                , {
                    data: 'URLMapping'
                    , name: 'url'
                }
                // , {
                //     data: 'CreateBy'
                //     , name: 'create'
                // }
                // , {
                //     data: 'ModifyBy'
                //     , name: 'modify'
                // }
                , {
                    data: 'CreateDate'
                    , name: 'created'
                }
                , {
                    data: 'ModifyDate'
                    , name: 'modified'
                }



            ],
            // columnDefs: [{
            //     render: function(data, type, full, meta) {
            //         return "<div class='text-wrap width-300'>" + data + "</div>";
            //     },
            //     targets: 4
            // }]
        });

        $('#btnSearchSender').on('click', function(e) {
            sender.draw();
        });
    });

</script>
@endsection
