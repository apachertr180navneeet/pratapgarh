@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6">
            <h5 class="py-2 mb-2">
                <span class="text-primary fw-light">Student Info</span>
            </h5>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.student.info.list') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            {{-- ✅ Success message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- ✅ Error messages --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.student.info.update') }}" method="POST">
                        <div class="row g-3">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}">

                            {{-- Basic Info --}}
                            <div class="col-md-6">
                                <label class="form-label">SR No</label>
                                <input type="text" class="form-control" name="sr_no" value="{{ $student->sr_no }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="course_name" value="{{ $student->course_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Application No</label>
                                <input type="text" class="form-control" name="application_no" value="{{ $student->application_no }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Application Date</label>
                                <input type="text" class="form-control" name="application_date" value="{{ $student->application_date }}">
                            </div>

                            {{-- Personal Info --}}
                            <div class="col-md-6">
                                <label class="form-label">Student Name</label>
                                <input type="text" class="form-control" name="student_name" value="{{ $student->student_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" name="category_name" value="{{ $student->category_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">MBC Candidate</label>
                                <input type="text" class="form-control" name="mbc_candidate" value="{{ $student->mbc_candidate }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Disabled</label>
                                <input type="text" class="form-control" name="disable" value="{{ $student->disable }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Minority</label>
                                <input type="text" class="form-control" name="minority" value="{{ $student->minority }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Minority Cast</label>
                                <input type="text" class="form-control" name="minority_cast" value="{{ $student->minority_cast }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">EWS</label>
                                <input type="text" class="form-control" name="ews" value="{{ $student->ews }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">DOB</label>
                                <input type="text" class="form-control" name="dob" value="{{ $student->dob }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <input type="text" class="form-control" name="gender" value="{{ $student->gender }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mobile</label>
                                <input type="text" class="form-control" name="mobile" value="{{ $student->mobile }}">
                            </div>

                            {{-- Parents Info --}}
                            <div class="col-md-6">
                                <label class="form-label">Father Name</label>
                                <input type="text" class="form-control" name="father_name" value="{{ $student->father_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mother Name</label>
                                <input type="text" class="form-control" name="mother_name" value="{{ $student->mother_name }}">
                            </div>

                            {{-- Current Address --}}
                            <div class="col-12">
                                <label class="form-label">Current Address</label>
                                <textarea class="form-control" rows="2" name="current_address">{{ $student->current_address }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Current State</label>
                                <input type="text" class="form-control" name="current_state" value="{{ $student->current_state }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Current District</label>
                                <input type="text" class="form-control" name="current_district" value="{{ $student->current_district }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Current Tehsil</label>
                                <input type="text" class="form-control" name="current_tehsil" value="{{ $student->current_tehsil }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Current Pincode</label>
                                <input type="text" class="form-control" name="current_pincode" value="{{ $student->current_pincode }}">
                            </div>

                            {{-- Permanent Address --}}
                            <div class="col-12">
                                <label class="form-label">Permanent Address</label>
                                <textarea class="form-control" rows="2" name="permanent_address">{{ $student->permanent_address }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Permanent State</label>
                                <input type="text" class="form-control" name="permanent_state" value="{{ $student->permanent_state }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Permanent District</label>
                                <input type="text" class="form-control" name="permanent_district" value="{{ $student->permanent_district }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Permanent Pincode</label>
                                <input type="text" class="form-control" name="permanent_pincode" value="{{ $student->permanent_pincode }}">
                            </div>

                            {{-- Academic Info --}}
                            <div class="col-md-6">
                                <label class="form-label">Percentage</label>
                                <input type="text" class="form-control" name="percentage" value="{{ $student->percentage }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Merit No</label>
                                <input type="text" class="form-control" name="merit_no" value="{{ $student->merit_no }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Seat Category</label>
                                <input type="text" class="form-control" name="seatcategory" value="{{ $student->seatcategory }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fee For</label>
                                <input type="text" class="form-control" name="feefor" value="{{ $student->feefor }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Total Fees</label>
                                <input type="text" class="form-control" name="total_fees" value="{{ $student->total_fees }}">
                            </div>

                            {{-- Token / Section --}}
                            <div class="col-md-6">
                                <label class="form-label">Token No</label>
                                <input type="text" class="form-control" name="token_no" value="{{ $student->token_no }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Token Date</label>
                                <input type="text" class="form-control" name="token_date" value="{{ $student->token_date }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Section</label>
                                <input type="text" class="form-control" name="seaction" value="{{ $student->seaction }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Scholar No</label>
                                <input type="text" class="form-control" name="scholor_no" value="{{ $student->scholor_no }}">
                            </div>

                            {{-- Subjects --}}
                            <div class="col-md-6">
                                <label class="form-label">Compulsory Subject</label>
                                <input type="text" class="form-control" name="compulsary_subject" value="{{ $student->compulsary_subject }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Final Subject</label>
                                <input type="text" class="form-control" name="final_subject" value="{{ $student->final_subject }}">
                            </div>

                            @for($i=1; $i<=7; $i++)
                                <div class="col-md-6">
                                    <label class="form-label">Subject Combination {{ $i }}</label>
                                    <input type="text" class="form-control" name="subject_combination_{{ $i }}" value="{{ $student->{'subject_combination_'.$i} }}">
                                </div>
                            @endfor

                            {{-- Other Participation --}}
                            <div class="col-md-6"><label class="form-label">BPL</label><input type="text" class="form-control" name="bpl" value="{{ $student->bpl }}"></div>
                            <div class="col-md-6"><label class="form-label">Willingness to Join Professional Course</label><input type="text" class="form-control" name="willingness_to_join_professional_course" value="{{ $student->willingness_to_join_professional_course }}"></div>
                            <div class="col-md-6"><label class="form-label">12th Percentage</label><input type="text" class="form-control" name="12th_percentage" value="{{ $student->{'12th_percentage'} }}"></div>
                            <div class="col-md-6"><label class="form-label">YDC</label><input type="text" class="form-control" name="ydc" value="{{ $student->ydc }}"></div>
                            <div class="col-md-6"><label class="form-label">NCC</label><input type="text" class="form-control" name="ncc" value="{{ $student->ncc }}"></div>
                            <div class="col-md-6"><label class="form-label">NSS</label><input type="text" class="form-control" name="nss" value="{{ $student->nss }}"></div>
                            <div class="col-md-6"><label class="form-label">Rover Rengering</label><input type="text" class="form-control" name="rover_rengering" value="{{ $student->rover_rengering }}"></div>
                            <div class="col-md-6"><label class="form-label">Human Right Cell</label><input type="text" class="form-control" name="human_right_cell" value="{{ $student->human_right_cell }}"></div>
                            <div class="col-md-6"><label class="form-label">Women Cell</label><input type="text" class="form-control" name="women_cell" value="{{ $student->women_cell }}"></div>

                            {{-- Contact --}}
                            <div class="col-md-6"><label class="form-label">Email</label><input type="text" class="form-control" name="email" value="{{ $student->email }}"></div>
                            <div class="col-md-6"><label class="form-label">Roll No</label><input type="text" class="form-control" name="roll_no" value="{{ $student->roll_no }}"></div>

                            {{-- Academic Performance --}}
                            <div class="col-md-6"><label class="form-label">Passing Year</label><input type="text" class="form-control" name="pass_year" value="{{ $student->pass_year }}"></div>
                            <div class="col-md-6"><label class="form-label">Total Marks</label><input type="text" class="form-control" name="total_marks" value="{{ $student->total_marks }}"></div>
                            <div class="col-md-6"><label class="form-label">Obtain Marks</label><input type="text" class="form-control" name="obtain_marks" value="{{ $student->obtain_marks }}"></div>
                            <div class="col-md-6"><label class="form-label">Board</label><input type="text" class="form-control" name="board" value="{{ $student->board }}"></div>
                            <div class="col-md-6"><label class="form-label">Class</label><input type="text" class="form-control" name="class" value="{{ $student->class }}"></div>

                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    Update Detail
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- ✅ Generate CC Submit Button --}}
                    <div class="mt-3 text-end">
                        <form action="{{ route('admin.student.info.generate.cc') }}" method="POST" target="_blank">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <button type="submit" class="btn btn-primary">
                                Generate CC
                            </button>
                        </form>
                    </div>

                    <div class="mt-3 text-end">
                        <form action="{{ route('admin.student.info.generate.tc') }}" method="POST" target="_blank">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <button type="submit" class="btn btn-primary">
                                Generate TC
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
</script>
@endsection
