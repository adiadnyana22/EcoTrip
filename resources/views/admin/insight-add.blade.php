@extends('admin.component.template')

@section('title', 'EcoTrip Insight')

@section('page-style')
    <script src="https://cdn.tiny.cloud/1/5hsj31ihf6r2vn03lry4wvwjpjlk8t4hinqfxft0kebk9v14/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EcoInsight</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah EcoInsight</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('adminInsightAddMethod') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title ..." required>
                    @error('title')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="insight_content" id="insight_content" class="form-control" rows="10" placeholder="Content ...">{{ old('insight_content') }}</textarea>
                    @error('insight_content')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Picture</label>
                    <input type="file" class="form-control" name="picture" id="picture" accept=".png,.jpg,.jpeg" required>
                    @error('picture')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit" id="submit" class="btn btn-primary float-right">Tambah</button>
                <a href="{{ route('adminInsight') }}" class="btn btn-info float-right mr-3">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        tinymce.init({
            selector: '#insight_content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endsection
