@extends('web.layouts.app')
@section('title', 'Search Student')
@section('header', 'Search Student Info')
@section('subheader', 'Find student details quickly using SR Number, Form Number, or other details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow card-custom">
            <div class="card-body">
                <form action="{{ route('search.student') }}" method="get" class="row g-3 align-items-center">
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

                    {{-- Date of Birth --}}
                    <div class="col-md-6">
                        <label for="dob" class="form-label fw-bold small text-muted">DATE OF BIRTH</label>
                        <input type="date" id="dob" name="dob" 
                               class="form-control" value="{{ request('dob') }}">
                    </div>

                    {{-- Buttons --}}
                    <div class="col-md-12 d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </form>
            </div>

            {{-- Search Results --}}
            <div class="card-body">
                @if(isset($students))
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="usersTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Application Number</th>
                                    <th>Gender</th>
                                    <th>Date of birth</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $student)
                                    <tr>
                                        <td>{{ $student->student_name }}</td>
                                        <td>{{ $student->application_no }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->dob }}</td>
                                        <td>
                                            <a href="{{ route('show', $student->id) }}" class="btn btn-sm btn-primary">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No students found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-4 mb-2">
                        {{ $students->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
