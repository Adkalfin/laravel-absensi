@extends('layouts.app')

@section('title', 'Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>
                <div class="section-header-button">
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Employee</a></div>
                    <div class="breadcrumb-item">All Employee</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Employee</h2>
                <p class="section-lead">
                    You can manage all Users, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('employees.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Name</th>
                                            <th>Birthplace</th>
                                            <th>Birthdate</th>
                                            {{-- <th>Position</th> --}}
                                            <th>Jabatan</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($employees as $employee)
                                            <tr>
                                             <td>{{ $employee->users->name }}</td>

                                            <td>{{ $employee->birthplace }}</td>
                                            <td>{{ $employee->birthdate }}</td>
                                            <td>{{ $employee->positions }}</td>
                                            <td>{{ $employee->jabatans }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                                    <a href='{{ route('employees.edit', $employee->id) }}' class="btn btn-sm btn-info btn-icon">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="ml-2">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                            <i class="fas fa-times"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $employees->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
