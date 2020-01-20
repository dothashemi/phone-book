@extends('layouts.app')


@section('content')

<main role="main" class="inner cover">
    <h1 class="cover-heading my-4">همیشه و همه‌جا، در دسترس شما</h1>
    <p class="lead" dir="rtl">
        شما می‌توانید با ثبت نام و ورود به پنل کاربری، اطلاعات شماره تماس‌های خود را ثبت نمایید.
مناسب برای افرادی است که می‌خواهند به شماره تماس‌های مورد نظرشان، در هر کجا، به سرعت و سهولت دسترسی داشته باشند.
    </p>
    <p class="lead my-4">
        @if(auth()->check())
        <a href="/panel" class="btn btn-lg btn-secondary">پنل کاربری</a>
        @else
        <a href="/register" class="btn btn-lg btn-secondary">ثبت‌نام</a>
        @endif
    </p>
</main>

@endsection
