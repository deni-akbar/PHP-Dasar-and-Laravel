@extends('master')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-6">
                @if (Session::has('success'))
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div>
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @elseif (Session::has('failed'))
                    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div>
                            {{ Session::get('failed') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-xl-6 text-end">
                <a href="{{ route('employees.create') }}" class="btn btn-primary"> Create Employee </a>
                <a href="{{ route('employee.cetak_pdf') }}" class="btn btn-danger">Cetak pdf</a>
                <form action="{{ route('employee.import_employee') }}" method="post" enctype="multipart/form-data" class="mt-2">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="file" name="file" class="form-control" placeholder="file import employee" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-light">
                <thead>
                    <tr>
                        <th scope="col" width="10%">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col" width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td scope="row">{{ $employee->name ?? '-' }}</td>
                            <td>{{ $employee->email ?? '-' }}</td>
                            <td>{{ $employee->company->name ?? '-' }}</td>
                            <td>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="5">
                                <p class="text-danger text-center">No employee found!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $employees->links() !!}
        </div>
    </div>
@endsection
