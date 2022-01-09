<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Study,
    Fact
};

class ManageRelationController extends Controller
{
    public function index() {

        $facts = Fact::all();
        $studies = Study::with(['facts'])->get();

        return view('relation.index', compact('studies', 'facts'));
    }

    public function update(Study $study, Request $request) {
        $study->facts()->sync($request->fact);

        return redirect()->back()->with('success', 'Berhasil mengubah data studi '. $study->name);
    }
}
