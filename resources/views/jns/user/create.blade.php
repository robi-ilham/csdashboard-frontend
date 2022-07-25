@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">CREATE JNS USER</div>

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
                                    <label class="form-label" for="group">Group</label>
                                    <input class="form-control" id="group" type="text" placeholder="Group">
                                  </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="division">Division</label>
                                    <input class="form-control" id="division" type="text" placeholder="Division">
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
                                    <input class="form-control" id="client" type="text" placeholder="Client">
                                  </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </form>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
