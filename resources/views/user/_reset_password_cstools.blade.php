

          <form method="POST"  action="{{route('users.resetpassword')}}"   >
            <div class="alert alert-danger" style="display: none"></div>
            <input name="id" id="id" value="{{$id}}" type="hidden"/>
            @csrf
            <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="username">Old password</label>
                            <input class="form-control"  id="old_password" name="old_password" type="password" placeholder="Old password">
                          </div>
                    </div>
                    <div class="col-12" id="password">
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control"  type="password" name="password" placeholder="Password">
                          </div>
                    </div>
                    <div class="col-12" id="password_confirmation">
                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Retype Password</label>
                            <input class="form-control"  name="password_confirmation" type="password" placeholder="Retype Password">
                          </div>
                    </div>
                </div>
                
                
                
                <div class="col-12">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success text-white">Reset Password</button>
                      </div>
                </div>
            </form>