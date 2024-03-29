<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function HomeAbout()
    {
        $data = About::find(1);

        return view('backend.about.index', compact('data'));
    }

    public function HomeAboutUpdate(Request $request)
    {
        $about_id = $request->id;

        if($request->file('image')){
            $image = $request->file('image');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/slide/'.$name);

            $save_url = 'upload/slide/'.$name;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_deskripsi' => $request->short_deskripsi,
                'long_deskripsi' => $request->long_deskripsi,
                'image' => $save_url
            ]);

            $notification = array(
                'message' => 'Berhasil Update About Setup', 
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }else{
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_deskripsi' => $request->short_deskripsi,
                'long_deskripsi' => $request->long_deskripsi,
            ]);

            $notification = array(
                'message' => 'Berhasil Update About Setup', 
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }

    }

    public function showAbout()
    {
        $data = About::first();

        $multi = MultiImage::limit(7)->orderBy('id','desc')->get();

        return view('frontend.about',compact('data','multi'));
    }
    
    public function MultiImage()
    {

        return view('backend.about.multi');
    }

    public function MultiStore(Request $request)
    {
        $image = $request->file('multi_image');

        foreach ($image as $img) {
            $name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(220,220)->save('upload/multi/'.$name);

            $save_url = 'upload/multi/'.$name;

            MultiImage::create([
                'image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Berhasil Tambah Multi Image', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AllMultiImage(Request $request)
    {
        $multi = MultiImage::all();

        return view('backend.about.allmulti', compact('multi'));
        
    }

    public function EditMulti($id)
    {
        $multi = MultiImage::findOrFail($id);

        return view('backend.about.editmulti', compact('multi'));
    }

    public function MultiUpdate(Request $request, $id)
    {
        
        $image = $request->file('multi_image');

        $multi = MultiImage::findOrFail($id);

        $img = $multi->image;

        unlink($img);

            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(220,220)->save('upload/multi/'.$name);

            $save_url = 'upload/multi/'.$name;

            MultiImage::find($id)->update([
                'image' => $save_url,
                'updated_at' => Carbon::now()
            ]);

        $notification = array(
            'message' => 'Berhasil Edit Multi Image', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.multi')->with($notification);
    }

    public function DeleteMulti($id)
    {
        $multi = MultiImage::findOrFail($id);

        $img = $multi->image;

        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Berhasil Hapus Multi Image', 
            'alert-type' => 'error'
        );

        return redirect()->route('all.multi')->with($notification);

        
    }
}
