@extends('admin.component.template')

@section('title', 'EcoTrip Wisata')

@section('page-style')
    <script src="https://cdn.tiny.cloud/1/5hsj31ihf6r2vn03lry4wvwjpjlk8t4hinqfxft0kebk9v14/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EcoWisata</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah EcoWisata</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('adminWisataEditMethod', $wisata->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $wisata->name }}" placeholder="Name ..." required>
                    @error('name')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Local Weekday Price</label>
                    <input type="number" class="form-control" name="local_weekday" value="{{ $wisata->local_price }}" placeholder="Local Weekday Price ..." required>
                    @error('local_weekday')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Local Weekend Price</label>
                    <input type="number" class="form-control" name="local_weekend" value="{{ $wisata->local_weekend_price }}" placeholder="Local Weekend Price ..." required>
                    @error('local_weekend')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foreign Weekday Price</label>
                    <input type="number" class="form-control" name="foreign_weekday" value="{{ $wisata->foreign_price }}" placeholder="Foreign Weekday Price ..." required>
                    @error('foreign_weekday')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Foreign Weekend Price</label>
                    <input type="number" class="form-control" name="foreign_weekend" value="{{ $wisata->foreign_weekend_price }}" placeholder="Foreign Weekend Price ..." required>
                    @error('foreign_weekend')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" value="{{ $wisata->location }}" placeholder="Location ..." required>
                    @error('location')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="10" placeholder="Description ...">{{ $wisata->description }}</textarea>
                    @error('description')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Activity <b>(Berikan tanda koma "," untuk setiap Activity yang ingin ditambahkan)</b></label>
                    <textarea name="activity" id="activity" class="form-control" rows="10" placeholder="Activity ...">{{ $wisata->activity }}</textarea>
                    @error('activity')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Includes <b>(Berikan tanda koma "," untuk setiap Includes yang ingin ditambahkan)</b></label>
                    <textarea name="includes" id="includes" class="form-control" rows="10" placeholder="Includes ...">{{ $wisata->includes }}</textarea>
                    @error('includes')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <img src="{{ asset('assets/user/images/wisata/'.$wisata->picture) }}" alt="EcoWisata" class="w-25 d-block mb-2">
                    <label class="form-label">Banner Picture <b>(File tidak perlu diisi jika foto tidak ingin diubah) (Hanya 1 file)</b></label>
                    <input type="file" class="form-control" name="picture" id="picture" accept=".png,.jpg,.jpeg">
                    @error('picture')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Add Additional Picture <b>(Isi bila ingin menambahkan foto) (Bisa pilih lebih dari 1 File)</b></label>
                    <input type="file" class="form-control" name="file[]" id="file" accept=".png,.jpg,.jpeg" multiple>
                    @error('file')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Manage Additional Picture</label>
                    <div class="row justify-content-center">
                        @foreach ($wisataImages as $image)
                            <div class="col-3 position-relative">
                                <img src="{{ asset('assets/user/images/wisata/'.$image->picture) }}" alt="EcoWisata" class="w-100" style="height: 150px; object-fit: cover; border: 1px solid #1f1f1f; border-radius: 1rem">
                                <div class="position-absolute" style="top:-.5rem; right:-.25rem">
                                    <a href="{{ route('adminWisataImageDeleteMethod', $image->id) }}" class="px-2 py-2 bg-danger text-white border-0"><i class="fas fa-fw fa-trash"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" id="submit" class="btn btn-primary float-right">Ubah</button>
                <a href="{{ route('adminWisata') }}" class="btn btn-info float-right mr-3">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
@endsection
