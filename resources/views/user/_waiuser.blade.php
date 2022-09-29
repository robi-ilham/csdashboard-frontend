
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">WAI USERS</div>

                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
    
                            <form action="" id="waiSearchForm">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input class="form-control" id="username" type="text" placeholder="Username">
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="group">Client</label>
                                            <select class="form-control" name="client_id">
                                                <option value="">Select Client</option>
                                                @foreach ($clients as $client )
                                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="group">Division</label>
                                            <select class="form-control" name="division_id">
                                                <option value="">Select Division</option>
                                                @foreach ($divisions as $division )
                                <option value="{{$division['id']}}">{{$division['name']}}</option>
                            @endforeach
                                            </select>
                                          </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="">
                                            <label class="form-label" for="group">&nbsp;</label>
                                          </div>
                                        <button type="submit" class="btn btn-success text-white">Search</button>
                                    </div>
                                </div>
                            
                                
                            </form>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <Button class="btn btn-success text-white mb-3 " id="addwaiuser" data-href="{{ route('wai.users.store')}}">Add New</Button>
                        </div>
                    </div>
                   <table class="table table-bordered table-striped" id="wai-user-table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th><th>Division</th><th>Client</th><th>Sender</th><th>Name</th><th>Username</th><th>Created</th><th>Modified</th><th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    

                    </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>


  
  <!-- Modal -->
  <div class="modal fade" id="waiUserForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Division</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('wai.users.store') }}">
                @csrf
                <input type="hidden" name="id" id="id" value="" />
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input class="form-control" id="username" type="text" name="username" placeholder="Username">
                          </div>
                    </div>
            
                    <div class="col-12" id="password">
                        <div class="mb-3">
                            <label class="form-label" for="username">Password</label>
                            <input class="form-control" type="password"  type="text" name="password" placeholder="password">
                          </div>
                    </div>
                    <div class="col-12" id="password_confirmation">
                        <div class="mb-3">
                            <label class="form-label" for="username">Password Confirm</label>
                            <input class="form-control" type="password"  type="text" name="password_confirmation" placeholder="Confirm Password">
                          </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="username">Name</label>
                            <input class="form-control" type="text" id="name" type="text" name="name" placeholder="Name">
                          </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="group">Group</label>
                            <select class="form-control" name="group_id">
                                <option value="1">Admministrator</option>
                                <option value="2">Reporting</option>
                                <option value="4">Support</option>
                                
                            </select>
                          </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="group">Client</label>
                            <select class="form-control" name="client_id">
                                @foreach ($clients as $client )
                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="group">Division</label>
                            <select class="form-control" name="division_id">
                            @foreach ($divisions as $division )
                                <option value="{{$division['id']}}">{{$division['name']}}</option>
                            @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="username">Sender</label>
                            <input class="form-control" type="text" id="sender_id" type="text" name="sender_id" placeholder="sender ID">
                          </div>
                    </div>
            
                    <div class="col-12">
                        <div class="">
                            <label class="form-label" for="group">&nbsp;</label>
                          </div>
                        <button type="submit" class="btn btn-success text-white">Create</button>
                    </div>
            
            
            
                </div>
            </form>
            
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">

    function waiUserDatatable(){
        waiuser=$('#wai-user-table').DataTable( {
            //"order": [[ 8, "desc" ]],
           // "scrollX": true,
           "lengthChange": false,
          //  "paging": true,
           // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
            "pageLength": 5,
            "searching":false,
            "processing": true,
            "serverSide": true,
            "ajax": {
              "url": "{{route('wai.user.list')}}",
              "data": function(data){
              // Read values
              var username = $('#waisearchForm #username').val();
              var client_id = $('#waisearchForm #client_id').find(':selected').val();
              var division_id = $('#waisearchForm #division_id').find(':selected').val();
      
              // Append to data
              data.username = username;
              data.client_id=client_id;
              data.division_id=division_id;
            }
              
            },
            "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'division.name', name: 'division_id'},
                      {data: 'client.name', name: 'client_id'},
                      {data: 'sender_id', name: 'sender_id'},
                      {data: 'name', name: 'name'},
                      {data: 'username', name: 'username'},
                      {data: 'created', name: 'created'},
                      {data: 'modified', name: 'created'},
                      {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                      
            ]
          });
      
          $('#searchWaiUser').on('click', function (e) {
            e.preventDefault()
            waiuser.draw();
          });
    
          $("#addwaiuser").on('click',function(e){
            e.preventDefault();
            var action = $(this).attr('data-href');
            $("#waiUserForm form #id").val("");
            $("#waiUserForm form").attr("action",action)
            $("#waiUserForm").modal('show');
    
            $("#waiUserForm form").on('submit',function(e){
                e.preventDefault();
                console.log('submit')
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                  }).done(function (data) {
                    $("#waiUserForm").modal('hide');
                    waiuser.draw();
                  });
              })
          });
    
    
          $("#wai-user-table").on('click','.waiUserEdit',function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            var action = $(this).attr('data-href');
            var id =$(this).attr("data-id");
            $("#waiUserForm form #id").val(id);
            $("#waiUserForm form").attr("action",action)
            
    
            $.ajax({
              type:"GET",
              url:href
    
            }).done(function(data){
              $("#waiUserForm form #id").val(data.id);
              $("#waiUserForm form #name").val(data.name);
              $("#waiUserForm form #username").val(data.username);
              $("#waiUserForm form #password").hide();
              $("#waiUserForm form #password_confirmation").hide();
              $("#waiUserForm form #client_id").val(data.client_id);
              $("#waiUserForm form #division_id").val(data.division_id);
              $("#waiUserForm form #group_id").val(data.group_id);
              $("#waiUserForm form #sender_id").val(data.sender_id);
              
              $("#waiUserForm").modal('show');
              
            });
    
    
            $("#waiUserForm form").on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                  }).done(function (data) {
                    $("#waiUserForm").modal('hide');
                    waiuser.draw();
                  });
              })
    
            
            
          });
          $("#wai-user-table").on('click','.waiUserDelete',function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            var deleteConfirm = confirm("Are you sure?");
            const postFormData = {
                "_token": "{{ csrf_token() }}"
            }; 
            console.log(href);
            if(deleteConfirm){
              $.ajax({
              url: href,
              data:postFormData,
              type: 'post',
              success: function(response){
                 waiuser.draw();
              }
            });
            }
            
    
          })
          
    }
    </script>