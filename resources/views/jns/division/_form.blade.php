<form method="POST" action="{{ route('jns.divisions.store') }}">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="CLient Name">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">Client</label>
                <select class="form-control" name="client_id">
                    @foreach ($clients['data'] as $client )
                        <option value="<?=$client['id']?>" ><?=$client['name']?></option>
                    @endforeach
                </select>
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">BA Type</label>
                <select class="form-control" name="ba_type" id="ba_type">
                        <option value="0" >POSTPAID</option>
                        <option value="0" >PREPAID_BY_CLIENT</option>
                        <option value="0" >PREPAID_BY_DIVISION</option>
                </select>
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">Token Type</label>
                <select class="form-control" name="token_type" id="token_type">
                        <option value="0" >POSTPAID</option>
                        <option value="0" >PREPAID_BY_CLIENT</option>
                        <option value="0" >PREPAID_BY_DIVISION</option>
                </select>
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">Owner</label>
                <select class="form-control" name="owner" id="owner">
                        <option value="0" >POSTPAID</option>
                        <option value="0" >PREPAID_BY_CLIENT</option>
                        <option value="0" >PREPAID_BY_DIVISION</option>
                </select>
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <input type="checkbox" name="broadcast"/> Broadcast JNS 6
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <input type="checkbox" name="wa"/> Whatsapp
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

