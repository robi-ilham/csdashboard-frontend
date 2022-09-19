<form method="POST" action="{{route('jns.users.store')}}"   >
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" id="name" type="text" name="name" placeholder="Full name">
                  </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="Email">
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
        </div>
        <div class="col-6">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="group">Group</label>
                    <select name="group_id" class="form-control" id="group">
                        @foreach ($groups as $group)
                            <option value="{{$group['id']}}">{{$group['name']}}</option>
                        @endforeach
                    </select>                  </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="group">Client</label>
                    <select name="client_id" class="form-control" id="client_id">
                        @foreach ($clients as $client)
                            <option value="{{$client['id']}}">{{$client['name']}}</option>
                        @endforeach
                    </select>                  </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="division">Division</label>
                    <select name="division_id" class="form-control" id="divison">
                        @foreach ($divisions['data'] as $division)
                            <option value="{{$division['id']}}">{{$division['name']}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="group">Expiry Mode</label>
                        <select class="form-control" name="expiry_mode_id">
                            <option value="1">Date</option>
                            <option value="2">Month</option>
                            <option value="3">Year</option>
                        </select>
                    </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="form-label">Expiry</label>
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" name="expiry" id="expiry"/>
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
 <script type="text/javascript">
$(function(){
  $('#datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-1d'
});
});
</script>