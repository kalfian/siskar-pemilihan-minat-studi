<?php

namespace App\Http\Controllers;

use App\Models\Fact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        return DataTables::eloquent(Fact::query())
            ->addColumn('action', function(Fact $fact) {
                $button = '
                <form action="'.route('admin.fact.destroy', $fact->id).'" method="POST">
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

    public function index()
    {
        $facts = Fact::all();
        // print_r($permissions);
        return view('fact.index',[
            'facts' => $facts
        ]);
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
            'name' => 'required',
        );
        $message = array(
            'name.required' => 'Fakta tidak boleh kosong',
        );

        $this->validate($request, $rules, $message);

        $role = Fact::create(['name' => $request->fact]);

        return redirect()->back()->with('success', 'Berhasil menambah fakta');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fact  $Fact
     * @return \Illuminate\Http\Response
     */
    public function edit(Fact $fact)
    {
        $permissions = Permission::all();
        // print_r($permissions);
        return view('fact.edit',[
            'fact' => $fact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fact  $fact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fact $fact)
    {
        $rules = array(
            'name' => 'required'
        );
        $message = array(
            'name.required' => 'Fakta tidak boleh kosong',
        );

        $this->validate($request, $rules, $message);

        $fact->name = $request->name;
        $fact->save();

        return redirect()->route('admin.fact.index')->with('success', 'Berhasil mengubah fakta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fact  $fact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fact $fact)
    {
        $fact->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus Fakta');
    }
}
