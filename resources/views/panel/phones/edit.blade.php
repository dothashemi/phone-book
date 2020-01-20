@extends('layouts.panel')


@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">ویرایش شماره تلفن</h5>
    <div>
        <a href="{{ route('contacts.show', ['id' => $contact->id]) }}">
            <button class="btn btn-warning btn-sm">بازگشت</button>
        </a>
    </div>
</div>

<hr>

<form class="needs-validation" novalidate method="POST" action="{{ route('phones.update', ['id' => $phone->id]) }}">
    @method('PUT')
    @csrf

    <div class="my-3 mb-4 bg-light p-3 rounded">
        <span class="text-muted">ویرایش شماره تلفن </span>
        <strong>{{ $contact->fullname() }}</strong>
    </div>

    <input type="hidden" name="contact" value="{{ $contact->id }}">

    <div class="row">
        <div class="col-md-6 form-group">
            <label for="title">عنوان</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $phone->title }}"
                required>
            <div class="invalid-feedback">
                وارد کردن عنوان ضروری است.
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="number">شماره تلفن</label>
            <input type="text" class="form-control text-left" id="number" name="number" value="{{ $phone->number }}"
                required>
            <div class="invalid-feedback">
                وارد کردن شماره تلفن ضروری است.
            </div>
        </div>
    </div>

    <hr>

    <button class="btn btn-primary btn-block text-center" type="submit">ویرایش</button>
</form>

@endsection
