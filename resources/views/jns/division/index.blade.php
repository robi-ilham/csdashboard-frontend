@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">JNS DIVISIONS</div>

                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Name</label>
                                            <input class="form-control" id="username" type="text" placeholder="Username">
                                          </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="group">Client</label>
                                            <input class="form-control" id="client" type="text" placeholder="Client">
                                          </div>
                                    </div>
                                    <div class="col-4">
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
                            <Button class="btn btn-success text-white btn-modal-new-form" target-modal="#divisionForm" target-url="{{ route('jns.divisions.create')}}">Add New</Button>
                        </div>
                    </div>
                   <table class="table">
                    <thead>
                        <tr>
                            <th>Division</th><th>Client</th><th>Created</th><th>Modified</th><th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['data'] as $division )
                            
                        <tr>
                            <td>{{$division['name']}}</td><td>{{$division['client']['name']}}</td>  <td><?=$division['created'];?></td><td><?=$division['modified'];?></td><td><a href="{{route('jns.divisions.edit',['division'=>$division['id']])}}" target-modal="#divisionForm" class="btn btn-warning btn-sm text-white update-modal-form">Edit</a> <a href="{{route('jns.division.delete',['division'=>$division['id']])}}" class="btn btn-danger btn-sm text-white ajax-delete">Delete</a> </td>
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
  <div class="modal fade" id="divisionForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
