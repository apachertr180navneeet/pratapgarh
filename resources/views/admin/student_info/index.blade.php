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
            <a href="{{ route('admin.student.info.search') }}" class="btn btn-primary">
                Search Student
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
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

                        {{-- Pagination Links --}}
                        <div class="d-flex justify-content-end mt-4 mb-2">
                            {{ $students->links() }}
                        </div>
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
