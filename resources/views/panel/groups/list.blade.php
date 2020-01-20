@extends('layouts.panel')

@section('content')

<div class="d-flex align-items-center justify-content-between head-content-box">
    <h5 class="m-0">گروه‌ها</h5>
    <div>
        <a href="{{ route('groups.create') }}">
            <button class="btn btn-primary btn-sm">افزودن گروه</button>
        </a>
    </div>
</div>

<hr>

<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th class="pr-4">نام</th>
            <th class="text-center">عملیات</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($groups as $group)

        <tr>
            <td class="pr-4">{{ $group->name }}</td>
            <td>
                <form action="{{ route('groups.destroy' , ['id'=>$group->id]) }}" method="POST" class="text-center functions">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <a href="{{ route('groups.edit' , ['id'=>$group->id]) }}" class="btn btn-sm btn-primary text-white">
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

<div class="foot-content-box">
    {!! $groups->render() !!}
</div>

@endsection
