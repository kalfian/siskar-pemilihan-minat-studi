<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        return DataTables::eloquent(Study::query())
            ->addColumn('action', function(Study $study) {
                $button = '
                <form action="'.route('admin.study.destroy', $study->id).'" method="POST">
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
        // print_r($permissions);
        return view('study.index');
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
            'name.required' => 'Program Studi tidak boleh kosong',
        );

        $this->validate($request, $rules, $message);

        $role = Study::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Berhasil menambah program studi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit(Studi $study)
    {
        return view('study.edit',[
            'study' => $study,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Study $study)
    {
        $rules = array(
            'name' => 'required'
        );
        $message = array(
            'name.required' => 'Fakta tidak boleh kosong',
        );

        $this->validate($request, $rules, $message);

        $study->name = $request->name;
        $study->save();

        return redirect()->route('admin.study.index')->with('success', 'Berhasil mengubah program studi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fact  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $study)
    {
        $study->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus program studi');
    }
}
