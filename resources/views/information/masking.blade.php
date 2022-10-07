@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">MASKING JNS</div>

                <div class="card-body">
                    <div id="searchJnsMasking">
                        <form method="GET" action="{{ route('jns.users.index') }}">
                            @csrf
                            <div class="row">

                              <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="user">Masking</label>
                                    <input class="form-control" name="masking" id="masking" type="text"
                                        placeholder="User">
                                </div>
                            </div>
                              <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="group">Client</label>
                                    <select name="client_id" class="form-control" id="client_id">
                                        <option value="">Client</option>

                                        @foreach ($clients as $client)
                                            <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success text-white"
                                        id="btnSearchMasking">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                   <table class="table table-bordered table-striped" id="jns-mask">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th><th>Client</th><th>Masking</th><th>Description </th><th>Active</th><th>Created</th><th>Modified</th>
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




          jnsMask = $('#jns-mask').DataTable({
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
                  "url": "{{ route('information.masking.data') }}",
                  "data": function(data) {
                      // Read values
                      var masking = $('#searchJnsMasking #masking').val();
                      var client_id = $('#searchJnsMasking #client_id').find(':selected').val();
                    

                      // Append to data
                      data.masking = masking;
                      data.client_id = client_id;
                    
                  }

              },
              "columns": [{
                      data: 'DT_RowIndex',
                      name: 'DT_RowIndex'
                  },
                  {
                      data: 'client.client.name',
                      name: 'client_id'
                  },
                  {
                      data: 'name',
                      name: 'name'
                  },
                  {
                      data: 'description',
                      name: 'description'
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
                  //   {
                  //     data: 'action', 
                  //     name: 'action', 
                  //     orderable: true, 
                  //     searchable: true
                  // },

              ],
              columnDefs: [{
                  render: function(data, type,row) {
                    var clientList = "";
                    for (let key in row.clients){
                        console.log(row.clients[key].client.name);
                        clientList=clientList+row.clients[key].client.name+"<br/>";
                    }
                    return clientList;
                  },
                  targets: 1
              }]
          });

          $('#btnSearchMasking').on('click', function(e) {
              e.preventDefault();
              jnsMask.draw();
          });
      });
  </script>
@endsection
