<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Carbon\Carbon;
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
            'description' => 'required',
            'image' => 'required|mimes: jpg,png,jpeg'
        ], [
            'name.required' => 'Tolong isi ini bosku'
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(1020,519)->save('upload/porto/'.$name);

            $save_url = 'upload/porto/'.$name;

            Portfolio::insert([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Berhasil Insert Portofolio', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.porto')->with($notification);
        }else{

            $notification = array(
                'message' => 'Silahkan Upload Image', 
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
    }

    public function EditPorto($id)
    {
        $porto = Portfolio::findOrFail($id);

        return view('backend.porto.edit', compact('porto'));
    }

    public function UpdatePorto(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes: jpg,png,jpeg'
        ], [
            'name.required' => 'Tolong isi ini bosku'
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $porto = Portfolio::findOrFail($id);

            $img = $porto->image;
    
            unlink($img);
    
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(1020,519)->save('upload/porto/'.$name);

            $save_url = 'upload/porto/'.$name;

            Portfolio::findOrFail($id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Berhasil Update Portofolio', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.porto')->with($notification);
        }else{

            Portfolio::findOrFail($id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Berhasil Update Portofolio', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.porto')->with($notification);
        }
    }

    public function DeletePorto($id)
    {
        $porto = Portfolio::findOrFail($id);

        $img = $porto->image;

        unlink($img);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Berhasil Hapus Portfolio', 
            'alert-type' => 'error'
        );

        return redirect()->route('all.porto')->with($notification);

        
    }

    public function ShowPorto()
    {
        $porto = Portfolio::latest()->get();
        return view('frontend.portofolio', compact('porto'));
    }
}
