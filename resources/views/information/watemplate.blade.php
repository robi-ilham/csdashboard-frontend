@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">WA Template JNS</div>

                <div class="card-body">
                    
                   <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th><th>Client </th><th>Mask</th><th>Message</th><th>Total Parameter</th><th>Languages</th><th>Status</th>
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
