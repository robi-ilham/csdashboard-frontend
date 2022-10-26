@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">CPRO SENDER</div>

                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" id="searchSenderForm">
                                
                                
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="group">Division</label>
                                        <select class="form-control" id="division_id" name="division_id">
                                          @foreach ($divisions["query-result"]["data"] as $division )
                                                <option value="{{$division['row-num']}}">{{$division['division-name']}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-3">
                                    <div class="">
                                        <label class="form-label" for="group">&nbsp;</label>
                                      </div>
                                    <button type="submit" class="btn btn-success text-white" id="btnSearchSender">Search</button>
                                </div>
                            </div>
                        
                            
                        </div>
                    </div>
                    
                   <table class="table table-bordered table-striped" id="sender-table">
                    <thead>
                        <tr>
                            <th>No</th><th>Sender ID</th><th>Sender Name</th>
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




      sender = $('#sender-table').DataTable({
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
              "url": "{{ route('cpro.senders.list') }}",
              "data": function(data) {
                  // Read values
                  var name = $('#clientSearchForm #name').val();
                  var division_id = $('#searchSenderForm #division_id').find(
                      ':selected').val();
                  

                  // Append to data
                  data.division_id = division_id;
             
              }

          },
          "columns": [{
                  data: 'DT_RowIndex',
                  name: 'DT_RowIndex'
              },
              {
                  data: 'sender-id',
                  name: 'sender_id'
              },
              {
                  data: 'sender-name',
                  name: 'sender_name'
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
