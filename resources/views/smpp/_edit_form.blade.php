<form method="POST" action="{{ route('smpps.user.update',['id'=>$id]) }}">
    @csrf
    <input type="hidden" name="id" value="{{$id}}" />
    <div class="row">
        
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group"  >Client</label>
                <select class="form-control" name="client_id" disabled readonly="true">
                    @foreach ($clients as $client )
                        <option {{ $client['id'] == $user['client_id'] ? 'selected':'' }}  value="{{$client['id']}}">{{$client['name']}}</option>
                    @endforeach
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">System Id</label>
                <input readonly class="form-control" id="name" value="{{$user['system_id']}}" type="text" name="system_id" placeholder="System ID">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="upload_by">Upload by</label>
                <input class="form-control" id="upload_by" value="{{$user['upload_by']}}" type="text" name="upload_by" placeholder="Upload By">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">batch Name</label>
                <input class="form-control" id="name" value="{{$user['batchname']}}" type="text" name="batchname" placeholder="Batch Name">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">Division</label>
                <select class="form-control" name="division">
                    @foreach ($divisions as $division )
                        <option {{ $division['name'] == $user['division'] ? 'selected':'' }}  value="{{$division['name']}}">{{$division['name']}}</option>
                    @endforeach
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Max Connection</label>
                <input class="form-control" id="name" type="text" value="{{$user['max_connection']}}" name="max_connection" placeholder="max Connection">
              </div>
        </div>
      
        
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Password</label>
                <input class="form-control" id="name" value="{{$user['password']}}" type="text" name="password" placeholder="Password">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">service Type</label>
                <select class="form-control" name="service_type">
                <option {{ $user['service_type'] == 0 ? 'selected':'' }}  value="0">HTTP</option>
                <option {{ $user['service_type'] == 1 ? 'selected':'' }} value="1">ALERT</option>
                <option {{ $user['service_type'] == 2 ? 'selected':'' }} value="2">OTP</option>
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">DR Format</label>
                <input class="form-control" value="{{$user['dr_format']}}" id="name" type="text" name="dr_format" placeholder="DR format">
              </div>
        </div>
        <div class="col-6">
            <input type="checkbox" {{$user['use_optional_parameter']==true?'checked':''}}  name="use_optional_parameter" value="1"> use optional parameter
        </div>
        <div class="col-6">
            <input type="checkbox" {{$user['use_expired_session']==true?'checked':''}} name="use_expired_session" value="1"> use expired session
        </div>
        <div class="col-12">
            <div class="">
                <label class="form-label" for="group">&nbsp;</label>
              </div>
            <button type="submit" class="btn btn-success text-white">Update</button>
        </div>
    </div>
</form>

