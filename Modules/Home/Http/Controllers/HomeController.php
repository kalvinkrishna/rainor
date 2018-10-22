<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Nwidart\Modules\Facades\Module;
use Modules\Home\Entities\City;
use Modules\Home\Entities\Country;
use Modules\Home\Entities\State;
use Modules\Cart\Entities\Carts;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function __construct(){
        if(Module::find('Product')){
            $this->ProductController = \Modules\Product\Http\Controllers\ProductController::class;
        }
        if(Module::find('Cart')){
            $this->CartController = \Modules\Cart\Http\Controllers\CartController::class;
        }
    }

    public function index()
    {
        $list = app($this->ProductController)->getAllProduct();

        $category = collect($list->original);

        $data = [
            "productlist" => $category->groupBy('categories')->toArray(),
            'cart'        => app($this->CartController)->getlistCart()->original['result'],
        ];
        
        return view('home::home',$data);
    }

    public function biodata(Request $request){
        $this->updateproduct($request);
        $data = [
            'cart'        => app($this->CartController)->getlistCart()->original['result'],
            'country'     => Country::all(),
            'cities'      => City::all(),
            'states'      => State::all()
        ];
        
        return view('home::form.form',$data);
    }


    public function review(Request $request){
        
        $customerBiodata = $request->except("_token");

        $customerBiodata['Country'] = Country::find(intval($customerBiodata['Country']))->name;
        $customerBiodata['Cities'] = City::find(intval($customerBiodata['Cities']))->name;
        $customerBiodata['State'] = State::find(intval($customerBiodata['State']))->name;
        $customerBiodata['Address'] = $customerBiodata['Address'].", ".$customerBiodata['Cities'].', '. $customerBiodata['State']. ', '. $customerBiodata['Country'];
        $cart = new Carts;
       
        $review = [
            "customer" => $customerBiodata,
            'carts'    => app($this->CartController)->getlistCart()->original['result']
        ];

        return view("home::transactionreview",$review);
    }

    private function updateproduct($request){
        
    }
}
