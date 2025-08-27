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
            <a href="{{ route('admin.student.info.list') }}" class="btn btn-primary">
                Search Student
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            @if(isset($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.student.info.search') }}" method="GET" class="mb-4">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-6">
                                <label for="application_no" class="form-label">Application Number</label>
                                <input type="text" id="application_no" name="application_no" class="form-control" value="{{ request('application_no') }}" placeholder="Enter Application Number">
                            </div>
                            <div class="col-md-6">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <input type="text" id="mobile" name="mobile" class="form-control" value="{{ request('mobile') }}" placeholder="Enter Mobile Number">
                            </div>
                            <div class="col-md-6">
                                <label for="father_name" class="form-label">Father Name</label>
                                <input type="text" id="father_name" name="father_name" class="form-control" value="{{ request('father_name') }}" placeholder="Enter Father Name">
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-control" value="{{ request('dob') }}" placeholder="Enter Date of Birth">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ route('admin.student.info.search') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </form>

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
                                                <a href="{{ route('admin.student.info.show', $student->id) }}" class="btn btn-sm btn-primary">View</a>
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
</div>
@endsection
@section('script')
<script>

</script>
@endsection
