
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

            $(modaltarget+" form").on('submit',function(e){
                e.preventDefault();
                href = $(this).attr('action');
                data= $(this).serialize();
                $.ajax({
                    url:href,
                    data:data,
                    method:"POST",
                    succes:function(res){
                        alert(res);
                    },
                    error:function(data){
                        var errs="";
                        $.each(data.responseJSON.errors, function(key, value) {
                            console.log(value);
                            errs+="<p>"+value+"</p>";
                        });
                            $(".alert.alert-danger").html(errs);
                            $(".alert.alert-danger").show();

                    }
                })
            })

        })
    });
    $("a.ajax-delete").on("click",function(e){
        e.preventDefault();
        page = $(this).attr('href');
        console.log(page)
        if(confirm("Are you sure want to delete?")){
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

