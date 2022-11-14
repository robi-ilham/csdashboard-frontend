@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">CPRO BUTTON REQUEST</div>

            <div class="card-body">
                <div id="search-request" class="search-request row">

                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="division">CLient</label>
                            <select name="client_id" class="form-control" id="client_id">
                                <option value=""></option>
                                @foreach ($clients['query-result']['data'] as $client)
                                <option value="{{ $client['client-id'] }}">{{ $client['client-name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="division">Division</label>
                            <select name="division_id" class="form-control" id="division_id">
                                <option value=""></option>
                                @foreach ($divisions['query-result']['data'] as $division)
                                <option value="{{ $division['division-id'] }}">{{ $division['division-name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="division">Start Date</label>
                            <input name="start_date" id="start_date" class="form-control" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="division">End date</label>
                            <input name="end_date" id="end_date" class="form-control" />
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-success search-request text-white">Search</button>
                    </div>
                </div>
                <hr />
                <button class="btn btn-success request-button text-white">New Request</button>
                <table class="table table-bordered table-striped" id="report-cpro-chatbot">
                    <thead class="table-dark">
                        <tr>
                            <th>Request ID</th>
                            <th>Client</th>
                            <th>Division</th>
                            <th>Status</th>
                            <th>Request Date </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="request-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NEW BUTTON REQUEST</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>

                <form method="POST" action="{{ route('report.cpro.request.button') }}">
                    @csrf
                    <div class="row">

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">MSISDN</label>
                                <input name="msisdn" id="msisdn" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">CLient</label>
                                <select name="client_id" class="form-control" id="client_id">
                                    <option value=""></option>
                                    @foreach ($clients['query-result']['data'] as $client)
                                    <option value="{{ $client['client-id'] }}">{{ $client['client-name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">Division</label>
                                <select name="division_id" class="form-control" id="divison_id">
                                    <option value=""></option>
                                    @foreach ($divisions['query-result']['data'] as $division)
                                    <option value="{{ $division['division-id'] }}">{{ $division['division-name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">sender</label>
                                <select name="sender_id" class="form-control" id="sender_id">
                                    <option value=""></option>
                                    @foreach ($senders['Data'] as $sender)
                                    <option value="{{ $sender['sender-id'] }}">{{ $sender['sender-name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">header</label>
                                <select name="header" class="form-control" id="header">
                                    <option value=""></option>

                                </select>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">Report Format</label>
                                <input name="report_format" id="report_format" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">Button Format</label>
                                <input name="button_format" id="button_format" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">Template</label>
                                <select name="sender_id" class="form-control" id="sender_id">
                                    <option value=""></option>
                                    @foreach ($templates['data'] as $template)
                                    <option value="{{ $template['template-id'] }}">{{ $template['template-name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">Start Date</label>
                                <input name="start_date" id="start_date" class="form-control" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">End date</label>
                                <input name="end_date" id="end_date" class="form-control" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="">
                                <label class="form-label" for="group">&nbsp;</label>
                            </div>
                            <button type="submit" class="btn btn-success text-white">Save</button>
                        </div>



                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('#end_date,#start_date').datepicker({
            format: 'yyyy-mm-dd'
        , });

        jnsPrefix = $('#report-cpro-chatbot').DataTable({
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
                "url": "{{ route('report.cpro.button-list-data') }}"
                , "data": function(data) {

                    var client_id = $('#search-request #client_id').find(':selected').val();
                    var division_id = $('#search-request #division_id').find(':selected').val();
                    var start_date = $("#start_date").val();
                    var end_date = $("#end_date").val();

                    // Append to data
                    data.client_id = client_id;
                    data.division_id = division_id;
                    data.start_date = start_date;
                    data.end_date = end_date;
                }


            }
            , "columns": [{
                    data: 'requestid'
                    , name: 'requestid'
                }
                , {
                    data: 'client-name'
                    , name: 'client-name'
                }
                , {
                    data: 'division-name'
                    , name: 'division_name'
                }
                , {
                    data: 'status'
                    , name: 'status'
                },

                {
                    data: 'request-date'
                    , name: 'request_date'
                },


            ]
             
            , "columnDefs": [{

                "targets": [5]
                , render: function(data, type, row) {
                    var urlDetail = '{{ route("report.cpro.download.detail", ["requestid"=>":requestid"]) }}';
                    urlDetail = urlDetail.replace(':requestid', row.requestid);

                    var urlSummary = '{{ route("report.cpro.download.summary", ["requestid"=>":requestid"]) }}';
                    urlSummary = urlSummary.replace(':requestid', row.requestid);




                    return '<a href="' + urlDetail + '"  target="_blank"  class="edit btn btn-success text-white btn-sm ">Detail</a> <a href="' + urlSummary + '" target="_blank" class="delete btn btn-warning btn-sm text-white">Summary</a>'
                }

            }]

        });

        $('button.search-request').on('click', function(e) {
            e.preventDefault();
            jnsPrefix.draw();
        });
        $("button.request-button").on('click', function(e) {
            e.preventDefault();
            var action = $(this).attr('data-href');

            $("#request-modal").modal('show');

            $("#request-modal form").on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: $(this).attr('action')
                    , data: $(this).serialize()
                    , error: function(data) {
                        $.each(data.responseJSON, function(key, value) {
                            $(".alert.alert-danger").show();
                            $(".alert.alert-danger").html("<p>" + value + "</p>");
                        });
                    }
                , }).done(function(data, status) {
                    $("#request-modal").modal('hide');
                    jnsPrefix.draw();
                    //location.reload();
                })
            })
        });
        $('button.search-request').on('click', function(e) {
            e.preventDefault();
            jnsPrefix.draw();
        });
    });

</script>

@endsection
