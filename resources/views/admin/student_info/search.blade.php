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
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.student.info.search') }}" method="GET" class="mb-4">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label for="sr_number" class="form-label">SR Number</label>
                                <input type="text" id="sr_number" name="sr_number" class="form-control" value="{{ request('sr_number') }}" placeholder="Enter SR Number">
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="form-label">Form Number</label>
                                <input type="text" id="phone" name="phone" class="form-control" value="{{ request('form_number') }}" placeholder="Enter Form Number">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ route('admin.student.info.search') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </form>

                    @if(isset($students))
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll No</th>
                                        <th>SR Number</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->roll_no }}</td>
                                            <td>{{ $student->sr_number }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>
                                                <a href="{{ route('admin.student.info.show', $student->id) }}" class="btn btn-sm btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No students found.</td>
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
