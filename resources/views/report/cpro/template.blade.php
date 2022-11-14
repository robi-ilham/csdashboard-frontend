@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">CPRO CHATBOT REQUEST</div>

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
                       
    
    
                       
                        <div class="col-12">
                            <button class="btn btn-success search-request text-white">Search</button>
                        </div>
                    </div>
                    <hr/>
                   <table class="table table-bordered table-striped" id="report-cpro-chatbot">
                    <thead class="table-dark">
                        <tr>
                            <th>Client Name</th><th>template Name</th><th>Media Type</th><th>Param Size</th><th>Message</th>
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

    $('#end_date,#start_date').datepicker({
            format: 'yyyy-mm-dd'
        , });
        
      jnsPrefix = $('#report-cpro-chatbot').DataTable({
          //"order": [[ 8, "desc" ]],
          // "scrollX": true,
          "lengthChange": false,
          //  "paging": true,
          // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
          "pageLength": 10,
          "searching": false,
          "processing": true,
          "serverSide": true,
          "ajax": {
              "url": "{{ route('report.cpro.templatedata') }}",
              "data": function(data) {

                var client_id = $('#search-request #client_id').find(':selected').val();
                    var division_id = $('#search-request #division_id').find(':selected').val();
                    var start_date = $("#start_date").val();
                    var end_date = $("#end_date").val();

                    // Append to data
                    data.client_id = client_id;
                    data.division_id = division_id;
              }
                   
     

          },
          "columns": [
              {
                  data: 'client-name',
                  name: 'client-name'
              },
              {
                  data: 'template-name',
                  name: 'template-name'
              },
              {
                  data: 'media-type',
                  name: 'media'
              },
             
              {
                  data: 'param-size',
                  name: 'param'
              },
              {
                  data: 'raw-message',
                  name: 'message'
              },

          ]
          
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
