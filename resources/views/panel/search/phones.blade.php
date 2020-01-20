@extends('layouts.panel')

@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">جست‌وجو</h5>
    <div>
        <a href="{{ route('contacts.index') }}">
            <button class="btn btn-warning btn-sm">بازگشت</button>
        </a>
    </div>
</div>

<hr>

<div class="my-3 bg-light p-3 rounded">
    <span class="text-muted">نتیجه‌ی جست‌وجوی</span>
    <strong>{{ $word }}</strong>
</div>

<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th class="pr-4">نام</th>
            <th class="text-center">شماره تلفن</th>
            <th class="text-center">عنوان</th>
            <th class="text-center">عملیات</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($phones as $phone)

        <tr>
            <td class="pr-4"><a href="{{ route('contacts.show', ['id'=> $phone->contact_id])}}" target="blank">{{ $phone->contact->fullname() }}</a></td>
            <td class="text-center">{{ $phone->number }}</td>
            <td class="text-center">{{ $phone->title }}</td>
            <td class="text-center functions">
                <a href="{{ route('contacts.show', ['id'=> $phone->contact_id])}}" class="btn btn-sm btn-success text-white">
                    مشاهده
                </a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

<div class="foot-content-box">
    {!! $phones->render() !!}
</div>

@endsection
