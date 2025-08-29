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
                                    <th>Application Request Id</th>
                                    <th>Application Number</th>
                                    <th>Mobile</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
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
