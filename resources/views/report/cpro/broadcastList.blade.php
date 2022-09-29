@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">PREFIX JNS</div>

                <div class="card-body">
                    
                   <table class="table table-bordered table-striped" id="report-cpro-broadcast">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th><th>Client</th><th>Division</th><th>Status</th><th>Report Format</th><th>Request date </th>
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


      jnsPrefix = $('#report-cpro-broadcast').DataTable({
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
              "url": "{{ route('report.cpro.broadcast-list-data') }}",
              "data": function(data) {
              }
     

          },
          "columns": [{
                  data: 'DT_RowIndex',
                  name: 'DT_RowIndex'
              },
              {
                  data: 'name',
                  name: 'name'
              },
              {
                  data: 'regex',
                  name: 'regex'
              },
              

          ]
          
      });

      $('#btnSearchPrefix').on('click', function(e) {
          e.preventDefault();
          jnsPrefix.draw();
      });
  });
</script>
  
@endsection
