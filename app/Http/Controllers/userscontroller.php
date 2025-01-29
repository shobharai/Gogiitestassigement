<?php

namespace App\Http\Controllers;
use App\Models\cruduser;
use DB;

use Illuminate\Http\Request;

class userscontroller extends Controller
{
    public function index()
    {
        return view('goqii.index');
    }

    public function savefromdata(Request $request)
    {
        $name =$request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $dob = $request->input('dob');

        $cruduser = new cruduser();
        $cruduser -> name=$name;
        $cruduser -> email=$email;
        $cruduser -> password=$password;
        $cruduser -> dob=$dob;

        if($cruduser->save())
        {
            return json_encode(['status'=>'true','data'=>$cruduser,'message'=>'data added sucessfully']);
        }else

        return json_encode(['status'=>'false','message'=>'error in addition']);
     
    }

   


    public function fromlisting()
    {
      
        $listingdata = DB::select("select * from crudusers");
    
        return response()->json(['listingdata' => $listingdata]);
    }

    public function viewindex()
    {
   return view('goqii.fromlisting');
   
    }
    public function editfrom($id)
    {
        $cruduser =  cruduser::find($id);
     
        return view('goqii.editfrom',["user"=>$cruduser]);
    }

    public function saveeditfrom(Request $request)
{
    $id = $request->input('id'); 
    $cruduser = cruduser::find($id);

    if ($cruduser) {
        $cruduser->name = $request->input('name');
        $cruduser->email = $request->input('email');
        $cruduser->password = bcrypt($request->input('password')); 
        $cruduser->dob = $request->input('dob');

        if ($cruduser->save()) {
            return response()->json(['status' => 'true', 'data' => $cruduser, 'message' => 'Data updated successfully']);
        } else {
            return response()->json(['status' => 'false', 'message' => 'Error while saving data']);
        }
    } else {
        return response()->json(['status' => 'false', 'message' => 'User not found']);
    }
}

public function delete($id)
{
    $cruduser = cruduser::find($id);

    if ($cruduser) {
        if ($cruduser->delete()) {
            return response()->json(['status' => 'true', 'message' => 'User deleted successfully']);
        } else {
            return response()->json(['status' => 'false', 'message' => 'Error while deleting user']);
        }
    } else {
        return response()->json(['status' => 'false', 'message' => 'User not found']);
    }
}



}
