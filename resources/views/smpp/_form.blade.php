<form method="POST" action="{{ route('smpps.users.store') }}">
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
                <label class="form-label" for="name">batch Name</label>
                <input class="form-control" id="name" type="text" name="batchname" placeholder="Batch Name">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">Division</label>
                <select class="form-control" name="division">
                    @foreach ($divisions as $division )
                        <option value="{{$division['name']}}">{{$division['name']}}</option>
                    @endforeach
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Max Connection</label>
                <input class="form-control" id="name" type="text" name="max_connection" placeholder="max Connection">
              </div>
        </div>
      
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">System Id</label>
                <input class="form-control" id="name" type="text" name="system_id" placeholder="System ID">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Password</label>
                <input class="form-control" id="name" type="text" name="password" placeholder="Password">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">service Type</label>
                <select class="form-control" name="service_type">
                <option value="0">HTTP</option>
                <option value="1">ALERT</option>
                <option value="2">OTP</option>
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">DR Format</label>
                <input class="form-control" id="name" type="text" name="dr_format" placeholder="DR format">
              </div>
        </div>
        <div class="col-6">
            <input type="checkbox" name="use_optional_parameter" value="1"> use optional parameter
        </div>
        <div class="col-6">
            <input type="checkbox" name="use_expired_session" value="1"> use expired session
        </div>
        <div class="col-12">
            <div class="">
                <label class="form-label" for="group">&nbsp;</label>
              </div>
            <button type="submit" class="btn btn-success text-white">Create</button>
        </div>
    </div>
</form>

