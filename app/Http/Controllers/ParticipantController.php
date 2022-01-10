<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('participant.index');
    }

    public function data() {
        return DataTables::eloquent(Participant::query())
            ->addColumn('str_status', function(Participant $participant) {
                if ($participant->status == true) {
                    return "Sesuai";
                }

                return "Tidak Sesuai";
            })
            ->addColumn('action', function(Participant $participant) {
                $button = '
                <form action="'.route('admin.participant.sync', $participant->id).'" method="POST">
                    '.csrf_field().'
                    <button type="Submit"
                        class="btn btn-block btn-outline-info btn-sm mb-2"><i class="fa fa-refresh"></i> Sinkronisasi</button>
                </form>';

                $button .= '<a href="'.route('admin.participant.detail', $participant->id).'"
                class="btn btn-block btn-outline-primary btn-sm"><i class="fa fa-search"></i>
                Detail</a>';
                

                return $button;
            })
            ->toJson();
    }

    public function detail(Participant $participant) {
        return view('participant.detail', compact('participant'));
    }

    public function sync(Participant $participant, Request $request) {
        $result = $this->manageFact($participant->facts()->allRelatedIds()->toArray());
        $participant->result = $result->name ?? "Data tidak ada yang sesuai";
        $participant->status = true;
        if(is_null($result)) {
            $participant->status = false;
        }
        $participant->save();
        return redirect()->back()->with('success', 'Berhasil sinkronisasi  '. $participant->name);
    }
}
