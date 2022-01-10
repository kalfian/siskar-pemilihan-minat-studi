<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fact;

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
        
    }
}
