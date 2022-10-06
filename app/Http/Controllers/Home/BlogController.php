<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function ListCategory()
    {
        $category = BlogCategory::orderBy('id','desc')->get();

        return view('backend.blog.categoryall', compact('category'));
    }

    public function AddCategory()
    {
        return view('backend.blog.add_Category');
    }

    public function StoreCategory(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:blog_categories|max:255',
            
        ], [
            'category_name.required' => 'Tolong isi ini bosku'
        ]);
        

            BlogCategory::insert([
                'category_name' => $request->category_name,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Berhasil Insert Category', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.category')->with($notification);
        
    }

    public function EditCategory($id)
    {
        $category = BlogCategory::findOrFail($id);

        return view('backend.blog.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        $validated = $request->validate([
            'category_name' => 'required|max:255',
            
        ], [
            'category_name.required' => 'Tolong isi ini bosku'
        ]);
        

            BlogCategory::findOrFail($id)->update([
                'category_name' => $request->category_name,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Berhasil Update Category', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.category')->with($notification);
    }

    public function DeleteCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Berhasil Hapus Category', 
            'alert-type' => 'error'
        );

        return redirect()->route('all.category')->with($notification);
    }


    //BLOG
    public function ListBlog()
    {
        $blog = Blog::orderBy('id','desc')->get();

        return view('backend.blog.blogall', compact('blog'));
    }

    public function AddBlog()
    {
        return view('backend.blog.add_blog');
    }

    public function StoreBlog(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'category_id' => 'required',
            'tag' => 'required',
            'description' => 'required',
            'image' => 'required|mimes: jpg,png,jpeg'
        ], [
            'name.required' => 'Tolong isi ini bosku'
        ]);
        if($request->file('image')){
            $image = $request->file('image');   
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(430,327)->save('upload/blog/'.$name);

            $save_url = 'upload/blog/'.$name;

            Blog::insert([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'tag' => $request->tag,
                'description' => $request->description,
                'image' => $save_url,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Berhasil Insert Blog', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.blog')->with($notification);
        }else{

            $notification = array(
                'message' => 'Silahkan Upload Image', 
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
    }

}
