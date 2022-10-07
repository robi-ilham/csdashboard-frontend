@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">



      
        <ul class="nav nav-tabs" id="myTabs">
          
            <li class="nav-item "><a data-bs-toggle="tab" data-target="#jns" href="#jns"  class="nav-link active" data-url="{{route('jns.users.index')}}">JNS</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" data-target="#cpro" href="#cpro" class="nav-link"  data-url="{{route('cpro.users.index')}}">CPRO</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" data-target="#cpro" href="#m2m" class="nav-link" data-url="{{route('m2m.users.index')}}">M2M/HTTP</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" data-target="#cpro" href="#smpp" class="nav-link" data-url="{{route('smpps.users.index')}}">SMPP </a></li>
            <li  class="nav-item"><a data-bs-toggle="tab" data-target="#cpro" href="#wai" class="nav-link" data-url="{{route('wai.users.index')}}">WAI</a></li>
            <li class="nav-item "><a data-bs-toggle="tab" data-target="#jns" href="#cstools"  class="nav-link" data-url="{{route('users.index')}}">CS TOOLS</a></li>
          </ul>
          
          <div class="tab-content">
            
            <div class="tab-pane active mt-3 " id="jns">
                @include('user._jnsuser')


            </div>
            <div class="tab-pane mt-3" id="cpro">@include('user._cprouser').</div>
            <div class="tab-pane mt-3" id="m2m">
              @include('user._m2muser')
            
            </div>
            <div class="tab-pane mt-3" id="smpp">
              @include('user._smppuser')
            </div>
            <div class="tab-pane mt-3" id="wai">@include('user._waiuser')</div>
            <div class="tab-pane   mt-3" id="cstools">loading data jns..</div>
          </div>
        </div>
    </div>
</div>

 

@endsection
@section('script')
<script type="text/javascript">

$(function() {
  
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
    localStorage.setItem('lastTab', $(this).attr('href'));
  });
  var lastTab = localStorage.getItem('lastTab');
  var active = $("a.active");
  if (lastTab) {
    var active= $('[href="' + lastTab + '"]');
    
  }
  active.tab('show');
  console.log(lastTab);
  var url = active.attr("data-url");
  if(lastTab=='#jns'){
    jnsUserDatatable();
  }else if(lastTab=="#m2m"){
    m2mUserDatatable();
  }else if(lastTab=="#smpp"){
    smppUserDatatable();
  }else if(lastTab=="#wai"){
    waiUserDatatable();
  }else if(lastTab=="#cpro"){
    cproUserDatatable();
  }
  else{
    $(lastTab).load(url+" .body",function(result){
      tablecrud();
    });
  }
  
  // 
  // m2mUserDatatable();
});


$('#myTabs a').click(function (e) {
	e.preventDefault();
  console.log('coba');
	var url = $(this).attr("data-url");
  	var href = this.hash;
  	var pane = $(this);
	
	// ajax load from data-url

  
  if(href=="#jns"){
    jnsUserDatatable();
  }else if(href=="#m2m"){
    m2mUserDatatable();
  }else if(href=="#smpp"){
    smppUserDatatable();
  }else if(href=="#wai"){
    waiUserDatatable();
  }else if(href=="#cpro"){
    cproUserDatatable();
  }else{
    $(href).load(url+" .body",function(result){
    tablecrud();
  });
  }
	// 
  // m2mUserDatatable();
});




</script>
@endsection





