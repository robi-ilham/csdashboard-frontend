<form method="POST" action="{{ route('wai.user.update',['id'=>$id]) }}">
    @csrf
    
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" value="{{$user['username']}}" id="username" type="text" name="username" placeholder="Username">
              </div>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="username">Name</label>
                <input  value="{{$user['name']}}" class="form-control" type="text" id="name" type="text" name="name" placeholder="Name">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">Group</label>
                <select class="form-control" name="group_id">
                    <option  {{$user['group_id']==1?'selected':''}} value="1">Admministrator</option>
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
                        <option  {{$user['client_id']==$client['id']?'selected':''}} value="{{$client['id']}}">{{$client['name']}}</option>
                    @endforeach
                </select>
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">Division</label>
                <select class="form-control" name="division_id">
                @foreach ($divisions['data'] as $division )
                    <option  {{$user['division_id']==$division['id']?'selected':''}} value="{{$division['id']}}">{{$division['name']}}</option>
                @endforeach
                </select>
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="username">Sender</label>
                <input class="form-control" value="{{$user['sender_id']}}" type="text" id="sender_id" type="text" name="sender_id" placeholder="sender ID">
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

