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
        $dataFinalProject   = FinalProject::with('student')->with('stMentor')->get();
        $fpByMonth          = FinalProject::select(DB::raw('count(*) as `count`'), DB::raw("DATE_FORMAT(proposal_date, '%M') new_date"),  DB::raw('MONTH(proposal_date) month'))->groupby('month')->get();
        $fpByYear           = FinalProject::select(DB::raw('count(*) as `count`'), DB::raw("DATE_FORMAT(proposal_date, '%Y') new_date"),  DB::raw('YEAR(proposal_date) year'))->groupby('year')->get();

        $categoriesByYear   = [];
        $categoriesByMonth  = [];
        $dataByYear         = [];
        $dataByMonth        = [];

        foreach ($fpByMonth as $fp) {
            $categoriesByMonth[]   = $fp->new_date;
            $dataByMonth[]         = $fp->count;
        }

        foreach ($fpByYear as $fp) {
            $categoriesByYear[]   = $fp->new_date;
            $dataByYear[]         = $fp->count;
        }

        return view('Guest.Final-Project.index', ['dataFinalProject' => $dataFinalProject, 'categoriesByMonth' => $categoriesByMonth, 'dataByMonth' => $dataByMonth, 'categoriesByYear' => $categoriesByYear, 'dataByYear' => $dataByYear]);
    }

    public function student() {
        $data = Student::with('study_program')->with('guardian_lecturer')->with('religion')->with('acceptance_path')->get();

        // dd($data);

        return view('Guest.Student.index', ['datas' => $data]);
    }

    public function lecturer() {
        return view('Guest.Lecturer.index');
    }

    public function lab() {
        return view('Guest.Lab.index');
    }
}
