@extends('layouts.panel')


@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">{{ $contact->fullname() }}</h5>
    <div>
        <a href="{{ route('contacts.index') }}">
            <button class="btn btn-warning btn-sm">بازگشت</button>
        </a>
    </div>
</div>

<hr>

<div class="my-3 bg-light p-3 rounded">
    <span class="text-muted">ایمیل: </span>
    <strong>{{ $contact->email ? $contact->email : 'وارد نشده' }}</strong>
</div>

<div class="my-3 bg-light p-3 rounded">
    <span class="text-muted">گروه: </span>
    <strong>{{ $contact->group ? $contact->group->name : 'وارد نشده' }}</strong>
</div>

<div class="my-3 bg-light p-3 rounded">
    <span class="text-muted">آدرس: </span>
    <strong>{{ $contact->address ? $contact->address : 'وارد نشده' }}</strong>
</div>

<div class="my-3 bg-light p-3 rounded">
    <span class="text-muted">یادداشت: </span>
    <strong>{{ $contact->describe ? $contact->describe : 'وارد نشده' }}</strong>
</div>

<div class="my-3">
    <a href="{{ route('phones.create', ['contact' => $contact->id]) }}">
        <button class="btn btn-success btn-sm">افزودن شماره تلفن</button>
    </a>
    <a href="{{ route('contacts.edit', ['id' => $contact->id]) }}">
        <button class="btn btn-primary btn-sm">ویرایش مخاطب</button>
    </a>
    <a href="{{ route('contacts.destroy', ['id' => $contact->id]) }}">
        <button class="btn btn-danger btn-sm">حذف مخاطب</button>
    </a>
</div>

<hr>

<h6 class="mb-3 mt-4">شماره‌های ثبت شده</h6>

<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th class="pr-4">عنوان</th>
            <th class="text-center">شماره تلفن</th>
            <th class="text-center">عملیات</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($contact->phones as $phone)

        <tr>
            <td class="pr-4">{{ $phone->title }}</td>
            <td class="text-center">{{ $phone->number }}</td>
            <td>
                <form action="{{ route('phones.destroy' , ['id'=>$phone->id]) }}" method="POST" class="text-center functions">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <a href="{{ route('phones.edit' , ['id'=>$phone->id]) }}" class="btn btn-sm btn-primary text-white">
                        ویرایش
                    </a>
                    <button type="submit" class="btn btn-sm btn-danger">
                        حذف
                    </button>
                </form>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endsection
