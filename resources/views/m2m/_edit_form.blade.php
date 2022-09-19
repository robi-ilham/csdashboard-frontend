<form method="POST" action="{{ route('m2m.user.update',['id'=>$id]) }}">
    @csrf
    <input type="hidden" name="id" value="{{$id}}" />

    <div class="row">
        
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">Client</label>
                <select class="form-control" name="client_id">
                    @foreach ($clients as $client )
                                                    <option {{ $user['client_id']== $client['name'] ? 'selected':'' }} value="{{$client['id']}}">{{$client['name']}}</option>
                                                @endforeach
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Api Key</label>
                <input class="form-control" id="name" type="text" name="api_key" value="{{$user['api_key']}}" placeholder="API key">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">Division</label>
                <select class="form-control" name="division_id">
                    @foreach ($divisions as $division )
                    <option {{ $user['division_id']== $division['name'] ? 'selected':'' }} value="{{$division['id']}}">{{$division['name']}}</option>
                @endforeach
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" type="text" value="{{$user['username']}}" name="username" placeholder="Username">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Access mode</label>
                <div>
                <input type="checkbox" {{ in_array(1,$accessMod) ? 'checked':''}} name="access_mode[]" value="1"> HTTP <br />
                <input type="checkbox" {{ in_array(2,$accessMod) ? 'checked':''}} name="access_mode[]" value="2"> HTTP Alert <br />
                <input type="checkbox" {{ in_array(4,$accessMod) ? 'checked':''}} name="access_mode[]" value="4"> OTP <br />
                <input type="checkbox" {{ in_array(8,$accessMod) ? 'checked':''}} name="access_mode[]" value="8"> Call <br />
            </div>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" value="{{$user['password']}}" id="password" type="text" name="password" placeholder="password">
              </div>
        </div>
        
        <div class="col-12">
            <div class="">
                <label class="form-label" for="group">&nbsp;</label>
              </div>
            <button type="submit" class="btn btn-success text-white">Update</button>
        </div>
    </div>
</form>

