<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function AllPorto()
    {
        $porto = Portfolio::orderBy('id','desc')->get();

        return view('backend.porto.all', compact('porto'));
    }

    public function AddPorto()
    {
        return view('backend.porto.add');
    }

    public function StorePorto(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:portfolios|max:255',
            'title' => 'required',
            'description' => 'required'
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/porto/'.$name);

            $save_url = 'upload/porto/'.$name;

            Portfolio::insert([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url
            ]);

            $notification = array(
                'message' => 'Berhasil Insert Portofolio', 
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }else{

            $notification = array(
                'message' => 'Silahkan Upload Image', 
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
    }
}
