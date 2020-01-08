@extends('layouts.panel')


@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">ویرایش مخاطب</h5>
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
        <div class="col-md-6 mb-3">
            <label for="firstName">نام</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
                وارد کردن نام ضروری است.
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="lastName">نام خانوادگی</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
                وارد کردن نام خانوادگی ضروری است.
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="email">ایمیل<span class="text-muted"> اختیاری</span></label>
        <input type="email" class="form-control text-left" id="email" placeholder="you@example.com">
        <div class="invalid-feedback">
            لطفا ایمیل معتبری وارد کنید.
        </div>
    </div>

    <div class="mb-3">
        <label for="address">آدرس</label>
        <input type="text" class="form-control" id="address" placeholder="شهر، خیابان، پلاک، ..." required>
        <div class="invalid-feedback">
            لطفا آدرس را وارد کنید.
        </div>
    </div>

    <hr>

    <button class="btn btn-primary btn-lg btn-block text-center" type="submit">افزودن</button>
</form>


<hr>

@if($contact->phones() != null) 
<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th class="pr-4">نام</th>
            <th class="text-center">گروه</th>
            <th class="text-center">تلفن</th>
            <th class="text-center">عملیات</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($contacts as $contact)

        <tr>
            <td class="pr-4"><a href="{{ $contact->path() }}" target="blank">{{ $contact->title }}</a></td>
            <td class="text-center">{{ $contact->view_count }}</td>
            <td class="text-center">{{ $contact->comment_count }}</td>
            <td>
                <form action="{{ route('contacts.destroy' , ['id'=>$contact->id]) }}" method="POST" class="text-center">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="btn-group">
                        <a href="{{ route('contacts.edit' , ['id'=>$contact->id]) }}" class="btn btn-primary">
                            ویرایش
                        </a>
                        <button type="submit" class="btn btn-danger">
                            حذف
                        </button>
                        <a href="{{ $contact->path() }}" class="btn btn-success" target="blank">
                            مشاهده
                        </a>
                    </div>
                </form>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
@endif

@endsection
