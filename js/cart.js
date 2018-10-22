var click = true;

$(document).ready(() => {
    getList();

    $(".deleteProduct, .delete-count").on('click',function(){
        
        if($(this).hasClass('delete-count')){
            alert("yes");
            deleteProduct($(this).data('items'),$(this).parents().find('.quantity').val());
            getList();
            
            if($(this).parent().children('.quantity').val() == 0){
                $(this).parents(".media").remove();
            }
        } else {
            deleteProduct($(this).data('items'));   
            getList();
            $(this).parents(".media").remove();
        }
    });

    $(".plus-count").on('click',function(){
        addCart($(this).data('items'));
        getList();
    });
});

closeCart = () =>{
    $(".cartcontroller").css({
        "opacity" : '0',
        "width"   : '0%',
    });
}

openCart = () => {

        $(".cartcontroller").css({
            "opacity" : '1',
            "width"   : '24%',
        });
   
}

addCart = ($idproduct) => {
    var baseurl = $(document).find('.base_url').val();

    $.ajax({
        url : baseurl + "/cart/add",
        method: 'POST',
        data: {
            _token: $("input[name='_token']").val(),
            idproduct : $idproduct
        },
        success:function(result){
            if(result.status == "success"){
                getList();
            }
        },
        error:function(e){
            console.log(e);
        }
    });
}

getList = () => {
    var baseurl = $(document).find('.base_url').val();
    $.ajax({
        url: baseurl + "/cart/list/all",
        method: 'GET',
        success:function(result_dua){
            
            if(result_dua.status == "success"){
                $(".count").html(result_dua.result.count);
                $(".total").html(result_dua.result.price);
                $(".totalbarang").html(result_dua.result.count);
            }
        }
    });
}

deleteProduct = (deleteid,qty=null) => {
    var baseurl = $(document).find('.base_url').val();
    
    if(qty != null){
        $.ajax({
            url: baseurl + '/cart/list/delete/'+ deleteid + '/' + qty,
            method: 'GET',
            success:function(result){
                console.log(result);
            }
        });
    } else {
        $.ajax({
            url: baseurl + '/cart/list/delete/'+ deleteid,
            method: 'GET',
            success:function(result){
                console.log(result);
            }
        });
    }
}