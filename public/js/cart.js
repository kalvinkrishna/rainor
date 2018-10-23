var click = true;

$(document).ready(() => {
    getList();

    $(".deleteProduct").on('click',function(){
        
        deleteProduct($(this).data('items'));   
        getList();
        $(this).parents(".media").remove();
        
    });

    $(document).on('click','.delete-count',function(){
        deleteProduct($(this).data('items'),$(this).parents().find('.quantity').val());
       
        if($(this).parents().find('.quantity').val() == 0){
                $(this).parents(".media").remove();
        }
    });
    $(document).on('click','.plus-count',function(){
        addCart($(this).data('items'));
    });

    $(document).on('click','.countdown',function(){
        this.parentNode.querySelector("input[type='number']").stepDown();
    });

    $(document).on('click','.countup',function(){
        this.parentNode.querySelector("input[type='number']").stepUp();
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
                let data = result_dua.result.data;
            
                $('.cartcontent').html("");
                $.each(data,function(index,value){
                    var imagePath = baseurl+'/image/';
                    try{
                        imagePath += value.photo[0].url;

                        let template = '<div class="media">';
                            template += '<span aria-hidden="true" class="deleteProduct" data-items="'+value.id+'">×</span>';
                            template += ' <img class="mr-3 img-thumbnail col-5" src="'+imagePath+'">';
                            template += '<div class="media-body">';
                            template += '<h5 class="mt-0">'+value.product_name+'</h5>';

                            template += '<div class="mt-12">';
                            template += ' <span>Hitam</span> - <span>XXL</span>';
                            template += '</div>';

                            template += '<br>';
                            template += ' <div class="mt-12">Rp.'+value.price+'</div>';
                            template += ' <div class="number-input">';
                            template += ' <button class="delete-count countdown" data-items="'+value.id+'"></button>';
                            template += ' <input class="quantity" min="0" name="quantity" value="'+value.count+'" type="number">';
                            template += ' <button class="plus plus-count countup" data-items="'+value.id+'"></button>';
                            template += '</div>';
                            template += '</div>';
                        template += '</div>';

                        $('.cartcontent').append(template);

                    } catch(e){


                        let template = '<div class="media">';
                            template += '<span aria-hidden="true" class="deleteProduct" data-items="'+value.id+'">×</span>';
                            template += ' <img class="mr-3 img-thumbnail col-5" src="'+imagePath+'500x500.png">';
                            template += '<div class="media-body">';
                            template += '<h5 class="mt-0">'+value.product_name+'</h5>';

                            template += '<div class="mt-12">';
                            template += ' <span>Hitam</span> - <span>XXL</span>';
                            template += '</div>';

                            template += '<br>';
                            template += ' <div class="mt-12">Rp.'+value.price+'</div>';
                            template += ' <div class="number-input">';
                            template += ' <button class="delete-count countdown" data-items="'+value.id+'"></button>';
                            template += ' <input class="quantity" min="0" name="quantity" value="'+value.count+'" type="number">';
                            template += ' <button class="plus plus-count countup" data-items="'+value.id+'"></button>';
                            template += '</div>';
                            template += '</div>';
                        template += '</div>';


                        $('.cartcontent').append(template);

                        return true;
                    }
                });
               
                
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
                if(result.status="success"){
                    getList();
                }
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