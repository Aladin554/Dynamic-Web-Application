<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Support\Carbon;

class HomeAboutController extends Controller
{
    public function HomeAbout(){
        $homeabout=HomeAbout::latest()->get();
        return view('admin.homeabout.index',compact('homeabout'));
    }

    public function Add(){
        return view('admin.homeabout.create');
    }

    public function Store(Request $request){
        
    HomeAbout::insert([
        'title'=>$request->title,
        'short_dis'=>$request->short_dis,
        'long_dis'=>$request->long_dis,
        
        'created_at'=>Carbon::now()
    ]);
    return Redirect()->route('home.about')->with('success','HomeAbout Successfully Inserted');

    }

    public function Edit($id){
        $homeabout=HomeAbout::find($id);
        return view('admin.homeabout.edit',compact('homeabout'));
    }

    public function UpdateAbout(Request $request,$id){

        HomeAbout::find($id)->update([
    
            'title'=>$request->title,
    
            'short_dis'=>$request->short_dis,
            'long_dis'=>$request->long_dis,
            'created_at'=>Carbon::now()
]);
return Redirect()->route('home.about')->with('success',' Successfully Updated');
    }

    public function Delete($id){
        $homeabout=HomeAbout::find($id)->delete();
        return Redirect()->route('home.about')->with('success',' Successfully Deleted');
    }


    // header component
    public function Portfolio(){
        $images=Multipic::all();
        return view('header_component.portfolio',compact('images'));
    }

    
}
