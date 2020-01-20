<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>پنل مخاطبین شما</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/fontawesome.css" rel="stylesheet">
    <link href="/css/fontiran.css" rel="stylesheet">
    <link href="/css/panel.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">

        <div class="py-5 text-center" dir="rtl">

            <i class="fa fa-address-book mb-3 text-primary" style="font-size: 8em;"></i>

            <h2>گروه‌ها و مخاطبین شما</h2>
            <p class="lead">
                در پنل کاربری می‌توانید گروه‌ها و مخاطبین خود را مدیریت کنید.
            </p>
        </div>

        <div class="mb-3 text-right">
            <a href="/logout"><button class="btn btn-danger btn-sm">خروج</button></a>
            <a href="/"><button class="btn btn-warning btn-sm">صفحه‌ی اصلی</button></a>
            <a href="/panel"><button class="btn btn-warning btn-sm">پیشخان</button></a>
        </div>

        <div class="row text-right">

            <div class="col-md-4 order-md-2 mb-4">
               

                <ul>

                    <li class="list-group-item lh-condensed">
                        <div>
                            <a href="{{ route('contacts.index') }}">
                                <h6 class="my-0">همه‌ی مخاطبین</h6>
                            </a>
                            <small class="text-muted">مشاهده‌ی همه‌ی مخاطبین ثبت شده</small>
                        </div>
                    </li>

                    <li class="list-group-item lh-condensed">
                        <div>
                            <a href="{{ route('contacts.create') }}">
                                <h6 class="my-0">افزودن مخاطب</h6>
                            </a>
                            <small class="text-muted">افزودن مخاطب جدید</small>
                        </div>
                    </li>

                    <li class="list-group-item lh-condensed">
                        <div>
                            <a href="{{ route('groups.index') }}">
                                <h6 class="my-0">همه‌ی گروه‌ها</h6>
                            </a>
                            <small class="text-muted">مشاهده‌ی همه‌ی گروه‌های ثبت شده</small>
                        </div>
                    </li>

                    <li class="list-group-item lh-condensed">
                        <div>
                            <a href="{{ route('groups.create') }}">
                                <h6 class="my-0">افزودن گروه</h6>
                            </a>
                            <small class="text-muted">افزودن گروه جدید</small>
                        </div>
                    </li>

                </ul>

            </div>
            <!-- End of Sidebar -->


            <div class="col-md-8 order-md-1 list-group-item rounded" dir="rtl">

                @yield('content')

            </div>

        </div>


        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">Phone Book App By Mohamed Hashemi</p>
        </footer>
    </div>

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>

</html>
