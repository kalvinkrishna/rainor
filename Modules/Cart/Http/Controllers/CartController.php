<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Cart\Entities\Carts;

class CartController extends Controller
{
    public function __construct(){

    }

    public function test(Request $request){
        return "hai";
    }

    public function addCart(Request $request){
       
        try {
            $cart = new Carts();
            $cart->id_products = $request->idproduct;
            $cart->id_user = 0;
            $cart->save();

            return response()->json([
                "status"   => "success",
                "messages" => "data save"
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status"   => "fail",
                "messages" => [$e->getMessage()]
            ]);
        }
    }

    public function getlistCart(){
        $data = new Carts;

        return response()->json([
            "status" => "success",
            "result" => [
                "data"  => $data->all_cart,
                "count" => $data->count
            ]
        ]);
    }

    public function listCart(Request $request){
        $data = new Carts;

        return response()->json([
            "status" => "success",
            "result" => [
                "data"  => $data->all_cart,
                "count" => $data->count()
            ]
        ]);
    }

    public function checkoutCart($data){
        $cart = new Cart;

        $cart::find($data->id)->delete();
    }

}
