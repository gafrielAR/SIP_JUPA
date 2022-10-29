<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model
use App\Models\FinalProject;

class FinalProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function list() {
        $data = FinalProject::all();
        $no = 1;

        return view('list-final-projects', ['datas' => $data, 'no' => $no]);
    }
}
