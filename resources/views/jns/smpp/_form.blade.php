<form method="POST" action="{{ route('jns.divisions.store') }}">
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
                <label class="form-label" for="name">batch Name</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Batch Name">
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
                <label class="form-label" for="name">Max Connection</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="CLient Name">
              </div>
        </div>
      
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">System Id</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="CLient Name">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="name">Password</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Password">
              </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label" for="group">service Type</label>
                <select class="form-control" name="client_id">
                   
                </select>
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

