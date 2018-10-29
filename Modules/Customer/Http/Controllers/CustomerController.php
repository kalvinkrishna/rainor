<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Customer\Entities\Customer;

class CustomerController extends Controller
{

    public function createCustomer(Request $request){
        $customer = new Customer;
        $customer = $request->all();
        $customer->save();
    }

    public function updateCustomerData(Request $request){
        $customer = new Customer;

        $customer->find($request->input('id'))->update(
            $request->except("__token",'id')
        );
    }
}
