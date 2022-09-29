@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">CPRO HELPDESK REQUEST</div>

                <div class="card-body">
                    
                   <table class="table table-bordered table-striped" id="report-cpro-helpdesk">
                    <thead class="table-dark">
                        <tr>
                            <th>Request ID</th><th>Client</th><th>Division</th><th>Status</th><th>Request Date </th>
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

      jnsPrefix = $('#report-cpro-helpdesk').DataTable({
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
              "url": "{{ route('report.cpro.helpdesk-list-data') }}",
              "data": function(data) {}
     

          },
          "columns": [{
                  data: 'request_id',
                  name: 'request_id'
              },
              {
                  data: 'client-name',
                  name: 'client-name'
              },
              {
                  data: 'division-name',
                  name: 'division_name'
              },
              {
                  data: 'status',
                  name: 'status'
              },
             
              {
                  data: 'request-date',
                  name: 'request_date'
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
