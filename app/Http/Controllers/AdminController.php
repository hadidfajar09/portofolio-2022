<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Anda Berhasil Logout', 
            'alert-type' => 'info'
        );

        return redirect('/login')->with($notification);
    }

    public function profile()
    {
        $id = Auth::user()->id;

        $profile = User::find($id);

        return view('backend.admin.profile',compact('profile'));
    }

    public function profileEdit()
    {
        $id = Auth::user()->id;

        $profile = User::find($id);

        return view('backend.admin.edit_profile',compact('profile'));
    }

    public function profileStore(ProfileRequest $request)
    {
        $id = Auth::user()->id;

        $profile = User::find($id);

        $profile->email = $request->email;
        $profile->name = $request->name;
        $profile->username = $request->username;

        if($request->file('foto')){
            $file = $request->file('foto');

            $fileName = date('YmdHis').$file->getClientOriginalName();

            $file->move(public_path('upload/images'),$fileName);

            $profile['foto'] = 'upload/images/'.$fileName;
        }

        $profile->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function passwordEdit()
    {
        return view('backend.admin.password');
    }
    
}
