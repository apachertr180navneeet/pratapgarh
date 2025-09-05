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
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row g-3">

                            {{-- Basic Info --}}
                            <div class="col-md-6">
                                <label class="form-label">SR No</label>
                                <input type="text" class="form-control" value="{{ $student->sr_no }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Course Name</label>
                                <input type="text" class="form-control" value="{{ $student->course_name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Application No</label>
                                <input type="text" class="form-control" value="{{ $student->application_no }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Application Date</label>
                                <input type="text" class="form-control" value="{{ $student->application_date }}" readonly>
                            </div>

                            {{-- Personal Info --}}
                            <div class="col-md-6">
                                <label class="form-label">Student Name</label>
                                <input type="text" class="form-control" value="{{ $student->student_name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" value="{{ $student->category_name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">MBC Candidate</label>
                                <input type="text" class="form-control" value="{{ $student->mbc_candidate }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Disabled</label>
                                <input type="text" class="form-control" value="{{ $student->disable }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Minority</label>
                                <input type="text" class="form-control" value="{{ $student->minority }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Minority Cast</label>
                                <input type="text" class="form-control" value="{{ $student->minority_cast }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">EWS</label>
                                <input type="text" class="form-control" value="{{ $student->ews }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">DOB</label>
                                <input type="text" class="form-control" value="{{ $student->dob }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <input type="text" class="form-control" value="{{ $student->gender }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mobile</label>
                                <input type="text" class="form-control" value="{{ $student->mobile }}" readonly>
                            </div>

                            {{-- Parents Info --}}
                            <div class="col-md-6">
                                <label class="form-label">Father Name</label>
                                <input type="text" class="form-control" value="{{ $student->father_name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mother Name</label>
                                <input type="text" class="form-control" value="{{ $student->mother_name }}" readonly>
                            </div>

                            {{-- Current Address --}}
                            <div class="col-12">
                                <label class="form-label">Current Address</label>
                                <textarea class="form-control" rows="2" readonly>{{ $student->current_address }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Current State</label>
                                <input type="text" class="form-control" value="{{ $student->current_state }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Current District</label>
                                <input type="text" class="form-control" value="{{ $student->current_district }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Current Tehsil</label>
                                <input type="text" class="form-control" value="{{ $student->current_tehsil }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Current Pincode</label>
                                <input type="text" class="form-control" value="{{ $student->current_pincode }}" readonly>
                            </div>

                            {{-- Permanent Address --}}
                            <div class="col-12">
                                <label class="form-label">Permanent Address</label>
                                <textarea class="form-control" rows="2" readonly>{{ $student->permanent_address }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Permanent State</label>
                                <input type="text" class="form-control" value="{{ $student->permanent_state }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Permanent District</label>
                                <input type="text" class="form-control" value="{{ $student->permanent_district }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Permanent Pincode</label>
                                <input type="text" class="form-control" value="{{ $student->permanent_pincode }}" readonly>
                            </div>

                            {{-- Academic Info --}}
                            <div class="col-md-6">
                                <label class="form-label">Percentage</label>
                                <input type="text" class="form-control" value="{{ $student->percentage }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Merit No</label>
                                <input type="text" class="form-control" value="{{ $student->merit_no }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Seat Category</label>
                                <input type="text" class="form-control" value="{{ $student->seatcategory }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fee For</label>
                                <input type="text" class="form-control" value="{{ $student->feefor }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Total Fees</label>
                                <input type="text" class="form-control" value="{{ $student->total_fees }}" readonly>
                            </div>

                            {{-- Token / Section --}}
                            <div class="col-md-6">
                                <label class="form-label">Token No</label>
                                <input type="text" class="form-control" value="{{ $student->token_no }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Token Date</label>
                                <input type="text" class="form-control" value="{{ $student->token_date }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Section</label>
                                <input type="text" class="form-control" value="{{ $student->seaction }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Scholar No</label>
                                <input type="text" class="form-control" value="{{ $student->scholor_no }}" readonly>
                            </div>

                            {{-- Subjects --}}
                            <div class="col-md-6">
                                <label class="form-label">Compulsory Subject</label>
                                <input type="text" class="form-control" value="{{ $student->compulsary_subject }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Final Subject</label>
                                <input type="text" class="form-control" value="{{ $student->final_subject }}" readonly>
                            </div>

                            @for($i=1; $i<=7; $i++)
                                <div class="col-md-6">
                                    <label class="form-label">Subject Combination {{ $i }}</label>
                                    <input type="text" class="form-control" value="{{ $student->{'subject_combination_'.$i} }}" readonly>
                                </div>
                            @endfor

                            {{-- Other Participation --}}
                            <div class="col-md-6"><label class="form-label">BPL</label><input type="text" class="form-control" value="{{ $student->bpl }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">Willingness to Join Professional Course</label><input type="text" class="form-control" value="{{ $student->willingness_to_join_professional_course }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">12th Percentage</label><input type="text" class="form-control" value="{{ $student->{'12th_percentage'} }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">YDC</label><input type="text" class="form-control" value="{{ $student->ydc }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">NCC</label><input type="text" class="form-control" value="{{ $student->ncc }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">NSS</label><input type="text" class="form-control" value="{{ $student->nss }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">Rover Rengering</label><input type="text" class="form-control" value="{{ $student->rover_rengering }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">Human Right Cell</label><input type="text" class="form-control" value="{{ $student->human_right_cell }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">Women Cell</label><input type="text" class="form-control" value="{{ $student->women_cell }}" readonly></div>

                            {{-- Contact --}}
                            <div class="col-md-6"><label class="form-label">Email</label><input type="text" class="form-control" value="{{ $student->email }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">Roll No</label><input type="text" class="form-control" value="{{ $student->roll_no }}" readonly></div>

                            {{-- Academic Performance --}}
                            <div class="col-md-6"><label class="form-label">Passing Year</label><input type="text" class="form-control" value="{{ $student->pass_year }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">Total Marks</label><input type="text" class="form-control" value="{{ $student->total_marks }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">Obtain Marks</label><input type="text" class="form-control" value="{{ $student->obtain_marks }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">Board</label><input type="text" class="form-control" value="{{ $student->board }}" readonly></div>
                            <div class="col-md-6"><label class="form-label">Class</label><input type="text" class="form-control" value="{{ $student->class }}" readonly></div>

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
