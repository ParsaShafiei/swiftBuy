@extends('admin.layouts.master')
@section('title', 'blog')

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">لیست بلاگ ها</h5>
        <a href="{{ route('admin.content.blog.create') }}" class="btn btn-primary">
            ساخت بلاگ جدید
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان</th>
                <th>بدنه اصلی</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{!! substr($blog->body, 0, 20) !!}</td>
                    <td>
                        <div class="d-flex">
                            <div class="mx-2">
                                <form action="{{ route('admin.content.blog.destroy', $blog) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                                <a href="{{ route('admin.content.blog.edit', $blog) }}" class="btn btn-warning">آپدیت</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection
