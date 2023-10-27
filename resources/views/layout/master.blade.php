<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>يطا عقار ماب</title>
</head>
<body>
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"><i class='bx bx-home-smile'></i>يطا عقار ماب</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home*') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('all-real-estates*') ? 'active' : '' }}" href="{{ route('all-real-estates') }}">العقارات</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link {{ request()->is('contact*') ? 'active' : '' }}" href="{{ route('contact') }}">الاتصال بنا</a>
                    </li>
                    @auth
                    <li class="nav-item  d-flex">
                        <span class="px-2 nav-link user-name"> {{auth()->user()->name}} </span>
                        <a href="{{ route('profile') }}" class="nav-link logout-icon" type="button"><i class='bx bxs-user-circle'></i>
                            <span class="tooltip"> الملف الشخصي</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link logout-icon" type="button"><i class='bx bx-log-out'></i>
                            <span class="tooltip">تسجيل الخروج</span>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" type="button"  class="btn btn-primary login mx-2">تسجيل الدخول</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" type="button" class="btn btn-outline-primary register">انشاء حساب</a>
                    </li>
                    @endauth
                </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')

    <footer>
        <p>
            جميع الحقوق محفوظة  &#169; يطا عقار ماب
        </p>
    </footer>

</body>
</html>