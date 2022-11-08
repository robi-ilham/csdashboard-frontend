@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> WA PUSH REQUEST LIST</div>

            <div class="card-body">
                <form method="POST" action="{{ route('report.request.wa.new') }}">
                    <div id="search-request" class="search-request row">

                        @csrf
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">CLient</label>
                                <select name="client_id" class="form-control" id="client_id">
                                    <option value=""></option>
                                    @foreach ($clients as $client)
                                    <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">Division</label>
                                <select name="division_id" class="form-control" id="division_id">
                                    <option value=""></option>
                                    @foreach ($divisions as $division)
                                    <option value="{{ $division['id'] }}">{{ $division['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">Mask</label>
                                <select name="mask_id" class="form-control" id="mask_id">
                                    <option value=""></option>
                                    @foreach ($masks as $mask)
                                    <option value="{{ $mask['id'] }}">{{ $mask['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="division">MSISDN</label>
                                <input name="msisdn" id="msisdn" class="form-control" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="division">Day</label>
                                <select name="day" class="form-control" id="day">
                                    <option value=""></option>
                                    @for ($d=1;$d<=31;$d++) <option value="{{ $d}}">{{ $d }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="division">Month</label>
                                <select name="month" class="form-control" id="month">
                                    <option value=""></option>
                                    @for ($m=1;$m<=12;$m++) <option value="{{ $m}}">{{ $m }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="division">Year</label>
                                <select name="year" class="form-control" id="year">
                                    <option value=""></option>
                                    @for ($y=2020;$y<=date('Y');$y++)
                                     <option value="{{ $y}}">{{ $y }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success text-white">Submit Request</button>
                        </div>
                    </div>
                </form>
            </div>
            <hr />
            <table class="table table-bordered table-striped" id="report-cpro-broadcast">
                <thead class="table-dark">
                    <tr>
                        <th>Client Name</th>
                        <th>Division Name</th>
                        <th>Request Spec</th>
                        <th>Day</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Output</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


{{-- <div class="modal fade" id="request-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NEW BROADCAST REQUEST</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>

                <form method="POST" action="{{ route('report.cpro.request.broadcast') }}">
@csrf
<div class="row">
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
            <label class="form-label" for="division">Report Format</label>
            <select name="report_format" class="form-control" id="report_format">
                <option value=""></option>

            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label class="form-label" for="division">MSISDN</label>
            <input name="msisdn" id="msisdn" class="form-control" />
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
            <label class="form-label" for="division">Batch Name</label>
            <input name="batchname" id="batchname" class="form-control" />
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
</div> --}}
<script type="text/javascript">
    $(function() {
        $('#end_date,#start_date').datepicker({
            format: 'yyyy-mm-dd'
        , });


        jnsPrefix = $('#report-cpro-broadcast').DataTable({
            //"order": [[ 8, "desc" ]],
            "scrollX": true
            , "lengthChange": false,
            //  "paging": true,
            // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
            "pageLength": 20
            , "searching": true
            , "processing": true
            , "serverSide": true
            , "ajax": {
                "url": "{{ route('report.request.wa.list') }}"
                , "data": function(data) {
                    // Read values
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
                    data: 'client_name'
                    , name: 'client_name'
                }
                , {
                    data: 'division_name'
                    , name: 'division_name'
                }
                , {
                    data: 'request_spec'
                    , name: 'request_spec'
                }

                , {
                    data: 'request_day'
                    , name: 'request_day'
                }
                , {
                    data: 'request_month'
                    , name: 'request_month'
                }
                , {
                    data: 'request_year'
                    , name: 'request_year'
                }

                , {
                    data: 'process_status'
                    , name: 'process_status'
                }
                , {
                    data: 'output'
                    , name: 'output'
                }




            ]

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
