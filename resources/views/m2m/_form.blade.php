<form method="POST" action="{{ route('m2m.users.store') }}">
    @csrf
    <div class="row">
        
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">Client</label>
                <select class="form-control" name="client_id">
                    @foreach ($clients as $client )
                                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                                @endforeach
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Api Key</label>
                <input class="form-control" id="name" type="text" name="api_key" placeholder="API key">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">Division</label>
                <select class="form-control" name="division_id">
                    @foreach ($divisions as $division )
                    <option value="{{$division['id']}}">{{$division['name']}}</option>
                @endforeach
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" type="text" name="username" placeholder="Username">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Access mode</label>
                <div>
                <input type="checkbox" name="access_mode[]" value="1"> HTTP <br />
                <input type="checkbox" name="access_mode[]" value="2"> HTTP Alert <br />
                <input type="checkbox" name="access_mode[]" value="4"> OTP <br />
                <input type="checkbox" name="access_mode[]" value="8"> Call <br />
            </div>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" id="password" type="text" name="password" placeholder="password">
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

