@extends('web.layouts.app')
@section('title', 'Search Student')
@section('header', 'Search Student Info')
@section('subheader', 'Find student details quickly using SR Number or Form Number')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow card-custom">
            <div class="card-body">
                <form action="{{ route('search.student') }}" method="get" class="row g-3 align-items-center">
                    @csrf

                    {{-- SR Number --}}
                    <div class="col-md-6">
                        <label for="sr_number" class="form-label fw-bold small text-muted">SR NUMBER</label>
                        <input type="text" name="sr_number" id="sr_number"
                               class="form-control" placeholder="Enter SR Number" value="{{ request('sr_number') }}">
                    </div>

                    {{-- Phone Number --}}
                    <div class="col-md-6">
                        <label for="phone" class="form-label fw-bold small text-muted">PHONE NUMBER</label>
                        <input type="text" name="phone" id="phone"
                               class="form-control" placeholder="Enter Phone Number" value="{{ request('phone') }}">
                    </div>

                    {{-- Buttons --}}
                    <div class="col-md-2 d-flex align-items-end gap-2 mt-3">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                        <a href="{{ route('home') }}" class="btn btn-secondary w-100">Reset</a>
                    </div>
                </form>
            </div>

            <div class="card-body">
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
                                            <a href="{{ route('show', $student->id) }}" class="btn btn-sm btn-primary">View</a>
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
@endsection
@section('script')

@endsection