<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use App\Models\Category;
class CatController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function alCat(){

        // $categories=DB::table('categories')
        // ->join('users', 'categories.user_id', 'users.id')
        // ->select('categories.*', 'users.name')
        // ->latest()->paginate(5);
        $categories=Category::latest()->paginate(5);

        $trash=Category::latest()->onlyTrashed()->paginate(5);

        // $categories=DB::table('categories')->latest()->paginate(5);
        return view('admin.category.fresh',compact('categories','trash'));
    }

    public function stCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:20',
        ],
    [
        'category_name.required' => 'Please fill the box',

        'category_name.max' => 'required 20 ch',
    ]
    );
    Category::insert([
        'category_name'=>$request->category_name,
        'user_id'=>Auth::user()->id,
        'created_at'=>Carbon::now()
    ]);

    // $category=new Category;
    // $category->category_name=$request->category_name;
    // $category->user_id=Auth::user()->id;
    // $category->save();

    // $data=array();
    // $data['category_name']=$request->category_name;
    // $data['user_id']=Auth::user()->id;

    // DB::table('categories')->insert($data);

    return Redirect()->back()->with('success','Category Inserted Successfully');
    
    }
    
    public function Edit($id){
        // $categories=Category::find($id);
        $categories=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('categories'));
    }

    public function Update(Request $request,$id){
        $update=Category::find($id)->update([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->where('id',$id)->update($data);

        return Redirect()->route('add.category')->with('success','Category Inserted Successfully');
    }

    public function Tdelete($id){
        $delete=Category::find($id)->delete();

        return Redirect()->back()->with('success','Temporary Delete Successful');
    }

    public function Restore($id){
        $restore=Category::withTrashed()->find($id)->restore();

        return Redirect()->back()->with('success','Restore Successful');
    }

    
    public function Pdelete($id){
        $delete=Category::withTrashed()->find($id)->forceDelete();

        return Redirect()->back()->with('success','Delete Successful');
    }
    
}
