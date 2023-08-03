<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function CustomerPage(){
        return view('pages.dashboard.customer-page');
    }
    function GetCustomer(){
        return Customer::all();
    }
    function CreateCustomer(Request $request){
        try{
            return Customer::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'address'=>$request->input('address'),
                'phone'=>$request->input('phone')
            ]);
            
        }catch(Exception $e){
            return response()->json([
                'status'=>'failled',
                'message'=>'unauthorized'
            ]);
        }
    }// end method
    function UpdateCustomer(Request $request){
        return Customer::where('id',$request->input('id'))->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone')
        ]);
    }// end method
    function DeleteCustomer(Request $request){
        $id = $request->input('id');
        return Customer::where('id',$id)->delete();
    }// end method
    function CustomerById(Request $request){
        return Customer::where('id',$request->input('id'))->first();
    }// end method
}
