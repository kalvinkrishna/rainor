<?php

namespace Modules\Cart\Entities;

use Illuminate\Database\Eloquent\Model;
use DB;
use Modules\Product\Entities\Product;

class Carts extends Model
{   
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $fillable = ['id_products','id_user'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function product(){
        return $this->belongsTo('Modules\Product\Entities\Products');
    }

    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }

    public function getAllCartAttribute(){
        $cartList = $this->select("product.*",DB::raw('count(id_products) as count'))
            ->join('product','product.id','=','cart.id_products')
            ->where('id_user', 0)
            ->groupBy('id_products')->get();

        foreach($cartList as $product){
            $product->price =  number_format($product->price ,0,'','.');
            $product->photo =  Product::find($product->id)->productphoto;
        }

        return $cartList;
    }

    public function getPriceCountAttribute(){
        $product = $this->join('product','product.id','=','cart.id_products')->get()->sum('price');
        return  number_format($product ,0,'','.');
    }
 

    public function deletecart($products = []){

        foreach($products as $product){
            $this->where('id_user',0)->where('id_products',$products['id'])->delete();
        }

        return true;
    }

    public function savecart(){

    }
}
