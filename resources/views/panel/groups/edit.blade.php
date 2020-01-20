@extends('layouts.panel')


@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">ویرایش گروه</h5>
    <div>
        <a href="{{ route('groups.index') }}">
            <button class="btn btn-warning btn-sm">بازگشت</button>
        </a>
    </div>
</div>

<hr>

<form class="needs-validation" novalidate method="POST" action="{{ route('groups.update', ['id' => $group->id]) }}">
    @method('PUT')
    @csrf

    <div class="my-3 form-group">
        <label for="name">نام</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $group->name }}"
            required>
        <div class="invalid-feedback">
            وارد کردن نام ضروری است.
        </div>
    </div>

    <hr>

    <button class="btn btn-primary btn-block text-center" type="submit">ویرایش</button>
</form>

@endsection
