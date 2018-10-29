$(document).ready(function(){
    
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

    $(document).on("change","select[name='Cities']",function(){
        var city = $(this).val();

        $.ajax({
            url: "/cities/list/"+$(this).val(),
            method : "GET",
            success : function(result){
                
                $("select[name='State']").html("");

                $.each(result,function(index,value){
                    $("select[name='State']").append("<option value='"+value.id+"'>"+value.name+"</option>");
                });   
            }
        });
    });
});