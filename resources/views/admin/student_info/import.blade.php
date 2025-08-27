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
                    <form action="{{ route('admin.student.info.import.post') }}" method="post" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="row g-3 align-items-end">
                            <div class="col-md-6">
                                <label for="import_data" class="form-label">Import student file (.xlsx)</label>
                                <input type="file" id="import_data" name="import_data" 
                                    class="form-control" 
                                    accept=".xlsx,.xls">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Import</button>
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
