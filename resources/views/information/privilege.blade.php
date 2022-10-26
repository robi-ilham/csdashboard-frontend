@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">PRIVILEGE JNS</div>

                <div class="card-body">
                    <div id="searchJnsPrivilege">
 
                            <div class="row">
    
    
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="user">Type</label>
                                        <select name="privilege_type_id" class="form-control" id="privilege_type_id">
                                            <option value=""></option>
                                            @foreach ($type as $t )
                                            <option value="{{$t['id']}}">{{$t['name']}}</option>
                                            @endforeach
                                            

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-success text-white" id="btnSearchPrivilege">Search</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                   <table class="table table-bordered table-striped" id="jns-privilege">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th><th>Client</th><th>Division </th><th>Privilege Type</th><th>Enabled </th><th>State</th><th>Created</th><th>Modified</th>
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



      jnsPrivilege = $('#jns-privilege').DataTable({
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
              "url": "{{ route('information.privilege.data') }}",
              "data": function(data) {
                  // Read values
                  var privilege = $('#searchJnsPrivilege #privilege').val();
                  

                  // Append to data
                  data.privilege = privilege;
                  
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
                  data: 'division.name',
                  name: 'division_id'
              },
              {
                  data: 'type.name',
                  name: 'type.name'
              },
              {
                  data: 'enable',
                  name: 'enable'
              },
              {
                  data: 'state',
                  name: 'state'
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

      $('#btnSearchPrivilege').on('click', function(e) {
          e.preventDefault();
          jnsPrivilege.draw();
      });
  });
</script>
@endsection
