@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">INVALID WORDING JNS</div>

                <div class="card-body">
                    <div class="row" id="invalidForm">
                      <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="user">Invalid regex</label>
                            <input class="form-control" name="invalid_regex" id="invalid_regex" type="text"
                                placeholder="User">
                        </div>
                        <div class="col-6">
                          <div class="mb-3">
                              <button id="searchInvalidJns" class="btn btn-success mb-3 text-white" >Search</button>
                          </div>
                      </div>
                    </div>
                    </div>
                   <table class="table table-bordered table-striped" id="jns-invalidword">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th><th>ID</th><th>Invalid Regex </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($response['data'] as $user )
                            
                        <tr>
                            <td>{{$user['division']['name']}}</td><td>{{$user['client']['name']}}</td>  <td><?=$user['api_key'];?></td><td><?=$user['access_mod'];?></td><td><?=$user['username'];?></td><td><?=$user['created'];?></td><td><?=$user['modified'];?></td><td><a href="{{route('m2m.users.edit',['user'=>$user['id']])}}" target-modal="#m2mUserForm" class="btn btn-warning btn-sm text-white update-modal-form">Edit</a> <a href="{{route('m2m.users.delete',['user'=>$user['id']])}}" class="btn btn-danger btn-sm text-white ajax-delete">Delete</a> </td>
                        </tr>
                        @endforeach --}}

                    </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>


  
<script type="text/javascript">
  $(function() {

      invalidRegex = $('#jns-invalidword').DataTable({
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
              "url": "{{ route('information.invalidwording.data') }}",
              "data": function(data) {
                  // Read values
                  var invalid_regex = $('#invalidForm #invalid_regex').val();
           

                  // Append to data
                  data.invalid_regex = invalid_regex;
                
              }

          },
          "columns": [{
                  data: 'DT_RowIndex',
                  name: 'DT_RowIndex'
              },
              {
                  data: 'invalid_regex',
                  name: 'invalid_regex'
              },
          
              {
                  data: 'created',
                  name: 'created'
              },
             

          ]
      });

      $('#searchInvalidJns').on('click', function(e) {
          e.preventDefault();
          invalidRegex.draw();
      });
  });
</script>
@endsection

