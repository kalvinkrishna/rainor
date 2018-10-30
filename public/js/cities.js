$(document).ready(function(){
    
    $.ajax({
        url: "/cities/list/"+ $("select[name='State']").val(),
        method : "GET",
        success : function(result){
            
            $("select[name='Cities']").html("");

            $.each(result,function(index,value){
                $("select[name='Cities']").append("<option value='"+value.id_city+"'>"+value.name+"</option>");
            });   
        }
    });

    $("select[name='Country']").on('change',function(){
        alert($(this).val());
        $.ajax({
            url: "/cities/list/"+$(this).val(),
            method: "GET",
            success : function(result){
                $("select[name='Cities']").html("");
                $.each(result,function(index,value){
                    $("select[name='Cities']").append("<option value='"+value.id+"'>"+value.name+"</option>");
                });
            }
        }); 
    });

    $(document).on("change","select[name='State']",function(){
        var city = $(this).val();

        $.ajax({
            url: "/cities/list/"+$(this).val(),
            method : "GET",
            success : function(result){
                
                $("select[name='Cities']").html("");

                $.each(result,function(index,value){ console.log(value);
                    $("select[name='Cities']").append("<option value='"+value.id_city+"'>"+value.name+"</option>");
                });   
            }
        });
    });
});