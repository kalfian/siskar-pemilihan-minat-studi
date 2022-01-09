<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    public function index() {

        return view('dashboard.index');
    }

    public function edit() {
        $user = Auth::user();

        return view('dashboard.edit',[
            'user' => $user
        ]);
    }

    public function update(Request $request) {
        $user = Auth::user();

        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        );
        $message = array(
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa string',
            'name.max' => 'Nama maksimal 255 karakter',
        );

        if ($user->email != $request->email) {
            $rules['email'] = 'required|email|max:255|unique:users';
            $message['email.required'] = 'Email harus diisi';
            $message['email.email'] = 'Format email salah';
            $message['email.max'] = 'Email maksimal 255 karakter';
            $message['email.unique'] = 'Email telah digunakan';
        }
        
        if ($request->password != "" ) {
            $rules['password'] = 'required|alpha_num|min:6|confirmed';
            $message['password.required'] = 'Password harus diisi';
            $message['password.alpha_num'] = 'Password hanya angka dan huruf';
            $message['password.min'] = 'Password minimal 6 digit';
            $message['password.confirmed'] = 'Password Konfirmasi tidak sama';
        }

        $this->validate($request, $rules, $message);
        if(!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect()->back()->with('error', "Password tidak sesuai");
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password != "") {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->back()->with('success', "Berhasil merubah profil");
    }
}
