@extends('layouts.panel')


@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">افزودن شماره تلفن</h5>
    <div>
        <a href="{{ route('contacts.show', ['id' => $contact->id]) }}">
            <button class="btn btn-warning btn-sm">بازگشت</button>
        </a>
    </div>
</div>

<hr>

<form class="needs-validation" novalidate method="POST" action="{{ route('phones.store') }}">
    @csrf

    <div class="my-3 mb-4 bg-light p-3 rounded">
        <span class="text-muted">افزودن شماره تلفن به </span>
        <strong>{{ $contact->fullname() }}</strong>
    </div>

    <input type="hidden" name="contact" value="{{ $contact->id }}">

    <div class="row">
        <div class="col-md-6 form-group">
            <label for="title">عنوان</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                required>
            <div class="invalid-feedback">
                وارد کردن عنوان ضروری است.
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="number">شماره تلفن</label>
            <input type="text" class="form-control text-left" id="number" name="number" value="{{ old('number') }}"
                required>
            <div class="invalid-feedback">
                وارد کردن شماره تلفن ضروری است.
            </div>
        </div>
    </div>

    <hr>

    <button class="btn btn-primary btn-block text-center" type="submit">افزودن</button>
</form>

@endsection
