@extends('master')

@section('content')
    @php
        $view = $isView ?? false;
        $edit = $isEdit ?? false;
    @endphp

    <div class="container my-5">
        <div class="row">
            <div class="col-xl-6 col-12 m-auto">
                <form action="{{ $edit ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST"
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
                                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="name" @if ($view) disabled @endif
                                    class="form-control @error('name') is-invalid @enderror" id="name" required
                                    value="{{ old('name') ?? ($employee->name ?? '') }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            
                            <div class="form-group my-2">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" @if ($view) disabled @endif
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    value="{{ old('email') ?? ($employee->email ?? '') }}">   
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group my-2">
                                    <label for="company_id" class="form-label">Company <span class="text-danger">*</span></label>
                                    <select name="company_id" @if ($view) disabled @endif
                                        class="form-control @error('company_id') is-invalid @enderror" id="company_id">   
                                    </select>
                                        @error('company_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>

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

@section('js')
<script>
    $( document ).ready(function() {
        $('#company_id').select2({
  placeholder: 'Select an item',
  ajax: {
    url: "{{route('company.find')}}",
    dataType: 'json',
    delay: 250,
    processResults: function (data) {
      return {
        results:  data
      };
    },
    cache: true
  }
});
});
</script>

@endsection
