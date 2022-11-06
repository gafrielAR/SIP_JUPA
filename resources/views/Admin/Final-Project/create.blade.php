@extends('layouts.basic')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('FinalProject.store') }}" method="POST" id="addForm">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        </div>
                        <div>
                            <div class="form-floating mb-3">
                                <select class="form-control {{ $errors->has('student_id') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="student" name="student_id" required>
                                    <option value="" selected disabled>-- PILIH --</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                                    @endforeach
                                </select>
                                <label for="student_id">{{ (old('student_id') == $student->id ? "selected" : "Mahasiswa") }}</label>

                                @if ($errors->has('student_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control {{ $errors->has('first_mentor') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Main Mentor" name="first_mentor" required>
                                    <option value="" selected disabled>-- PILIH --</option>
                                    @foreach ($mentors as $mentor)
                                        <option value="{{ $mentor->id }}" {{ old('first_mentor') == $mentor->id ? 'selected' : '' }}>{{ $mentor->name }}</option>
                                    @endforeach
                                </select>
                                <label for="first_mentor">Main Mentor</label>

                                @if ($errors->has('first_mentor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_mentor') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control {{ $errors->has('second_mentor') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Sub Mentor" name="second_mentor" required>
                                    <option value="" selected disabled>-- PILIH --</option>
                                    @foreach ($mentors as $mentor)
                                        <option value="{{ $mentor->id }}" {{ old('second_mentor') == $mentor->id ? 'selected' : '' }}>{{ $mentor->name }}</option>
                                    @endforeach
                                </select>
                                <label for="second_mentor">Sub Mentor</label>

                                @if ($errors->has('second_mentor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('second_mentor') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control {{ $errors->has('title') ? "is-invalid" : "" }}" value="{{ old('title') }}" placeholder="Title" name="title" maxlength="200" autocomplete="off" required>
                                <label for="title">Judul</label>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control {{ $errors->has('lab_id') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Lab" name="lab_id" required>
                                    <option value="" selected disabled>-- PILIH --</option>
                                    @foreach ($labs as $lab)
                                        <option value="{{ $lab->id }}" {{ old('lab_id') == $lab->id ? 'selected' : '' }}>{{ $lab->name }}</option>
                                    @endforeach
                                </select>
                                <label for="lab_id">Lab</label>

                                @if ($errors->has('lab_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lab_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control {{ $errors->has('proposal_date') ? "is-invalid" : "" }}" value="{{ old('proposal_date') }}" placeholder="Proposal Date" name="proposal_date" required>
                                        <label for="proposal_date">Tanggal Proposal</label>
                                    </div>

                                    @if ($errors->has('proposal_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('proposal_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control {{ $errors->has('proposal_revision_date') ? "is-invalid" : "" }}" value="{{ old('proposal_revision_date') }}" placeholder="Revision Proposal Date" name="proposal_revision_date" required>
                                        <label for="proposal_revision_date">Tanggal Revisi Proposal</label>
                                    </div>

                                    @if ($errors->has('proposal_revision_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('proposal_revision_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control {{ $errors->has('final_project_date') ? "is-invalid" : "" }}" value="{{ old('final_project_date') }}" placeholder="Final Project Date" name="final_project_date" required>
                                        <label for="final_project_date">Tanggal TA</label>

                                        @if ($errors->has('final_project_date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('final_project_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-control {{ $errors->has('final_project_status') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Final Project Status" name="final_project_status" required>
                                            <option selected disabled>-- pilih --</option>
                                            <option value="LULUS" {{ old('final_project_status') === 'LULUS' ? 'selected' : '' }}>LULUS</option>
                                            <option value="GAGAL" {{ old('final_project_status') === 'GAGAL' ? 'selected' : '' }}>GAGAL</option>
                                            <option value="LULUS DENGAN REVISI" {{ old('final_project_status') === 'LULUS DENGAN REVISI' ? 'selected' : '' }}>LULUS DENGAN REVISI</option>
                                        </select>
                                        <label for="final_project_status">Status TA</label>

                                        @if ($errors->has('final_project_status'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('final_project_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" value="Reset" class="btn btn-outline-danger">
                            <input type="submit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection