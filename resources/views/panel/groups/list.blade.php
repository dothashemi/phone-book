@extends('layouts.panel')

@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">مخاطبین</h5>
    <div>
        <a href="{{ route('contacts.create') }}">
            <button class="btn btn-primary btn-sm">افزودن مخاطب</button>
        </a>
        <button class="btn btn-primary btn-sm">افزودن تلفن</button>
    </div>
</div>

<hr>

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

<div class="foot-content-box">
    {!! $contacts->render() !!}
</div>

@endsection
