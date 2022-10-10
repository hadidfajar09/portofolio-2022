<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Models\Message;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function Setting()
    {
        $data = Footer::find(1);

        return view('backend.footer.index', compact('data'));
    }

    public function SettingUpdate(Request $request)
    {
        $footer_id = $request->id;

        $data = $request->all();

        $footer =  Footer::find($footer_id);
        $footer->update($data);

            $notification = array(
                'message' => 'Berhasil Update Footer Setup ', 
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
      
    }

    public function FormContact()
    {
        $multi = MultiImage::limit(7)->orderBy('id','desc')->get();
        $setting = Footer::first();
        return view('frontend.contact', compact('setting', 'multi'));
    }

    public function MessageStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'nullable',
            'message' => 'required',
        ], [
            'name.required' => 'Please fill this with your name',
            'email.required' => 'Please fill this with your email!',
            'subject.required' => 'Please fill this with your subject',
            'message.required' => 'Please fill with your Message'
        ]);

        Message::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Send Message Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ShowMessage()
    {
        $message = Message::latest()->get();

        return view('backend.message.index', compact('message'));
    }

    public function MessageDelete($id)
    {
        $message = Message::find($id)->delete();

        $notification = array(  
            'message' => 'Delete Message Successfully', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
    

}

