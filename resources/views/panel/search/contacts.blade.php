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
            <th class="text-center">عملیات</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($contacts as $contact)

        <tr>
            <td class="pr-4"><a href="{{ route('contacts.show', ['id'=> $contact->id])}}" target="blank">{{ $contact->fullname() }}</a></td>
            <td class="functions">
                <a href="{{ route('contacts.show', ['id'=> $contact->id])}}" class="btn btn-sm btn-success text-white">
                    مشاهده
                </a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

<div class="foot-content-box">
    {!! $contacts->render() !!}
</div>

@endsection
