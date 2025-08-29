@extends('admin.layouts.master')
@section('title', 'ساخت بلاگ جدید')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="shadow-sm card rounded-3">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">ساخت بلاگ</h5>
                            <a href="{{ route('admin.content.blog.index') }}" class="btn btn-warning">
                                بازگشت
                            </a>
                        </div>
                        <form method="POST" action="{{ route('admin.content.blog.store') }}">
                            @csrf
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">عنوان</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">body</label>
                                <textarea class="form-control" id="body" name="body" placeholder="body ..." rows="5" required autofocus>{{ old('body') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>



@endsection
@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
    <script>
        $(document).ready(function() {
            $("#published_at_view").persianDatepicker({
                format: "YYYY/MM/DD",
                altField: '#published_at'
            });
        })
    </script>
@endsection
