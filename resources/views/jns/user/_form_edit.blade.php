<form method="POST" action="{{route('jns.user.update',['id'=>$id])}}"   >
    @csrf
    <input type="hidden" value="{{$id}}" />
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" value="{{$user['name']}}" placeholder="Full name">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" name="username" type="text" value="{{$user['username']}}" placeholder="Username">
              </div>
        </div>
        
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">Group</label>
                <input class="form-control" id="group" name="group_id" type="text" placeholder="Group" value="{{$user['group_id']}}">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="division">Division</label>
                <input class="form-control" id="division" name="division_id" type="text" placeholder="Division" value="{{$user['division_id']}}">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">Client</label>
                <input class="form-control" id="client" name="client_id" type="text" placeholder="Client" value="{{$user['client_id']}}">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <button type="submit" class="btn btn-success text-white">Save</button>
              </div>
        </div>
    </div>
 