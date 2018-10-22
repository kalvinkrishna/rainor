<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Nwidart\Modules\Facades\Module;

use Modules\Product\Entities\Product;

class CategoryController extends Controller
{
    public function __construct(){
        if(Module::find('Cart')){
            $this->CartController = \Modules\Cart\Http\Controllers\CartController::class;
        }
    }
    public function findcategory(Request $request, $category, $subcategory = null){
        $product = new Product;
        $data = [
            "content" => empty($subcategory) ? $product->getAllProduct($category) : $product->getAllProduct($category,$subcategory),
            "category"=> $category,
            'cart'    => app($this->CartController)->getlistCart()->original['result']
        ];
        return view('product::collection',$data);;
    }

}
