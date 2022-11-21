@extends('layouts.basic')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('Admin.Lecturer.update', ['data' => $data]) }}" method="POST" id="addForm">
                        @csrf
                        <div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control {{ $errors->has('nip') ? "is-invalid" : "" }}" value="{{ $data->nip }}" placeholder="NIP" name="nip" maxlength="200" autocomplete="off" readonly>
                                <label for="nip">NIP *</label>

                                @if ($errors->has('nip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control {{ $errors->has('name') ? "is-invalid" : "" }}" value="{{ $data->name }}" placeholder="Name" name="name" maxlength="200" autocomplete="off" required>
                                <label for="name">Name *</label>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-control {{ $errors->has('study_program_id') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Student" name="study_program_id" required>
                                            <option value="" selected disabled>-- PILIH --</option>
                                            @foreach ($study_program as $sp)
                                                <option value="{{ $sp->id }}" {{ $data->study_program_id === $sp->id ? 'selected' : '' }}>{{ $sp->education_program }}-{{ $sp->major }}</option>
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
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control {{ $errors->has('position') ? "is-invalid" : "" }}" value="{{ $data->position }}" placeholder="Position" name="position" min="1" max="14" autocomplete="off">
                                        <label for="position">Position</label>

                                        @if ($errors->has('position'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('position') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control {{ $errors->has('direct_supervisor_id') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Direct Supervisor" name="direct_supervisor_id">
                                    <option value="" selected disabled>-- PILIH --</option>
                                    @foreach ($lecturer as $lecturer)
                                        <option value="{{ $lecturer->id }}" {{ $data->direct_supervisor_id == $lecturer->id ? 'selected' : '' }}>{{ $lecturer->name }}</option>
                                    @endforeach
                                </select>
                                <label for="direct_supervisor_id">Direct Supervisor</label>

                                @if ($errors->has('direct_supervisor_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direct_supervisor_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control {{ $errors->has('status') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Status" name="status" required>
                                    <option value="" selected disabled>-- PILIH --</option>
                                    <option value="active" {{ $data->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $data->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                                        <input type="date" class="form-control {{ $errors->has('birth_date') ? "is-invalid" : "" }}" value="{{ $data->birth_date->format('Y-m-d') }}" placeholder="Birth Date" name="birth_date" required>
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
                                        <input type="text" class="form-control {{ $errors->has('birth_place') ? "is-invalid" : "" }}" value="{{ $data->birth_place }}" placeholder="Birth Place" name="birth_place" required>
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
                                        <input type="number" class="form-control {{ $errors->has('years_of_service') ? "is-invalid" : "" }}" value="{{ $data->years_of_service }}" min="1" placeholder="Years of Service" name="years_of_service" required>
                                        <label for="years_of_service">Years of Service *</label>
                                    </div>

                                    @if ($errors->has('years_of_service'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('years_of_service') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control {{ $errors->has('months_of_service') ? "is-invalid" : "" }}" value="{{ $data->months_of_service }}" min="1" placeholder="Graduation Date" name="months_of_service" required>
                                        <label for="months_of_service">Months of Service *</label>
                                    </div>

                                    @if ($errors->has('months_of_service'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('months_of_service') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-control {{ $errors->has('gender') ? "is-invalid" : "" }}" aria-label="Default select example" placeholder="Gender" name="gender" required>
                                            <option selected disabled>-- pilih --</option>
                                            <option value="men" {{ $data->gender === 'men' ? 'selected' : '' }}>MEN</option>
                                            <option value="women" {{ $data->gender === 'women' ? 'selected' : '' }}>WOMEN</option>
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
                                            <option value="WNI" {{ $data->citizenship === 'WNI' ? 'selected' : '' }}>WNI</option>
                                            <option value="WNA" {{ $data->citizenship === 'WNA' ? 'selected' : '' }}>WNA</option>
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
                                                <option value="{{ $religion->id }}" {{ $data->religion_id === $religion->id ? 'selected' : '' }}>{{ $religion->name }}</option>
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
                                            <option value="A" {{ $data->blood_type === 'A' ? 'selected' : '' }}>A</option>
                                            <option value="O" {{ $data->blood_type === 'O' ? 'selected' : '' }}>O</option>
                                            <option value="B" {{ $data->blood_type === 'B' ? 'selected' : '' }}>B</option>
                                            <option value="AB" {{ $data->blood_type === 'AB' ? 'selected' : '' }}>AB</option>
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
                                        <input type="text" class="form-control {{ $errors->has('address') ? "is-invalid" : "" }}" value="{{ $data->address }}" aria-label="Default select example" placeholder="Address" name="address" required>
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
                                        <input type="text" class="form-control {{ $errors->has('phone') ? "is-invalid" : "" }}" value="{{ $data->phone }}" aria-label="Default select example" placeholder="Phone" name="phone" required>
                                        <label for="phone">Phone *</label>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control {{ $errors->has('nidn_nupn') ? "is-invalid" : "" }}" value="{{ $data->nidn_nupn }}" aria-label="Default select example" placeholder="NIDN/NUPN" name="nidn_nupn">
                                        <label for="nidn_nupn">NIDN/NUPN</label>

                                        @if ($errors->has('nidn_nupn'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nidn_nupn') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control {{ $errors->has('karis_karsus') ? "is-invalid" : "" }}" value="{{ $data->karis_karsus }}" aria-label="Default select example" placeholder="Karis/Karsus" name="karis_karsus">
                                        <label for="karis_karsus">Karis/Karsus</label>

                                        @if ($errors->has('karis_karsus'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('karis_karsus') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
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
