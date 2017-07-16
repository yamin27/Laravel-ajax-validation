<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Create_save_table;
use App\User;

class HomeController extends Controller
{

    /**
     * Display a listing of the myform.
     *
     * @return \Illuminate\Http\Response
     */
    public function myform()
    {
    	return view('myform');
    }

    /**
     * Display a listing of the myformPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function myformPost(Request $request)
    {

    	$validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:create_save_tables',
            'address' => 'required',
        ]);

		if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()->all()]);
		}


    	//dd($request->all());

         try {
            Create_save_table::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'address' => $request->address
            ]);

               
			return response()->json(['success'=>'Added new record.']);
        
            
        } catch (Exception $e) {
             return response()->json('Failed to save.', 412);
            
        }
    
    	return redirect('/');

    }

}