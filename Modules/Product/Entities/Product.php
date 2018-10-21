<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [];

    public function productphoto(){
        return $this->hasMany('Modules\Product\Entities\ProductPhoto','id_product','id');
    }

    public function productSubCategory() {
        return $this->hasMany('Modules\Product\Entities\ProductPhoto','id_product','id');   
    }
    
    public function getProductNameCategory($category){
        return $this->where('created_at',$category)->get();
    }

    public function getCreatedAtAttribute(){
        return $this->id;
    }

    public function getAllProduct($category = 'all'){

        if($category == 'all')
            return $this->all();

        
        $product = $this->where('categories',$category)->get();
        
        $product = $this->getPhoto($product);

        return $product;
    }

    private static function getPhoto($products){
        foreach($products as $product){
            $product->photo = $product->find($product->id)->productphoto;
        }

        return $products;
    }
}
