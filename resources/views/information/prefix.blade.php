@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">PREFIX JNS</div>

                <div class="card-body">
                    
                   <table class="table table-bordered table-striped" id="jns-prefix">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th><th>Name</th><th>Regex</th><th>Regex Order</th><th>Provider</th><th>Description </th><th>created</th><th>Modified</th>
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
          format: 'yyyy-mm-dd',
      });




      jnsPrefix = $('#jns-prefix').DataTable({
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
              "url": "{{ route('information.prefix.data') }}",
              "data": function(data) {
                  // Read values
                  var model = $('#searchJnsAudit #model').val();
                  var client_id = $('#searchJnsAudit #client_id').find(':selected').val();
                  var division_id = $('#m2mUssearchJnsAuditerSearchForm #division_id').find(
                      ':selected').val();
                  var event = $('#searchJnsAudit #event').val();
                  var start_date = $('#searchJnsAudit #start_date').val();
                  var end_date = $('#searchJnsAudit #end_date').val();

                  // Append to data
                  data.model = model;
                  data.client_id = client_id;
                  data.division_id = division_id;
                  data.event=event;
                  data.start_date=start_date;
                  data.end_date=end_date;
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
              {
                  data: 'regex_order',
                  name: 'regex_order'
              },
              {
                  data: 'provider_id',
                  name: 'provider_id'
              },
              {
                  data: 'description',
                  name: 'description'
              },
              {
                  data: 'created',
                  name: 'created'
              },
              
              {
                  data: 'modified',
                  name: 'modified'
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
