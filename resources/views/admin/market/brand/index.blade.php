@extends('admin.layouts.master')
@section('title', 'برند ها')

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">لیست برند ها</h5>
        <a href="{{ route('admin.market.brand.create') }}" class="btn btn-primary">
            ساخت برند
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>نام</th>
                <th>نام انگلیسی </th>
                <th>اسلاگ</th>
                <th>لوگو</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $brand->persian_name }}</td>
                    <td>{{ $brand->english_name }}</td>
                    <td>{{ $brand->slug }}</td>
                    <td>
                        <img src="{{ asset($brand->logo) }}" alt="" class="img-fluid" width="70" height="70">
                    </td>
                    <td>
                        <div class="d-flex">
                            <div class="mx-2">
                                <form action="{{ route('admin.market.brand.destroy', $brand) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                                <a href="{{ route('admin.market.brand.edit', $brand) }}" class="btn btn-warning">آپدیت</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $brands->links() }}

@endsection
