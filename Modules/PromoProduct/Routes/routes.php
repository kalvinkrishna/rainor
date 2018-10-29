<?php
Route::group('product',function(){
    Route::get('/collection/promo','PromoProductController@getListPromo');
});

?>