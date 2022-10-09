<?php

namespace App\Http\Controllers\Home;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\MultiImage;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $category = BlogCategory::latest()->get();
        return view('backend.blog.add_blog', compact('category'));
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

            Image::make($image)->resize(850,430)->save('upload/blog/'.$name);

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

    public function EditBlog($id)
    {
        $blog = Blog::with('category')->findOrFail($id);
        $category = BlogCategory::latest()->get();

        return view('backend.blog.edit_blog', compact('blog','category'));
    }

    public function UpdateBlog(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'tag' => 'required',
            'description' => 'required',
            'image' => 'mimes: jpg,png,jpeg'
        ], [
            'name.required' => 'Tolong isi ini bosku'
        ]);
        if($request->file('image')){
            $image = $request->file('image');   
            $name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(850,430)->save('upload/blog/'.$name);

            $save_url = 'upload/blog/'.$name;

            Blog::findOrFail($id)->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'tag' => $request->tag,
                'description' => $request->description,
                'image' => $save_url,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Berhasil Update Blog', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.blog')->with($notification);
        }else{

            Blog::findOrFail($id)->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'tag' => $request->tag,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Berhasil Insert Blog tanpa img', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.blog')->with($notification);
        }
    }

    public function DeleteBlog($id)
    {
        $blog = Blog::findOrFail($id);

        $img = $blog->image;

        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Berhasil Hapus Blog', 
            'alert-type' => 'error'
        );

        return redirect()->route('all.blog')->with($notification);
    }

    public function ShowBlog()
    {
        $blog = Blog::latest()->paginate(5);

        $all_blog = Blog::latest()->limit(5)->get();

        $multi = MultiImage::limit(7)->orderBy('id','desc')->get();

        $category = BlogCategory::orderBy('id','desc')->get();

        return view('frontend.blog', compact('all_blog','blog','multi','category'));
    }

    public function BlogDetail($id)
    {
        $blog = Blog::findOrFail($id);
        $all_blog = Blog::latest()->limit(5)->get();

        $multi = MultiImage::limit(7)->orderBy('id','desc')->get();

        $category = BlogCategory::orderBy('id','desc')->get();

        $tag = $blog->tag;
        $mytag = explode(',', $tag);

        return view('frontend.blog_detail', compact('blog', 'all_blog', 'multi', 'mytag', 'category'));
    }

    public function ShowCategory($id)
    { 
        $blog = Blog::where('category_id', $id)->latest()->get();
        $category = BlogCategory::where('id', $id)->first();

        $all_blog = Blog::latest()->limit(5)->get();

        $multi = MultiImage::limit(7)->orderBy('id','desc')->get();

        $category_all = BlogCategory::orderBy('id','desc')->get();

        return view('frontend.cat_detail', compact('blog', 'category', 'all_blog', 'multi', 'category_all'));
    }

}
