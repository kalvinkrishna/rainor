<?php
Route::prefix('product')->group(function() {
    Route::get('/collection/{category}', 'CategoryController@findcategory');
    Route::get('/collection/{category}/{subcategory}','CategoryController@findcategory');
    Route::get('/{category}','CategoryController@getProductByCategory');
});
