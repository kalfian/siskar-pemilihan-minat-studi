<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fact;
use App\Models\Participant;

class LandingPageController extends Controller
{
    public function index() {
        return view('landing.index');
    }

    public function consult(Request $request) {

        $rules = array(
            'name' => 'required',
            'age' => 'required'
        );
        $message = array(
            'name.required' => 'Nama tidak boleh kosong',
            'age.required' => 'Umur tidak boleh kosong',
        );

        $this->validate($request, $rules, $message);

        $name = $request->name;
        $age = $request->age;

        $facts = Fact::all();

        return view('landing.consult', compact('name', 'age', 'facts'));
    }

    public function store(Request $request) {
        $rules = array(
            'name' => 'required',
            'age' => 'required',
            'fact' => 'required|array|min:1'
        );
        $message = array(
            'name.required' => 'Nama tidak boleh kosong',
            'age.required' => 'Umur tidak boleh kosong',
        );

        $this->validate($request, $rules, $message);

        $participant = new Participant();
        $participant->name = $request->name;
        $participant->age = $request->age;
        
        $result = $this->manageFact($request->fact);
        $participant->result = $result->name ?? "Data tidak ada yang sesuai";
        $participant->status = true;
        if(is_null($result)) {
            $participant->status = false;
        }
        $participant->save();

        $participant->facts()->sync($request->fact);

        return redirect()->route('consult.result', $participant->id);
    }

    public function result(Participant $participant) {
        return view('landing.result', compact('participant'));
    }
}
