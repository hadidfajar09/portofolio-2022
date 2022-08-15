<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function HomeSlider()
    {
        $data = HomeSlide::find(1);

        return view('backend.homeslide.index', compact('data'));
    }

    public function HomeSliderUpdate(Request $request)
    {
        $slide_id = $request->id;

        if($request->file('image')){
            $image = $request->file('image');
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/slide/'.$name);

            $save_url = 'upload/slide/'.$name;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'video_url' => $request->video_url,
                'image' => $save_url
            ]);

            $notification = array(
                'message' => 'Berhasil Update Home Slide', 
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }else{
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Berhasil Update Home Slide', 
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }

      
    }
}
