@extends('admin.layouts.app')
@section('style')

@endsection
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6">
            <h5 class="py-2 mb-2">
                <span class="text-primary fw-light">Stutdent Info</span>
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
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{ $student->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" value="{{ $student->phone }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Roll No</label>
                                <input type="text" class="form-control" value="{{ $student->roll_no }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">SR Number</label>
                                <input type="text" class="form-control" value="{{ $student->sr_number }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Passing Year</label>
                                <input type="text" class="form-control" value="{{ $student->passing_year }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Class</label>
                                <input type="text" class="form-control" value="{{ $student->{'class'} }}" readonly>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" rows="2" readonly>{{ $student->address }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Father's Name</label>
                                <input type="text" class="form-control" value="{{ $student->father_name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Father's Mobile</label>
                                <input type="text" class="form-control" value="{{ $student->father_mobile }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mother's Name</label>
                                <input type="text" class="form-control" value="{{ $student->mother_name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mother's Mobile</label>
                                <input type="text" class="form-control" value="{{ $student->mother_mobile }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <div>
                                    <span class="badge bg-{{ (string)$student->status === '1' ? 'success' : 'secondary' }}">{{ (string)$student->status === '1' ? 'Active' : 'Inactive' }}</span>
                                </div>
                            </div>
                        </div>
                    </form>
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
