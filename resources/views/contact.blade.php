<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>يطا عقار ماب</title>
    <!--css link-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Boxicon cdn-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

@extends('layout.master')

@section('content')
    <!--main-content-->
    <main>
        <section class="contact-us">
            <div class="container d-flex justify-content-center">
                <div class="contact-form">
                    <div class="title">تواصل معنا</div>

                    <div class="description">يسعدنا تواصلكم معنا, للاجابة على جميع استفساراتكم</div>

                    <form method="POST" action="{{ route('contact.post') }}">
                        @csrf 
                        <div class="input-box">
                            <label>الاسم</label>
                            <input type="text" name="user_name" placeholder="ادخل الاسم" value="{{ auth()->check() ? auth()->user()->name : '' }}">
                        </div>

                        <div class="input-box">
                            <label>رقم الهاتف</label>
                            <input type="text" name="user_phone" placeholder="ادخل رقم الهاتف" value="{{ auth()->check() ? auth()->user()->phone : '' }}">
                        </div>
                        <div class="input-box">
                            <label>عنوان الرسالة</label>
                            <input type="text" name="title" placeholder="ادخل الرسالة">
                        </div>
                        <div class="input-box">
                            <label>وصف الرسالة</label>
                            <textarea type="text" name="description" placeholder="ادخل الرسالة"></textarea>
                        </div>

                        @if($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        <span class="error"><i class='bx bx-error-circle mx-2'></i>{{ $error }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <button type="submit" class="btn btn-primary w-100 my-3">ارسال</button>

                    </form>
                </div>
            </div>
        </section>
    </main>
    <!--/main-content-->
@endsection


 <!-- Bootstrap JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>