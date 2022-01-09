<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

use Auth;

class AdminController extends Controller
{
    public function data(Request $request) {
        $auth = Auth::user();
        return DataTables::eloquent(User::where("is_admin","1")->where("id", "!=", $auth->id))
            ->addColumn('action', function(User $user) {
                $button = '';
                    
                $button .= '<a href="'.route('admin.edit', $user->id).'"
                class="btn btn-block btn-outline-primary btn-sm mb-2"><i class="fa fa-pencil"></i>
                Edit</a>';
            
            
                $button .= '
                <form action="'.route('admin.destroy', $user->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <button onclick="return confirm(\'yakin menghapus data?\')" type="Submit"
                        class="btn btn-block btn-outline-danger btn-sm"><i class="fa fa-trash"></i>
                        Hapus</button>
                </form>';
                

                return $button;
            })
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|alpha_num|min:6',
            'status' => 'required|boolean',
        );
        $message = array(
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa string',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email salah',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email telah digunakan',
            'password.required' => 'Password harus diisi',
            'password.alpha_num' => 'Password hanya angka dan huruf',
            'password.min' => 'Password minimal 6 digit',
            'status.required' => 'Status harus diisi',
            'status.boolean' => 'Status tidak dikenali'
        );

        $this->validate($request, $rules, $message);
        //
        $user                       = new User();
        $user->name                 = $request->name;
        $user->email                = $request->email;
        $user->email_verified_at    = now();
        $user->password             = Hash::make($request->password);
        $user->remember_token       = Str::random(10);
        $user->is_admin             = true;
        $user->status               = $request->status;

        $user->save();

        return redirect()->back()->with('success', 'Berhasil menambah admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $id)
    {
        if (!$id->is_admin) {
            return redirect()->back();
        }

        return view('admin.edit',[
            'user' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $id)
    {
        if (!$id->is_admin) {
            return redirect()->back();
        }
        //

        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'status' => 'required|between:0,2',
        );
        $message = array(
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa string',
            'name.max' => 'Nama maksimal 255 karakter',
            'status.required' => 'Status harus diisi',
            'status.between' => 'Status tidak dikenali',
        );

        if ($id->email != $request->email) {
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

        $id->name = $request->name;
        $id->email = $request->email;
        $id->status = $request->status;

        if ($request->password != '') {
            $id->password = Hash::make($request->password);
        }

        $id->save();

        return redirect()->route('admin.index')->with('success', 'Berhasil mengubah admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
        if (!$id->is_admin) {
            return redirect()->back();
        }
        //
        $id->delete();

        return redirect()->route('admin.index')->with('success', 'Berhasil menghapus admin');
    }
}
