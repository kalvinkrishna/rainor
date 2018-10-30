<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $date = [
        'created_at','updated_at'
    ];

    protected $appends = ['variantWarna','variantSize'];

    public function productphoto(){
        return $this->hasMany('Modules\Product\Entities\ProductPhoto','id_product','id');
    }

    public function productSubCategory() {
        return $this->hasMany('Modules\Product\Entities\SubCategories','id_product','id')
            ->join('categories','categories.id','=','categories_relation.categories')
            ->select('categories.nama_categories')->groupBy('categories.nama_categories');   
    }
    
    public function getProductNameCategory($category){
        return $this->where('created_at',$category)->get();
    }

    public function getVariantWarnaAttribute(){
        return  $this->attributes['variantWarna'] = \Modules\Product\Entities\Variant::where('group','warna')->get();
    }

    public function getVariantSizeAttribute(){
        return $this->attributes['variantSize'] = \Modules\Product\Entities\Variant::where('group','ukuran')->get();
    }

    public function getLowestAttribute(){
        return $this->select('product.*','product.id as id_product')->orderBy('price','ASC')->get();
    }

    public function getProductTerbaruAttribute(){
       
        $date = \Carbon\Carbon::today()->subDays(30);

        return $this->select('product.*','product.id as id_product')->where('created_at', ">=" , $date)->get();
    }

    public function getAllProduct($category = 'all', $subcategory = null){
        
        if($category == 'all')
            return $this->all();

        if($category == "terbaru"){
            $product = $this->product_terbaru;
            $product = $this->getPhoto($product);
            return $product;
        }

        if($category == "termurah"){
            $product = $this->lowest;
            $product = $this->getPhoto($product);
            return $product;
        }

        $product = $this->join('categories_relation','categories_relation.id_product','=','product.id')  
        ->join('categories','categories_relation.categories','=','categories.id')
        ->where('product.categories',$category);
        
        if(!empty($subcategory)){
            $product = $product->where('categories.nama_categories',$subcategory);
        } else {
            $product = $product->groupBy('product_name');
        }

        $product = $product->get();
        
        $product = $this->getPhoto($product);

        return $product;
    }

    private static function getPhoto($products){
        foreach($products as $product){
            $product->price = number_format($product->price ,0,'','.');
            $product->photo = $product->find($product->id_product)->productphoto;
        }

        return $products;
    }
}
