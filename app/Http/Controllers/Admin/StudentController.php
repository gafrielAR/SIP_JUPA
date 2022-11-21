<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Student;
use App\Models\StudyProgram;
use App\Models\Lecturer;
use App\Models\Religion;
use App\Models\AcceptancePath;

class StudentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $data = Student::with('study_program')->with('guardian_lecturer')->with('religion')->with('acceptance_path')->get();
        $no = 1;

        return view('Admin.Student.index', ['datas' => $data, 'no' => $no]);
    }

    public function show(Student $data) {
        return view('Admin.Student.show', ['data' => $data]);
    }

    public function create() {
        $collection = [
            'study_program'     => StudyProgram::all(),
            'lecturer'          => Lecturer::all(),
            'religion'          => Religion::all(),
            'acceptance_path'   => AcceptancePath::all()
        ];

        return view('Admin.Student.create', $collection);
    }

    public function store(Request $request) {
        $this->validate($request, [
    		'nrp'                   => 'required|numeric|unique:students,nrp',
            'name'                  => 'required',
            'study_program_id'      => 'required|numeric',
            'semester'              => 'required|numeric|min:1|max:14',
            'parallel'              => 'required',
            'guardian_lecturer_id'  => 'required|numeric',
            'status'                => 'required|in:active,inactive',
            'birth_date'            => 'required|date',
            'birth_place'           => 'required',
            'date_of_entry'         => 'required|date',
            'gender'                => 'required|in:men,women',
            'citizenship'           => 'required|in:WNI,WNA',
            'religion_id'           => 'required|numeric',
            'blood_type'            => 'required|in:A,O,B,AB',
            'address'               => 'required',
            'phone'                 => 'required',
            'graduate_date'         => 'nullable|date',
            'acceptance_path_id'    => 'required|numeric'
    	]);

        $inputs = $request->all();
        Student::create($inputs);

        return redirect()->route('Admin.Student.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(Student $data) {
        $collection = [
            'study_program'     => StudyProgram::all(),
            'lecturer'          => Lecturer::all(),
            'religion'          => Religion::all(),
            'acceptance_path'   => AcceptancePath::all(),
            'data'              => $data
        ];

        return view('Admin.Student.update', $collection);
    }

    public function update(Request $request, $data) {
        $this->validate($request, [
            'name'                  => 'required',
            'study_program_id'      => 'required|numeric',
            'semester'              => 'required|numeric|min:1|max:14',
            'parallel'              => 'required',
            'guardian_lecturer_id'  => 'required|numeric',
            'status'                => 'required|in:active,inactive',
            'birth_date'            => 'required|date',
            'birth_place'           => 'required',
            'date_of_entry'         => 'required|date',
            'gender'                => 'required|in:men,women',
            'citizenship'           => 'required|in:WNI,WNA',
            'religion_id'           => 'required|numeric',
            'blood_type'            => 'required|in:A,O,B,AB',
            'address'               => 'required',
            'phone'                 => 'required',
            'graduate_date'         => 'nullable|date',
            'acceptance_path_id'    => 'required|numeric'
    	]);

        $inputs     = $request->all();
        $student    = Student::findOrFail($data);
        $student->update($inputs);

        return redirect()->route('Admin.Student.index')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($data) {
        $student = Student::findOrFail($data);
        $student->delete();

        return redirect()->route('Admin.Student.index')->with('success', 'Data Berhasil Dihapus');
    }
}
