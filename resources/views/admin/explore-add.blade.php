@extends('admin.component.template')

@section('title', 'EcoTrip Explore')

@section('page-style')
    <script src="https://cdn.tiny.cloud/1/5hsj31ihf6r2vn03lry4wvwjpjlk8t4hinqfxft0kebk9v14/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EcoExplore</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah EcoExplore</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('adminExploreAddMethod') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name ..." required>
                    @error('name')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="0" {{ (old('type') && (old('type') == 0)) ? 'selected' : '' }}>Private Trip</option>
                        <option value="1" {{ (old('type') && (old('type') == 1)) ? 'selected' : '' }}>Open Trip</option>
                    </select>
                    @error('type')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Local Weekday Price</label>
                    <input type="number" class="form-control" name="local_weekday" value="{{ old('local_weekday') }}" placeholder="Local Weekday Price ..." required>
                    @error('local_weekday')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Local Weekend Price</label>
                    <input type="number" class="form-control" name="local_weekend" value="{{ old('local_weekend') }}" placeholder="Local Weekend Price ..." required>
                    @error('local_weekend')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foreign Weekday Price</label>
                    <input type="number" class="form-control" name="foreign_weekday" value="{{ old('foreign_weekday') }}" placeholder="Foreign Weekday Price ..." required>
                    @error('foreign_weekday')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foreign Weekend Price</label>
                    <input type="number" class="form-control" name="foreign_weekend" value="{{ old('foreign_weekend') }}" placeholder="Foreign Weekend Price ..." required>
                    @error('foreign_weekend')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="Location ..." required>
                    @error('location')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="10" placeholder="Description ...">{{ old('description') }}</textarea>
                    @error('description')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Activity <b>(Berikan tanda koma "," untuk setiap Activity yang ingin ditambahkan)</b></label>
                    <textarea name="activity" id="activity" class="form-control" rows="10" placeholder="Activity ...">{{ old('activity') }}</textarea>
                    @error('activity')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Includes <b>(Berikan tanda koma "," untuk setiap Includes yang ingin ditambahkan)</b></label>
                    <textarea name="includes" id="includes" class="form-control" rows="10" placeholder="Includes ...">{{ old('includes') }}</textarea>
                    @error('includes')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Itinerary <b>(Berikan tanda koma "," untuk setiap Itinerary yang ingin ditambahkan)</b></label>
                    <textarea name="itinerary" id="itinerary" class="form-control" rows="10" placeholder="Itinerary ...">{{ old('itinerary') }}</textarea>
                    @error('itinerary')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Banner Picture <b>(Hanya 1 file)</b></label>
                    <input type="file" class="form-control" name="picture" id="picture" accept=".png,.jpg,.jpeg" required>
                    @error('picture')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Additional Picture <b>(Bisa pilih lebih dari 1 File)</b></label>
                    <input type="file" class="form-control" name="file[]" id="file" accept=".png,.jpg,.jpeg" multiple>
                    @error('file')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit" id="submit" class="btn btn-primary float-right">Tambah</button>
                <a href="{{ route('adminExplore') }}" class="btn btn-info float-right mr-3">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
