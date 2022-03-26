<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ConMessage;
use Illuminate\Support\Carbon;
class ContactController extends Controller
{

    public function Contact(){
        $contacts=Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function AddContact(){
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request){
        Contact::insert([
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now()

        ]);
        return Redirect()->route('contact')->with('success','Contact Successfully Inserted');
    }

    public function EditContact(Request $request, $id){

        $contacts=Contact::find($id);
        return view('admin.contact.edit',compact('contacts'));
    }

    public function UpdateContact(Request $request, $id){

        Contact::find($id)->update([
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->route('contact')->with('success','Message Inserted Successfully');
    }

    public function DeleteContact($id){

        Contact::find($id)->delete();
        return Redirect()->back()->with('success','Deleted Successfully');
    }
    // layout Contact

    public function HeaderContact(){
        $contacts=Contact::first();
        return view('header_component.contact',compact('contacts'));
    }

    // Admin Contact Message

public function StoreMessage(Request $request){
        ConMessage::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now()

        ]);
        return Redirect()->back()->with('success','Message Inserted Successfully');
    }

    public function ShowMessage(){
        $contacts=ConMessage::all();
        return view('admin.contact.conmessage',compact('contacts'));
    }

    public function DeleteMessage($id){
        ConMessage::find($id)->delete();
        return Redirect()->back()->with('success',' Successfully Deleted');
        
    }
}
