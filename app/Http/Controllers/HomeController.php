<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

// Models
use App\Models\FinalProject;
use App\Models\Student;

class HomeController extends Controller
{
    public function index() {
        return view('guest.index');
    }

    public function finalProject() {
        $finalProject = FinalProject::select(DB::raw('count(*) as `count`'), DB::raw("DATE_FORMAT(proposal_date, '%M') new_date"),  DB::raw('MONTH(proposal_date) month'))->groupby('month')->get();

        $categories = [];
        $data       = [];

        foreach ($finalProject as $fp) {
            $categories[]   = $fp->new_date;
            $data[]         = $fp->count;
        }

        return view('Guest.Final-Project.index', ['categories' => $categories, 'data' => $data]);
    }

    public function student() {
        return view('Guest.Student.index');
    }

    public function lecturer() {
        return view('Guest.Lecturer.index');
    }

    public function lab() {
        return view('Guest.Lab.index');
    }
}
