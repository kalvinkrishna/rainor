<?php
Route::prefix('cart')->group(function() {
    Route::get('/list/all', 'CartController@listCart');
    Route::post('add','CartController@addCart');
    Route::get('list/delete/{id}','CartController@deleteCart');
    Route::get('list/delete/{id}/{qty}','CartController@deleteCart');
});