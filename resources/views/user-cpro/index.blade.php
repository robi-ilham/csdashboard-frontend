@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2>
    <table class="table table-bordered test-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                {{-- <th>action</th> --}}
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script type="text/javascript">

$(document).ready(function() {
  $('.test-datatable').DataTable( {
    //"order": [[ 8, "desc" ]],
   // "scrollX": true,
    "paging": true,
   // "lengthMenu": [[ 5, 15, 25, 100, -1 ], [ 5, 15, 25, 100, "All" ]],
    //"pageLength": 2,
    "processing": true,
    "serverSide": true,
    "ajax": {
      "url": "{{ route('jns.user.list') }}",
      "dataSrc": function(json) {
        json.recordsTotal = json.total;
        json.recordsFiltered = json.total;
        return json.data;
      }
    },
    "columns": [
        {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'}
             
              
    ]
  });
});
    // $(function () {
      
    //   var table = $('.yajra-datatable').DataTable({
    //       processing: true,
    //       serverSide: true,
    //       ajax: "{{ route('usercpro.users.list') }}",
    //       columns: [
    //           {data: 'id', name: 'id'},
    //           {data: 'name', name: 'name'},
    //           {data: 'email', name: 'email'},
             
    //           {
    //               data: 'action', 
    //               name: 'action', 
    //               orderable: true, 
    //               searchable: true
    //           },
    //       ]
    //   });
      
    // });
  </script>
@endsection