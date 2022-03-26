<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function alBrand(){
        $brands=Brand::latest()->paginate(5);
        $trash=Brand::latest()->onlyTrashed()->paginate(5);

        return view('admin.brand.index',compact('brands','trash'));
    }

    public function stBrand(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:20',
            'brand_image' => 'required | mimes:jpeg,jpg,png | max:1000',
        ],
    [
        'brand_name.required' => 'Please fill the box',

        'brand_image.min' => 'required 4 ch',
    ]
    );


    $brand_image=$request->file('brand_image');
    // $name_gen=hexdec(uniqid());
    // $img_ext=strtolower($brand_image->getClientOriginalExtension());
    // $img_name=$name_gen.'.'.$img_ext;
    // $up_location='image/brand/';
    // $last_img=($up_location.$img_name);
    // $brand_image->move($up_location,$img_name);

    $name_gen=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
    Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
$last_img='image/brand/'.$name_gen;
    Brand::insert([
        'brand_name'=>$request->brand_name,
        'brand_image'=>$last_img,
        'created_at'=>Carbon::now()
    ]);

    
    return Redirect()->back()->with('success','Brand Successfully Inserted');
}
public function Edit($id){
    $brands=Brand::find($id);
    return view('admin.brand.edit',compact('brands'));
}

public function Update(Request $request,$id){
    $validated = $request->validate([
        'brand_name' => 'required|unique:brands|max:20',
        
    ],
[
    'brand_name.required' => 'Please fill the box',

    'brand_image.min' => 'required 4 ch',
]
);

$old_image=$request->old_image;
$brand_image=$request->file('brand_image');
$name_gen=hexdec(uniqid());
$img_ext=strtolower($brand_image->getClientOriginalExtension());
$img_name=$name_gen.'.'.$img_ext;
$up_location='image/brand/';
$last_img=($up_location.$img_name);
$brand_image->move($up_location,$img_name);

unlink($old_image);
Brand::find($id)->update([
    'brand_name'=>$request->brand_name,
    'brand_image'=>$last_img,
    
    'created_at'=>Carbon::now()
]);
return Redirect()->route('all.brand')->with('success','Brand Successfully Inserted');
}

public function Tdelete($id){
    $delete=Brand::find($id)->delete();
    return Redirect()->back()->with('success','Brand Successfully Inserted');
}

public function Multipic(){
    $images=Multipic::all();
    return view('admin.multipic.index',compact('images'));
}

public function Storeimg(Request $request){
    


$image=$request->file('image');
foreach($image as $multi_img){
$name_gen=hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
Image::make($multi_img)->resize(300,200)->save('image/multipic/'.$name_gen);
$last_img='image/multipic/'.$name_gen;
Multipic::insert([
    
    'image'=>$last_img,
    'created_at'=>Carbon::now()
]);
}
return Redirect()->back()->with('success','Brand Successfully Inserted');
}

public function Logout(){
    Auth::logout();
    return Redirect()->route('login')->with('success','User Logout');
}
}