@extends('admin.layouts.master')
@section('title', 'دسته بندی محصولات')

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">لیست دسته بندی ها</h5>
        <a href="{{ route('admin.market.product-category.create') }}" class="btn btn-primary">
            ساخت دسته بندی
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>نام</th>
                <th>اسلاگ</th>
                <th>وضعیت</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productCategories as $productCategory)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $productCategory->name }}</td>
                    <td>{{ $productCategory->slug }}</td>
                    <td>
                        @if ($productCategory->status == 1)
                            <span class="text-success">فعال</span>
                        @else
                            <span class="text-danger">غیر فعال</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            <div class="mx-2">
                                <form action="{{ route('admin.market.product-category.destroy', $productCategory) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                                <a href="{{ route('admin.market.product-category.edit', $productCategory) }}"
                                    class="btn btn-warning">آپدیت</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $productCategories->links() }}

@endsection
