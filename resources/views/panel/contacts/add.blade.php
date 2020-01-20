@extends('layouts.panel')


@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">افزودن مخاطب</h5>
    <div>
        <a href="{{ route('contacts.index') }}">
            <button class="btn btn-warning btn-sm">بازگشت</button>
        </a>
    </div>
</div>

<hr>

<form class="needs-validation" novalidate method="POST" action="{{ route('contacts.store') }}">
    @csrf

    <div class="row">
        <div class="col-md-6 form-group">
            <label for="first_name">نام</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}"
                required>
            <div class="invalid-feedback">
                وارد کردن نام ضروری است.
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="last_name">نام خانوادگی</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}"
                required>
            <div class="invalid-feedback">
                وارد کردن نام خانوادگی ضروری است.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="form-group">
                <label for="email">ایمیل<span class="text-muted"> اختیاری</span></label>
                <input type="email" class="form-control text-left" id="email" name="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                    لطفا ایمیل معتبری وارد کنید.
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="group">گروه<span class="text-muted"> اختیاری</span></label>
                <select class="form-control" id="group" name="group">
                    <option value="">انتخاب نشده</option>
                    @isset($groups)
                        @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="address">آدرس<span class="text-muted"> اختیاری</span></label>
        <input type="text" class="form-control" id="address" name="address" placeholder="شهر، خیابان، پلاک، ...">
    </div>

    <div class="form-group">
        <label for="describe">یادداشت<span class="text-muted"> اختیاری</span></label>
        <textarea class="form-control" id="describe" name="describe"></textarea>
    </div>

    <hr>

    <button class="btn btn-primary btn-block text-center" type="submit">افزودن</button>
</form>

@endsection
