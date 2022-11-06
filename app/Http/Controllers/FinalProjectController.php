<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model
use App\Models\FinalProject;
use App\Models\Student;
use App\Models\Mentor;
use App\Models\Lab;

class FinalProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $data = FinalProject::all();
        $no = 1;

        // dd($data);

        return view('Admin.Final-Project.index', ['datas' => $data, 'no' => $no]);
    }

    public function show(FinalProject $data) {
        return view('Admin.Final-Project.show', ['data' => $data]);
    }

    public function create() {
        $student    = Student::all();
        $mentor     = Mentor::all();
        $lab        = Lab::all();

        return view('Admin.Final-Project.create', ['students' => $student, 'mentors' => $mentor, 'labs' => $lab]);
    }

    public function store(Request $request) {
        $this->validate($request, [
    		'student_id'                => 'required|numeric',
            'first_mentor'              => 'required|numeric',
            'second_mentor'             => 'required|numeric',
            'title'                     => 'required|min:10',
            'lab_id'                    => 'required|numeric',
            'proposal_date'             => 'required|date',
            'proposal_revision_date'    => 'required|date',
            'final_project_date'        => 'required|date',
            'final_project_status'      => 'required|in:LULUS,GAGAL,LULUS DENGAN REVISI'
    	]);

        $inputs = $request->all();
        FinalProject::create($inputs);

        return redirect()->route('FinalProject.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(FinalProject $data) {
        $collection = [
            'student'    => Student::all(),
            'mentor'     => Mentor::all(),
            'lab'        => Lab::all(),
            'data'       => FinalProject::findOrFail($data)
        ];

        return view('Admin.Final-Project.update', ['collections' => $collection]);
    }

    public function update(Request $request, $data) {
        $this->validate($request, [
    		'student_id'                => 'required|numeric',
            'first_mentor'              => 'required|numeric',
            'second_mentor'             => 'required|numeric',
            'title'                     => 'required|min:10',
            'lab_id'                    => 'required|numeric',
            'proposal_date'             => 'required|date',
            'proposal_revision_date'    => 'required|date',
            'final_project_date'        => 'required|date',
            'final_project_status'      => 'required|in:LULUS,GAGAL,LULUS DENGAN REVISI'
    	]);

        $inputs         = $request->all();
        $finalproject   = FinalProject::findOrFail($data);
        $finalproject->update($inputs);

        return redirect()->route('FinalProject.index')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($data) {
        $finalproject   = FinalProject::findOrFail($data);
        $finalproject->delete();

        return redirect()->route('FinalProject.index')->with('success', 'Data Berhasil Dihapus');
    }
}
