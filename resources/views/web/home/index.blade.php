@extends('web.layouts.app')
@section('title', 'Student Details')
@section('header', 'Student Info')
@section('subheader', 'Add your details below')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
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
        <div class="card shadow card-custom">
            <div class="card-body">
                <form action="{{ route('submit.student') }}" method="post" class="row g-3 align-items-center" enctype="multipart/form-data">
                    @csrf

                    {{-- Application Number --}}
                    <div class="col-md-6">
                        <label for="application_no" class="form-label fw-bold small text-muted">APPLICATION NUMBER</label>
                        <input type="text" id="application_no" name="application_no" 
                               class="form-control" value="{{ request('application_no') }}" placeholder="Enter Application Number">
                    </div>

                    {{-- Mobile Number --}}
                    <div class="col-md-6">
                        <label for="mobile" class="form-label fw-bold small text-muted">MOBILE NUMBER</label>
                        <input type="text" id="mobile" name="mobile" 
                               class="form-control" value="{{ request('mobile') }}" placeholder="Enter Mobile Number">
                    </div>

                    {{-- Father Name --}}
                    <div class="col-md-6">
                        <label for="father_name" class="form-label fw-bold small text-muted">FATHER NAME</label>
                        <input type="text" id="father_name" name="father_name" 
                               class="form-control" value="{{ request('father_name') }}" placeholder="Enter Father Name">
                    </div>

                    {{-- Mother Name --}}
                    <div class="col-md-6">
                        <label for="mother_name" class="form-label fw-bold small text-muted">MOTHER NAME</label>
                        <input type="text" id="mother_name" name="mother_name" 
                               class="form-control" value="{{ request('mother_name') }}" placeholder="Enter Mother Name">
                    </div>

                    {{-- Date of Birth --}}
                    <div class="col-md-6">
                        <label for="dob" class="form-label fw-bold small text-muted">DATE OF BIRTH</label>
                        <input type="date" id="dob" name="dob" 
                               class="form-control" value="{{ request('dob') }}">
                    </div>

                    {{-- Aadhaar Card Upload --}}
                    <div class="col-md-6">
                        <label for="aadhar_card" class="form-label fw-bold small text-muted">AADHAAR CARD</label>
                        <input type="file" id="aadhar_card" name="aadhar_card" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                    </div>

                    {{-- Marksheet Upload --}}
                    <div class="col-md-6">
                        <label for="marksheet" class="form-label fw-bold small text-muted">MARKSHEET</label>
                        <input type="file" id="marksheet" name="marksheet" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                    </div>

                    {{-- Buttons --}}
                    <div class="col-md-12 d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
