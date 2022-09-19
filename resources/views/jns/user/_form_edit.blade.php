<form method="POST" action="{{route('jns.user.update',['id'=>$id])}}"   >
    @csrf
    <input type="hidden" value="{{$id}}" />
    <div class="row">
        <div class="col-6">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" id="name" type="text" name="name" placeholder="Full name" value="{{$user['name']}}">
                  </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="Email" value="{{$user['email']}}">
                  </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" id="username" name="username" type="text" placeholder="Username" value="{{$user['username']}}">
                  </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="group">Group</label>
                    <select name="group_id" class="form-control" id="group">
                        @foreach ($groups as $group)
                            <option {{ $group['id'] == $user['group_id'] ? 'selected':'' }} value="{{$group['id']}}">{{$group['name']}}</option>
                        @endforeach
                    </select>                  </div>
            </div>
        </div>
        <div class="col-6">
            
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="group">Client</label>
                    <select name="client_id" class="form-control" id="client_id">
                        @foreach ($clients as $client)
                            <option {{ $client['id'] == $user['client_id'] ? 'selected':'' }} value="{{$client['id']}}">{{$client['name']}}</option>
                        @endforeach
                    </select>                  </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="division">Division</label>
                    <select name="division_id" class="form-control" id="divison">
                        @foreach ($divisions['data'] as $division)
                            <option {{ $division['id'] == $user['division_id'] ? 'selected':'' }} value="{{$division['id']}}">{{$division['name']}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="group">Expiry Mode</label>
                        <select class="form-control" name="expiry_mode_id">
                            <option {{ $user['expiry_mode_id']==1 ? 'selected':'' }} value="1">Date</option>
                            <option {{ $user['expiry_mode_id']==2 ? 'selected':'' }} value="2">Month</option>
                            <option {{ $user['expiry_mode_id']==3 ? 'selected':'' }} value="3">Year</option>
                        </select>
                    </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="form-label">Expiry</label>
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" name="expiry" value="{{$user['expiry']}}" id="expiry"/>
                        <span class="input-group-append">
                          <span class="input-group-text bg-light d-block">
                            <svg class="nav-icon" style="width: 20px;height:20px">
                                <use xlink:href="{{ asset('/vendors/@coreui/icons/svg/free.svg#cil-calendar') }}"></use>
                              </svg>
                          </span>
                        </span>
                      </div>
                </div>
            </div>
        </div>
        
        
        <div class="col-12">
            <div class="mb-3">
                <button type="submit" class="btn btn-success text-white">Save</button>
              </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(function(){
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-1d'
    });
    });
    </script>