<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ChangePassController extends Controller
{
    public function ChangePass(){
        return view('admin.body.changepass');
    }

    public function UpdatePass(Request $request){

        $validateData=$request->validate([
            'oldpassword'=>'required',
            
        'password'=>'required|confirmed'

        ]);

        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password is changed Successfully' );
        }

        else{
            return redirect()->back()->with('success','Current Password is Invalid' );
        }
    }

    public function Pget(){
        if(Auth::user()){
            $user=User::find(Auth::user()->id);
            if($user){
                return view('admin.body.PUpdate',compact('user'));
            }
        }
    }

    // public function PUpdate(Request $request){
    //     $user=User::find(Auth::user()->id);
    //         if($user){
        
    //             $image=$request->file('profile_photo_path');
    //             $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    //             Image::make($image)->resize(300,200)->save('image/profile/'.$name_gen);
    //             $last_img='image/profile/'.$name_gen;
    //             $user->name=$request['name'];
    //             $user->email=$request['email'];
    //             $user->profile_photo_path=$request['profile_photo_path'];
    //             $user->save();
    //             return Redirect()->back()->with('success','Profile Updated Successfully');
    //         }
    //         else{
    //             return Redirect()->back();
    //         }
   //  }

   public function PUpdate(Request $request){
         
    $user=User::find(Auth::user()->id);
    $user->name=$request['name'];
    $user->email=$request['email'];
         
 	$image = $request->file('profile_photo_path');
 	if ($image) {
        $image_name = date('dmy_H_s_i');
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'image/profile/';
        $image_url = $upload_path.$image_full_name;
        $success = $image->move($upload_path,$image_full_name);
 
        $user->profile_photo_path = $image_url;
        $user->save();
        return Redirect()->back()->with('success','Profile Updated Successfully');
     }
            else{
                return Redirect()->back();
     }
    }
}

