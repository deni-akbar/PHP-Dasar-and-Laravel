@extends('master')
@section('content')
    @php
        $view = $isView ?? false;
        $edit = $isEdit ?? false;
    @endphp

    <div class="container my-5">
        <div class="row">
            <div class="col-xl-6 col-12 m-auto">
                <form action="{{ $edit ? route('companies.update', $company->id) : route('companies.store') }}" method="POST" enctype="multipart/form-data"
                    class="w-100">
                    @csrf
                    @if ($edit)
                        @method('PUT')
                    @endif
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="card-title"> {{ $view ? 'View' : ($edit ? 'Update' : 'Create') }} Post</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group my-2">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" @if ($view) disabled @endif
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    value="{{ old('name') ?? ($company->name ?? '') }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="form-group my-2">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" @if ($view) disabled @endif
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    value="{{ old('email') ?? ($company->email ?? '') }}">   
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group my-2">
                                    <label for="logo" class="form-label">Logo <span class="text-danger">*</span></label>
                                    <input type="file" name="logo" @if ($view) disabled @endif
                                        class="form-control @error('logo') is-invalid @enderror" id="logo" >
                                        @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-group my-2">
                                    <label for="website" class="form-label">Website <span class="text-danger">*</span></label>
                                    <input type="text" name="website" @if ($view) disabled @endif
                                        class="form-control @error('website') is-invalid @enderror" id="website" 
                                        value="{{ old('website') ?? ($company->website ?? '') }}">
                                        @error('website')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back</a>

                            @if (!$view)
                                <button type="submit" class="btn btn-primary">Save</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
