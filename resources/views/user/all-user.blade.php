@extends('layouts.app')

@section('content')
<div class="card">
    <div class="alert alert-success" style="display: none"></div>
    <div class="card-body">




        <ul class="nav nav-tabs" id="myTabs">

            <li class="nav-item "><a data-bs-toggle="tab" data-target="#jns" href="#jns" class="nav-link active" data-url="{{route('jns.users.index')}}">JNS</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" data-target="#cpro" href="#cpro" class="nav-link" data-url="{{route('cpro.users.index')}}">CPRO</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" data-target="#cpro" href="#m2m" class="nav-link" data-url="{{route('m2m.users.index')}}">M2M/HTTP</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" data-target="#cpro" href="#smpp" class="nav-link" data-url="{{route('smpps.users.index')}}">SMPP </a></li>
            <li class="nav-item"><a data-bs-toggle="tab" data-target="#cpro" href="#wai" class="nav-link" data-url="{{route('wai.users.index')}}">WAI</a></li>
            <li class="nav-item "><a data-bs-toggle="tab" data-target="#cstools" href="#cstools" class="nav-link" data-url="{{route('users.index')}}">CS TOOLS</a></li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active mt-3 " id="jns">
                @include('user._jnsuser')


            </div>
            <div class="tab-pane mt-3" id="cpro">@include('user._cproUser')</div>
            <div class="tab-pane mt-3" id="m2m">
                @include('user._m2muser')

            </div>
            <div class="tab-pane mt-3" id="smpp">
                @include('user._smppuser')
            </div>
            <div class="tab-pane mt-3" id="wai">@include('user._waiuser')</div>
            <div class="tab-pane   mt-3" id="cstools">@include('user._cstoolsuser').</div>
        </div>
    </div>
</div>
</div>



@endsection
@section('script')
<script type="text/javascript">
    $(function() {

        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('lastTab', $(this).attr('href'));
        });
        var lastTab = localStorage.getItem('lastTab');
        var active = $("a.active");
        if (lastTab) {
            var active = $('[href="' + lastTab + '"]');

        }
        active.tab('show');
        console.log(lastTab);
        var url = active.attr("data-url");
        if (lastTab == '#jns') {
            jnsUserDatatable();
            clientDropdown()
        } else if (lastTab == "#m2m") {
            m2mUserDatatable();
            clientDropdown()
        } else if (lastTab == "#smpp") {
            smppUserDatatable();
            clientDropdown()
        } else if (lastTab == "#wai") {
            waiUserDatatable();
            clientDropdown()
        } else if (lastTab == "#cpro") {
            cproUserDatatable();
            clientDropdown()
        } else if (lastTab == "#cstools") {
            cstoolsDataTable();
            clientDropdown();
        }

        // 
        // m2mUserDatatable();
    });


    $('#myTabs a').unbind().click(function(e) {
        e.preventDefault();
        clientDropdown();
        var url = $(this).attr("data-url");
        var href = this.hash;
        var pane = $(this);

        // ajax load from data-url


        if (href == "#jns") {
            jnsUserDatatable();
        } else if (href == "#m2m") {
            m2mUserDatatable();
        } else if (href == "#smpp") {
            smppUserDatatable();
        } else if (href == "#wai") {
            waiUserDatatable();
        } else if (href == "#cpro") {
            cproUserDatatable();
        } else if (href == "#cstools") {
            cstoolsDataTable();
        }

        // 
        // m2mUserDatatable();
    });

   
    function clientDropdown() {
        var path = "{{ route('jns.client.all') }}";
        $('.search-list .select-client,#client_id_1').select2({
            placeholder: 'Select client'
            , ajax: {
                url: path
                , dataType: 'json'
                , delay: 250
                , processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name
                                , id: item.id
                            }
                        })
                    };
                }
                , cache: true
            }
        });

        $('.search-list .select-client,#client_id_1').on('change', function() {
            $(".search-list .select-division").empty();
            let client_id = $(this).val();
            if (client_id) {
                var path = "{{ route('jns.divisions.all') }}?client_id=" + client_id;
                $('.search-list .select-division,#division_id_1').select2({
                    placeholder: 'Select division'
                    , ajax: {
                        url: path
                        , dataType: 'json'
                        , delay: 250
                        , processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.name
                                        , id: item.id
                                    }
                                })
                            };
                        }
                        , cache: true
                    }
                });
            }
        })
    }


    function modalSelect(modal) {
        var path = "{{ route('jns.client.all') }}";
        $('#client_id_1').select2({
          dropdownParent: $(".modalForm"),
            placeholder: 'Select client'
            , ajax: {
                url: path
                , dataType: 'json'
                , delay: 250
                , processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name
                                , id: item.id
                            }
                        })
                    };
                }
                , cache: true
            }
        });

        $('#client_id_1').on('change', function() {
            $("#division_id_1").empty();
            let client_id = $(this).val();
            if (client_id) {
                var path = "{{ route('jns.divisions.all') }}?client_id=" + client_id;
                $('#division_id_1').select2({
                  dropdownParent: $(".modalForm"),
                    placeholder: 'Select division'
                    , ajax: {
                        url: path
                        , dataType: 'json'
                        , delay: 250
                        , processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.name
                                        , id: item.id
                                    }
                                })
                            };
                        }
                        , cache: true
                    }
                });
            }
        })
    }

</script>
@endsection
