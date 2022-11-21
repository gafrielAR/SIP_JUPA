@extends('layouts.basic')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('Admin.Student.store') }}" method="post">
                        @csrf
                        <div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control {{ $errors->has('nrp') ? "is-invalid" : "" }}" value="{{ old('nrp') }}" placeholder="NRP" name="nrp" maxlength="200" autocomplete="off" required>
                                <label for="nrp">NRP *</label>

                                @if ($errors->has('nrp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nrp') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control {{ $errors->has('name') ? "is-invalid" : "" }}" value="{{ old('name') }}" placeholder="Name" name="name" maxlength="200" autocomplete="off" required>
                                <label for="name">Name *</label>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row g-3">
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <select class="form-control {{ $errors->has('study_program_id') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Student" name="study_program_id" required>
                                            <option value="" selected disabled>-- PILIH --</option>
                                            @foreach ($study_program as $sp)
                                                <option value="{{ $sp->id }}" {{ old('study_program_id') === $sp->id ? 'selected' : '' }}>{{ $sp->education_program }}-{{ $sp->major }}</option>
                                            @endforeach
                                        </select>
                                        <label for="study_program_id">Study Program *</label>

                                        @if ($errors->has('study_program_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('study_program_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control {{ $errors->has('semester') ? "is-invalid" : "" }}" value="{{ old('semester') }}" placeholder="Semester" name="semester" min="1" max="14" autocomplete="off" required>
                                        <label for="semester">Semester *</label>

                                        @if ($errors->has('semester'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('semester') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control {{ $errors->has('parallel') ? "is-invalid" : "" }}" value="{{ old('parallel') }}" placeholder="Parallel" name="parallel" maxlength="1" autocomplete="off" required>
                                        <label for="parallel">Paralel *</label>

                                        @if ($errors->has('parallel'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('parallel') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control {{ $errors->has('guardian_lecturer_id') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Guardian Lecturer" name="guardian_lecturer_id" required>
                                    <option value="" selected disabled>-- PILIH --</option>
                                    @foreach ($lecturer as $lecturer)
                                        <option value="{{ $lecturer->id }}" {{ old('guardian_lecturer_id') == $lecturer->id ? 'selected' : '' }}>{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                                <label for="guardian_lecturer_id">Guardian Lecturer *</label>

                                @if ($errors->has('guardian_lecturer_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('guardian_lecturer_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control {{ $errors->has('status') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Status" name="status" required>
                                    <option value="" selected disabled>-- PILIH --</option>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <label for="status">Status *</label>

                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control {{ $errors->has('birth_date') ? "is-invalid" : "" }}" value="{{ old('birth_date') }}" placeholder="Birth Date" name="birth_date" required>
                                        <label for="birth_date">Birth Date *</label>
                                    </div>

                                    @if ($errors->has('birth_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birth_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control {{ $errors->has('birth_place') ? "is-invalid" : "" }}" value="{{ old('birth_place') }}" placeholder="Birth Place" name="birth_place" required>
                                        <label for="birth_place">Birth Place *</label>
                                    </div>

                                    @if ($errors->has('birth_place'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birth_place') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control {{ $errors->has('date_of_entry') ? "is-invalid" : "" }}" value="{{ old('date_of_entry') }}" placeholder="Date of Entry" name="date_of_entry" required>
                                        <label for="date_of_entry">Date of Entry *</label>
                                    </div>

                                    @if ($errors->has('date_of_entry'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_of_entry') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control {{ $errors->has('graduation_date') ? "is-invalid" : "" }}" value="{{ old('graduation_date') }}" placeholder="Graduation Date" name="graduation_date">
                                        <label for="graduation_date">Graduation Date</label>
                                    </div>

                                    @if ($errors->has('graduation_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('graduation_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-control {{ $errors->has('gender') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Gender" name="gender" required>
                                            <option selected disabled>-- pilih --</option>
                                            <option value="men" {{ old('gender') === 'men' ? 'selected' : '' }}>MEN</option>
                                            <option value="women" {{ old('gender') === 'women' ? 'selected' : '' }}>WOMEN</option>
                                        </select>
                                        <label for="gender">Gender *</label>

                                        @if ($errors->has('gender'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-control {{ $errors->has('citizenship') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Citizenship" name="citizenship" required>
                                            <option selected disabled>-- pilih --</option>
                                            <option value="WNI" {{ old('citizenship') === 'WNI' ? 'selected' : '' }}>WNI</option>
                                            <option value="WNA" {{ old('citizenship') === 'WNA' ? 'selected' : '' }}>WNA</option>
                                        </select>
                                        <label for="citizenship">Citizenship *</label>

                                        @if ($errors->has('citizenship'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('citizenship') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-control {{ $errors->has('religion_id') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Religion" name="religion_id" required>
                                            <option selected disabled>-- pilih --</option>
                                            @foreach ($religion as $religion)
                                                <option value="{{ $religion->id }}" {{ old('religion_id') === $religion->id ? 'selected' : '' }}>{{ $religion->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="religion_id">Religion *</label>

                                        @if ($errors->has('religion_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('religion_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-control {{ $errors->has('blood_type') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Blood Type" name="blood_type" required>
                                            <option selected disabled>-- pilih --</option>
                                            <option value="A" {{ old('blood_type') === 'A' ? 'selected' : '' }}>A</option>
                                            <option value="O" {{ old('blood_type') === 'O' ? 'selected' : '' }}>O</option>
                                            <option value="B" {{ old('blood_type') === 'B' ? 'selected' : '' }}>B</option>
                                            <option value="AB" {{ old('blood_type') === 'AB' ? 'selected' : '' }}>AB</option>
                                        </select>
                                        <label for="blood_type">Blood Type *</label>

                                        @if ($errors->has('blood_type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('blood_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control {{ $errors->has('address') ? "is-invalid" : "" }}" value="{{ old(address) }}" aria-label="Default select example" placeholder="Address" name="address" required>
                                        <label for="address">Address *</label>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control {{ $errors->has('phone') ? "is-invalid" : "" }}" value="{{ old(phone) }}" aria-label="Default select example" placeholder="Phone" name="phone" required>
                                        <label for="phone">Phone *</label>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control {{ $errors->has('acceptance_path_id') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="acceptance_path_id" name="acceptance_path_id" required>
                                    <option selected disabled>-- pilih --</option>
                                    @foreach ($acceptance_path as $ap)
                                        <option value="{{ $ap->id }}" {{ old('acceptance_path_id') === $ap->id ? 'selected' : '' }}>{{ $ap->name }}</option>
                                    @endforeach
                                </select>
                                <label for="acceptance_path_id">Acceptance Path *</label>

                                @if ($errors->has('acceptance_path_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('acceptance_path_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="reset" value="Reset" class="btn btn-outline-danger mx-1">
                            <input type="submit" value="Simpan" class="btn btn-success mx-1">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
