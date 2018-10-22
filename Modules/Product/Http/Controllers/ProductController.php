<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Nwidart\Modules\Facades\Module;
use Modules\Product\Entities\Product;

class ProductController extends Controller
{
  public function __construct(){
      if(Module::find('Cart')){
          $this->CartController = \Modules\Cart\Http\Controllers\CartController::class;
      }
  }

  public function getCreateProduct(Request $request){
      return view('product::create');
  }

  public function createProduct(Request $request){
        $product = new Product;
        $data = $request->except('__token','action');
        
        try{
            foreach($data as $products):
                $product = $products;
                $product->save();
            endforeach;
    
            return [
                "status" => "success",
                "data"   => $product
            ];
        } catch (\Exception $e) {
            return [
                "status"  => "fail",
                "message" => [ $e->getMessage()] 
            ];
        }
  }

  public function updateProduct(Request $request){
        $product = new Product;

        $product->find($request->input('id'))->update($request->except('__token','action','id'));
  }

  public function deleteProduct(Request $request){
        try{
            $product = Product::find($request->input('id'))->delete();
        } catch(\Exception $e) {
            return [
                "status"   => "fail",
                "messages" => [ $e->getMessage() ]
            ];
        }
  }

  public function listProduct(Request $request) {
        $product = new Product;

        return $product->all();
  }

  public function getProduct($idProduct){
        return Product::find($idProduct);
  }

  public function addToCart(Request $request){
    app($this->CartController)->setCartList($request->input('id_user'),$request->input('id_product'));
  }

  public function getAllProduct(){
      $product = new Product;
      $products = $product->all();
      
      foreach($products as $product){
          $product->price = number_format($product->price ,0,'','.');
          $product->photo =  $product->find($product->id)->productphoto;
          $product->subCategories = $product->find($product->id)->productSubCategory->pluck('nama_categories');
      }
    
      return response()->json($products);
  }

  public function checkOutProduct(Request $request){
      app($this->CartController)->doCheckOut($request->all());
  }
}
