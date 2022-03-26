<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Auth;
use Image;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders=Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function AddSlider(){
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request){
        $slider_image=$request->file('image');
    

    $name_gen=hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
    Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);


    $last_img='image/slider/'.$name_gen;
    Slider::insert([
        'title'=>$request->title,
        'description'=>$request->description,
        'image'=>$last_img,
        'created_at'=>Carbon::now()
    ]);
    return Redirect()->route('home.slider')->with('success','Slider Successfully Inserted');

    }

    public function EditSlider($id){
        $sliders=Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }

    public function UpdateSlider(Request $request,$id){
        // $old_image=$request->old_image;
        $slider_image=$request->file('image');
    

        $name_gen=hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
    
    
        $last_img='image/slider/'.$name_gen;

// unlink($old_image);
Slider::find($id)->update([
    'title'=>$request->title,
    'description'=>$request->description,
    'image'=>$last_img,
    
    'created_at'=>Carbon::now()
]);
return Redirect()->route('home.slider')->with('success','Slider Successfully Updated');
    }
    public function DeleteSlider($id){
        $slider=Slider::find($id)->delete();
        return Redirect()->route('home.slider')->with('success','Slider Successfully Deleted');
    }
}
