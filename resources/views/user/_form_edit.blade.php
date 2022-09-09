<form method="POST" action="{{ route('users.update',['id'=>$id]) }}">
    @csrf
    <div class="row">
        
      
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Name" value="{{$user[0]['name']}}">
              </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label" for="username">Email</label>
                <input class="form-control" id="email" type="text" name="email" placeholder="Email" value="{{$user[0]['email']}}">
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

