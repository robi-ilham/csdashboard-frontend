@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">M2M USERS</div>

                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
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
                            <Button class="btn btn-success text-white btn-modal-new-form" target-modal="#m2mUserForm" target-url="{{ route('m2m.users.create')}}">Add New</Button>
                        </div>
                    </div>
                   <table class="table">
                    <thead>
                        <tr>
                            <th>Division</th><th>Client</th><th>APi Key</th><th>Access Mode</th><th>Username</th><th>Created</th><th>Modified</th><th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($response['data'] as $user )
                            
                        <tr>
                            <td>{{$user['division']['name']}}</td><td>{{$user['client']['name']}}</td>  <td><?=$user['api_key'];?></td><td><?=$user['access_mod'];?></td><td><?=$user['username'];?></td><td><?=$user['created'];?></td><td><?=$user['modified'];?></td><td><a href="{{route('m2m.users.edit',['user'=>$user['id']])}}" target-modal="#m2mUserForm" class="btn btn-warning btn-sm text-white update-modal-form">Edit</a> <a href="{{route('m2m.users.delete',['user'=>$user['id']])}}" class="btn btn-danger btn-sm text-white ajax-delete">Delete</a> </td>
                        </tr>
                        @endforeach

                    </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>


  
  <!-- Modal -->
  <div class="modal fade" id="m2mUserForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Division</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
