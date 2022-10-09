<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

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
    

}

