<?php
Route::prefix('cart')->group(function() {
    Route::get('/list/all', 'CartController@listCart');
    Route::post('add','CartController@addCart');
});