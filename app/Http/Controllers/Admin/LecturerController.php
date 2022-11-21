<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Lecturer;
use App\Models\StudyProgram;
use App\Models\Religion;

class LecturerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $data = Lecturer::with('study_program')->with('religion')->with('direct_supervisor')->get();
        $no = 1;

        return view('Admin.Lecturer.index', ['datas' => $data, 'no' => $no]);
    }

    public function show(Student $data) {
        return view('Admin.Lecturer.show', ['data' => $data]);
    }

    public function create() {
        $collection = [
            'study_program'     => StudyProgram::all(),
            'lecturer'          => Lecturer::all(),
            'religion'          => Religion::all(),
        ];

        return view('Admin.Lecturer.create', $collection);
    }

    public function store(Request $request) {
        $this->validate($request, [
    		'nip'                   => 'required|numeric|unique:lecturers,nip',
            'name'                  => 'required',
            'study_program_id'      => 'required|numeric',
            'direct_supervisor_id'  => 'required|numeric',
            'years_of_service'      => 'required|numeric',
            'months_of_service'     => 'required|numeric',
            'status'                => 'required|in:active,inactive',
            'birth_date'            => 'required|date',
            'birth_place'           => 'required',
            'gender'                => 'required|in:men,women',
            'citizenship'           => 'required|in:WNI,WNA',
            'religion_id'           => 'required|numeric',
            'blood_type'            => 'required|in:A,O,B,AB',
            'address'               => 'required',
            'phone'                 => 'required',
            'nidn_nupn'             => 'nullable|numeric',
            'position'              => 'nullable',
            'karis_karsus'          => 'nullable'
    	]);

        $inputs = $request->all();
        Lecturer::create($inputs);

        return redirect()->route('Admin.Lecturer.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(Lecturer $data) {
        $collection = [
            'study_program'     => StudyProgram::all(),
            'lecturer'          => Lecturer::all(),
            'religion'          => Religion::all(),
            'data'              => $data
        ];

        return view('Admin.Lecturer.update', $collection);
    }

    public function update(Request $request, $data) {
        $this->validate($request, [
            'name'                  => 'required',
            'study_program_id'      => 'required|numeric',
            'direct_supervisor_id'  => 'required|numeric',
            'years_of_service'      => 'required|numeric',
            'months_of_service'     => 'required|numeric',
            'status'                => 'required|in:active,inactive',
            'birth_date'            => 'required|date',
            'birth_place'           => 'required',
            'gender'                => 'required|in:men,women',
            'citizenship'           => 'required|in:WNI,WNA',
            'religion_id'           => 'required|numeric',
            'blood_type'            => 'required|in:A,O,B,AB',
            'address'               => 'required',
            'phone'                 => 'required',
            'nidn_nupn'             => 'nullable|numeric',
            'position'              => 'nullable',
            'karis_karsus'          => 'nullable'
    	]);

        $inputs     = $request->all();
        $lecturer   = Lecturer::findOrFail($data);
        $lecturer->update($inputs);

        return redirect()->route('Admin.Lecturer.index')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($data) {
        $lecturer = Lecturer::findOrFail($data);
        $lecturer->delete();

        return redirect()->route('Admin.Lecturer.index')->with('success', 'Data Berhasil Dihapus');
    }
}
