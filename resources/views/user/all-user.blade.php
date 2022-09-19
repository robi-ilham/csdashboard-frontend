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
            
            <div class="tab-pane active mt-3 " id="jns">loading data jns..</div>
            <div class="tab-pane mt-3" id="cpro">loading data cpro..</div>
            <div class="tab-pane mt-3" id="m2m">loading data m2m..</div>
            <div class="tab-pane mt-3" id="smpp">loading data smpp..</div>
            <div class="tab-pane mt-3" id="wai">loading data WAI..</div>
            <div class="tab-pane   mt-3" id="cstools">loading data jns..</div>
          </div>
        </div>
    </div>
</div>
<div class="container-fluid">

  

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

  var url = active.attr("data-url");
    console.log(lastTab);
    $(lastTab).load(url+" .body",function(result){   
        tablecrud();
	  });
  
});


$('#myTabs a').click(function (e) {
	e.preventDefault();
  console.log('coba');
	var url = $(this).attr("data-url");
  	var href = this.hash;
  	var pane = $(this);
	
	// ajax load from data-url
	$(href).load(url+" .body",function(result){   
	    pane.tab('show');
        tablecrud();
	});
});


// $('#jns').load($('.nav-item a.active').attr("data-url")+" .body",function(result){
//   $('.active a').tab('show');
//   tablecrud();
// });

</script>
@endsection





