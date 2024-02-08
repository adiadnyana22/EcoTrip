@extends('admin.component.template')

@section('title', 'EcoTrip About')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">About</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit About</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('adminAboutEditMethod') }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">About</label>
                    <textarea name="about" id="about" class="form-control" rows="10" placeholder="About ..." required>{{ $about->value }}</textarea>
                    @error('about')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit" id="submit" class="btn btn-primary float-right">Edit</button>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
