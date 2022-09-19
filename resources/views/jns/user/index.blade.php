@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">JNS USERS</div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form method="GET" action="{{route('jns.users.index')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input class="form-control" id="username" type="text" placeholder="Username" name="username">
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="group">Group</label>
                                            <select name="group_id" class="form-control" id="group">
                                                <option value="">Group</option>
                                                @foreach ($groups as $group)
                                                    <option value="{{$group['id']}}">{{$group['name']}}</option>
                                                @endforeach
                                            </select> 
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="division">Division</label>
                                            <select name="division_id" class="form-control" id="divison">
                                                <option value="">DIvision</option>
                                                @foreach ($divisions['data'] as $division)
                                                    <option value="{{$division['id']}}">{{$division['name']}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Status</label>
                                            <input class="form-control" id="status" type="text" placeholder="Status">
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="group">Client</label>
                                            <select name="client_id" class="form-control" id="client_id">
                                                <option value="">Client</option>

                                                @foreach ($clients as $client)
                                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success text-white">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <Button class="btn btn-success text-white btn-modal-new-form" target-modal="#userForm" target-url="{{ route('jns.users.create')}}">Add New</Button>
                        </div>
                    </div>
                   <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th><th>Email</th><th>Username</th><th>client</th><th>group</th><th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['data'] as $user)
                        <tr>
                            <td>{{$user['name']}}</td><td>{{$user['email']}}</td> <td>{{$user['username']}}</td><td>{{$user['client_id']}}</td>  <td>{{$user['group_id']}}</td><td><a href="{{route('jns.users.edit',['user'=>$user['id']])}}" target-modal="#userForm" class="btn btn-warning btn-sm text-white update-modal-form">Edit</a> <a href="{{route('jns.user.delete',['user'=>$user['id']])}}" class="btn btn-danger btn-sm text-white ajax-delete">Delete</a></td>
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
  <div class="modal fade" id="userForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User</h5>
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

