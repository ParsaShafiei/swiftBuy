@extends('admin.layouts.master')
@section('title', 'ساخت دسته بندی جدید')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="shadow-sm card rounded-3">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">آپدیت دسته بندی</h5>
                            <a href="{{ route('admin.market.product-category.index') }}" class="btn btn-warning">
                                بازگشت
                            </a>
                        </div>
                        <form method="POST" action="{{ route('admin.market.product-category.update', $productCategory) }}">
                            @csrf
                            @method('put')
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">نام</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $productCategory->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">وضعیت</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" @if (old('status', $productCategory->status) == 1) selected @endif>فعال</option>
                                    <option value="0" @if (old('status', $productCategory->status) == 0) selected @endif>غیر فعال
                                    </option>
                                </select>
                                @error('status')
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
