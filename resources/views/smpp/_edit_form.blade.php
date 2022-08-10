<form method="POST" action="{{ route('jns.division.update',['id'=>$id]) }}">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" value="{{$div['name']}}" id="name" type="text" name="name" placeholder="CLient Name">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="group">Client</label>
                <select class="form-control" name="client_id">
                    @foreach ($clients['data'] as $client )
                        <option value="<?=$client['id']?>"  @if($div['id']== $client['id']) selected @endif><?=$client['name']?></option>
                    @endforeach
                </select>
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

