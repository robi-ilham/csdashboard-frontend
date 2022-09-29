@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">WA Template JNS</div>

                <div class="card-body">
                    
                   <table class="table table-bordered table-striped" id="wa-template">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th><th>Client </th><th>Mask</th><th>Message</th><th>Total Parameter</th><th>Languages</th><th>Status</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(function() {
  




      watemplate = $('#wa-template').DataTable({
          //"order": [[ 8, "desc" ]],
          // "scrollX": true,
          "lengthChange": false,
          //  "paging": true,
          // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
          "pageLength": 20,
          "searching": true,
          "processing": true,
          "serverSide": true,
          "ajax": {
              "url": "{{ route('information.watemplate.data') }}",
              "data": function(data) {
                  // Read values
                  // var model = $('#searchJnsAudit #model').val();
                  // var client_id = $('#searchJnsAudit #client_id').find(':selected').val();
                  // var division_id = $('#m2mUssearchJnsAuditerSearchForm #division_id').find(
                  //     ':selected').val();
                  // var event = $('#searchJnsAudit #event').val();
                  // var start_date = $('#searchJnsAudit #start_date').val();
                  // var end_date = $('#searchJnsAudit #end_date').val();

                  // // Append to data
                  // data.model = model;
                  // data.client_id = client_id;
                  // data.division_id = division_id;
                  // data.event=event;
                  // data.start_date=start_date;
                  // data.end_date=end_date;
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
                  data: 'mask.name',
                  name: 'mask_id'
              },
              {
                  data: 'message',
                  name: 'message'
              },
              {
                  data: 'total_parameter',
                  name: 'total_parameter'
              },
              {
                  data: 'languages',
                  name: 'languages'
              },
              {
                  data: 'status',
                  name: 'status'
              },
              

          ],
          

      });

      $('#btnSearchPrefix').on('click', function(e) {
          e.preventDefault();
          jnsPrefix.draw();
      });
  });
</script>
  
 
@endsection
