@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">CPRO SENDER</div>

                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                                
                            
                                
                            </form>
                        </div>
                    </div>
                    
                   <table class="table">
                    <thead>
                        <tr>
                            <th>Sender ID</th><th>Sender Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($response['Data'] as $sender )
                            
                        <tr>
                            <td>{{$sender['sender-id']}}</td><td>{{$sender['sender-name']}}</td> 
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
