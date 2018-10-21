var click = true;

$(document).ready(() => {
    getList();
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
            console.log(result_dua);
            if(result_dua.status == "success"){
                $(".count").html(result_dua.result.count);
            }
        }
    });
}