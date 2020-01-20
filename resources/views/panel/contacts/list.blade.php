@extends('layouts.panel')

@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">مخاطبین</h5>
    <div>
        <a href="{{ route('contacts.create') }}">
            <button class="btn btn-primary btn-sm">افزودن مخاطب</button>
        </a>
    </div>
</div>

<hr>

<div class="my-3 bg-light p-3 rounded">
    <h6 class="text-center">جست‌وجو</h6>
    <hr>
    <form action="{{ route('search.contacts') }}" method="GET" class="mt-3">
        @csrf
        <div class="row">
            <div class="col-3">
                <span class="text-muted">بر اساس نام: </span>
            </div>
            <div class="col-7">
                <input type="text" class="form-control form-control-sm" id="word" name="word" value="{{ old('word') }}" placeholder="نام یا نام خانوادگی مخاطب را اینجا وارد کنید">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-sm btn-block btn-warning text-center">بگرد</button>
            </div>
        </div>
    </form>

    <form action="{{ route('search.phones') }}" method="GET" class="mt-3">
        @csrf
        <div class="row">
            <div class="col-3">
                <span class="text-muted">بر اساس شماره: </span>
            </div>
            <div class="col-7">
                <input type="text" class="form-control form-control-sm" id="word" name="word" value="{{ old('word') }}" placeholder="شماره‌ی مخاطب را اینجا وارد کنید">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-sm btn-block btn-warning text-center">بگرد</button>
            </div>
        </div>
    </form>
</div>

<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th class="pr-4">نام</th>
            <th class="text-center">گروه</th>
            <th class="text-center">عملیات</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($contacts as $contact)

        <tr>
            <td class="pr-4"><a href="{{ route('contacts.show', ['id'=> $contact->id])}}">{{ $contact->fullname() }}</a></td>
            <td class="text-center">{{ $contact->group ? $contact->group->name : '' }}</td>
            <td>
                <form action="{{ route('contacts.destroy' , ['id'=>$contact->id]) }}" method="POST" class="text-center functions">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <a href="{{ route('contacts.edit' , ['id'=>$contact->id]) }}" class="btn btn-sm btn-primary text-white">
                        ویرایش
                    </a>
                    <button type="submit" class="btn btn-sm btn-danger">
                        حذف
                    </button>
                    <a href="{{ route('phones.create', ['contact'=> $contact->id])}}" class="btn btn-sm btn-success text-white">
                        افزودن شماره
                    </a>
                </form>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

<div class="foot-content-box">
    {!! $contacts->render() !!}
</div>

@endsection
