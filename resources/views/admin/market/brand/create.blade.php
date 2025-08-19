@extends('admin.layouts.master')
@section('title', 'برند محصولات')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="shadow-sm card rounded-3">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">ساخت برند</h5>
                            <a href="{{ route('admin.market.brand.index') }}" class="btn btn-warning">
                                بازگشت
                            </a>
                        </div>
                        <form method="POST" action="{{ route('admin.market.brand.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">نام</label>
                                <input type="text" class="form-control" id="persian_name" name="persian_name"
                                    value="{{ old('persian_name') }}">
                                @error('persian_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">نام انگلیسی</label>
                                <input type="text" class="form-control" id="english_name" name="english_name"
                                    value="{{ old('english_name') }}">
                                @error('english_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">لوگو</label>
                                <input class="form-control " type="file" id="logo" name="logo">
                                @error('logo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
