<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $userPass = Auth::user()->password;

        if (Hash::check($request->old_password,$userPass)) 
        {
            $user = User::find(Auth::id());

            $user->password = bcrypt($request->new_password);
            $user->update();

            session()->flash('message','Berhasil Update Password');
            return redirect()->back();
        }else{
            session()->flash('message','Password Gagal Update');
            return redirect()->back();
        }


    }
    
}
