@extends('admin.component.template')

@section('title', 'EcoTrip Carousel')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Carousel</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Carousel</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('adminCarouselEditMethod', $carousel->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="Link ..." required value="{{ $carousel->link }}">
                    @error('link')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit" id="submit" class="btn btn-primary float-right">Edit</button>
                <a href="{{ route('adminCarousel') }}" class="btn btn-info float-right mr-3">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
