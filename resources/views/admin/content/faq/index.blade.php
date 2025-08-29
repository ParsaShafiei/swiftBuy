@extends('admin.layouts.master')
@section('title', 'faq')

@section('content')
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">سوالات متداول</h5>
        <a href="{{ route('admin.content.faq.create') }}" class="btn btn-primary">
            ساخت faq جدید
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>سوال</th>
                <th>پاسخ</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{!! substr($faq->question, 0, 100) !!}</td>
                    <td>{!! substr($faq->answare, 0, 100) !!}</td>
                    <td>
                        <div class="d-flex">
                            <div class="mx-2">
                                <form action="{{ route('admin.content.faq.destroy', $faq) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                                <a href="{{ route('admin.content.faq.edit', $faq) }}" class="btn btn-warning">آپدیت</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection
