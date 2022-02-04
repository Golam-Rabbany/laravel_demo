<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RoleController extends Controller
{
    //to view role add form page;
    function addform(){
        $all_roles = Role::all();
        return view('role.add',compact('all_roles'));
    }


    function storerole(Request $request){
        $request->validate([
            'role' => 'required',
        ]);
        $role = Str::upper($request->role);

       if(Role::Where('role', '=', $role)->doesntExist()){
           Role::insert([
               'role' => $role,
               'created_at' => Carbon::now(),
           ]);
       }else{
            return back()->with('InsErr', 'Already inserted');
       }
       
       return back();

    }




}
 

