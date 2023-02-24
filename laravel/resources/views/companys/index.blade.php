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
                <a href="{{ route('companies.create') }}" class="btn btn-primary"> Create Company </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-light">
                <thead>
                    <tr>
                        <th scope="col" width="10%">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Website</th>
                        <th scope="col" width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companys as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td scope="row">{{ $company->name ?? '-' }}</td>
                            <td>{{ $company->email ?? '-' }}</td>
                            <td>{{ $company->logo ?? '-' }}</td>
                            <td>{{ $company->website ?? '-' }}</td>
                            <td>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="6">
                                <p class="text-danger text-center">No company found!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $companys->links() !!}
        </div>
    </div>
@endsection
