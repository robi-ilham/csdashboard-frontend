<form method="POST" action="{{ route('wai.users.store') }}">
    @csrf
    
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" type="text" name="username" placeholder="Username">
              </div>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="username">Password</label>
                <input class="form-control" type="password" id="password" type="text" name="password" placeholder="password">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="username">Password Confirm</label>
                <input class="form-control" type="password" id="password_confirmation" type="text" name="password_confirmation" placeholder="Confirm Password">
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
                @foreach ($divisions['data'] as $division )
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

