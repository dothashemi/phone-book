@extends('layouts.panel')


@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">افزودن مخاطب</h5>
    <div>
        <a href="{{ route('groups.index') }}">
            <button class="btn btn-warning btn-sm">بازگشت</button>
        </a>
    </div>
</div>

<hr>

<form class="needs-validation" novalidate method="POST" action="{{ route('groups.store') }}">
    @csrf

    <div class="col-md-6 mb-3">
        <label for="firstName">نام</label>
        <input type="text" class="form-control" id="name" required>
        <div class="invalid-feedback">
            وارد کردن نام ضروری است.
        </div>
    </div>

    <hr>

    <button class="btn btn-primary btn-lg btn-block text-center" type="submit">افزودن</button>
</form>

@endsection
