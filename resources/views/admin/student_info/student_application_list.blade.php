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
                                    <th>Application Request Id</th>
                                    <th>Application Number</th>
                                    <th>Mobile</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Aadhar Card</th>
                                    <th>Marksheet</th>
                                    <th>Document type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $app)
                                    <tr>
                                        <td>{{ $app->application_request_id }}</td>
                                        <td>
                                            @if($app->link == 1)
                                                <a href="{{ route('admin.student.info.show', $app->student_id) }}">
                                                    {{ $app->application_no }}
                                                </a>
                                            @else
                                                {{ $app->application_no }}
                                            @endif
                                        </td>
                                        <td>{{ $app->mobile }}</td>
                                        <td>
                                            @if($app->link == 1)
                                                <a href="{{ route('admin.student.info.show', $app->student_id) }}">
                                                    {{ $app->father_name }}
                                                </a>
                                            @else
                                                {{ $app->father_name }}
                                            @endif
                                        </td>
                                        <td>{{ $app->mother_name }}</td>
                                        <td>
                                            @if($app->aadhar_card)
                                                <a href="{{ $app->aadhar_card }}" target="_blank" class="btn btn-sm btn-info">
                                                    View
                                                </a>
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($app->marksheet)
                                                <a href="{{ $app->marksheet }}" target="_blank" class="btn btn-sm btn-secondary mt-2 mb-2">
                                                    View
                                                </a>
                                            @endif
                                            <br>
                                            @if($app->marksheetone)
                                                <a href="{{ $app->marksheetone }}" target="_blank" class="btn btn-sm btn-secondary mt-2 mb-2">
                                                    View
                                                </a>
                                            @endif
                                            <br>
                                            @if($app->marksheettwo)
                                                <a href="{{ $app->marksheettwo }}" target="_blank" class="btn btn-sm btn-secondary mt-2 mb-2">
                                                    View
                                                </a>
                                            @endif
                                            <br>
                                            @if($app->marksheetthree)
                                                <a href="{{ $app->marksheetthree }}" target="_blank" class="btn btn-sm btn-secondary mt-2 mb-2">
                                                    View
                                                </a>
                                            @endif
                                            <br>
                                            @if($app->marksheetfour)
                                                <a href="{{ $app->marksheetfour }}" target="_blank" class="btn btn-sm btn-secondary mt-2 mb-2">
                                                    View
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $app->document_type }}</td>
                                        <td>
                                            @if($app->link == 1)
                                                <span class="badge bg-success">Linked</span>
                                            @else
                                                <span class="badge bg-warning">Not Linked</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

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
