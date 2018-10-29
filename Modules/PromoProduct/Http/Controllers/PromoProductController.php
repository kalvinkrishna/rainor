<?php

namespace Modules\PromoProduct\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\PromoProduct\Entities\ProductPromo;
use Carbon\Carbon;

class PromoProductController extends Controller
{

    public function getListProduct(Request $request){

    }

    public function setProductPromo(Request $request){
        $data = $request->except("_token");
        
        $data['product_start'] = Carbon::now('Asia/Jakarta');
        $data['product_price'] = ($data['real_price'] + ($data['real_price'] * $data['priceInflasi'])) - ($data['real_price'] * $data['discount']);

        $product = new ProductPromo();
        $product->save($data);
    }

    public function getListPromo(Request $request){
        $product = new ProductPromo();
        return  $product->all();
    }

    
}
