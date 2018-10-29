<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Modules\Home\Entities\City;
use Modules\Home\Entities\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getCity($id){
        $city = new City();
        return $city->where('id_state',$id)->get();
    }

    public function getState($id){
        $state = new State();
        return $state->where('id_country',$id)->get();
    }
}
