<form method="POST" action="{{ route('jns.https.store') }}">
    @csrf
    <div class="row">
        
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">Client</label>
                <select class="form-control" name="client_id">
                    
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Api Key</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="API key">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">Division</label>
                <select class="form-control" name="client_id">
                   
                </select>
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Username</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="CLient Name">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Access mode</label>
                <input type="checkbox"> OTP <br />
                <input type="checkbox"> HTTP <br />
                <input type="checkbox"> HTTP ALert <br />
                <input type="checkbox"> Call <br />
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Password</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="CLient Name">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Expiry</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="CLient Name">
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

