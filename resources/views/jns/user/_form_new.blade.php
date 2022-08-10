<form method="POST" action="{{route('jns.users.store')}}"   >
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Full name">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" name="username" type="text" placeholder="Username">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" id="password" type="password" name="password" placeholder="Password">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="password_confirmation">Retype Password</label>
                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Retype Password">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">Group</label>
                <input class="form-control" id="group" name="group_id" type="text" placeholder="Group">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="division">Division</label>
                <input class="form-control" id="division" name="division_id" type="text" placeholder="Division">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">Client</label>
                <input class="form-control" id="client" name="client_id" type="text" placeholder="Client">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <button type="submit" class="btn btn-success text-white">Save</button>
              </div>
        </div>
    </div>
 