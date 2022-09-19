
   function tablecrud(){

   
   $("button.btn-modal-new-form").on("click",function(){
        page = $(this).attr('target-url');
        modaltarget = $(this).attr("target-modal")
        $.ajax({
            url:page
        }).done(function(res){
            $(modaltarget+" .modal-body").html(res);
            $(modaltarget).modal('show');
        })
    });

    $("a.update-modal-form").on("click",function(e){
        e.preventDefault();
        page = $(this).attr('href');
        modaltarget = $(this).attr("target-modal")
        $.ajax({
            url:page
        }).done(function(res){
            $(modaltarget+" .modal-body").html(res);
            $(modaltarget).modal('show');
        })
    });
    $("a.ajax-delete").on("click",function(e){
        e.preventDefault();
        page = $(this).attr('href');
        console.log(page)
        if(confirm("Are you sure wnat to delete?")){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:page,
                method: 'POST',
            }).done(function(res){
                location.reload();
            });
        }
        
    });
}
tablecrud();

