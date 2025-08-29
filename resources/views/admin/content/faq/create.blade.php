@extends('admin.layouts.master')
@section('title', 'ساخت Faq')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="shadow-sm card rounded-3">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">ساخت faq</h5>
                            <a href="{{ route('admin.content.faq.index') }}" class="btn btn-warning">
                                بازگشت
                            </a>
                        </div>
                        <form method="POST" action="{{ route('admin.content.faq.store') }}">
                            @csrf
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">سوال</label>
                                <input type="text" class="form-control" id="question" name="question"
                                    value="{{ old('question') }}">
                                @error('question')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">پاسخ</label>
                                <input type="text" class="form-control" id="answare" name="answare"
                                    value="{{ old('answare') }}">
                                @error('answare')
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
