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
    <main class="pb-5">
        <section class="register-form">
            <div class="container">
                <h2 class="title"> <i class='bx bx-plus' ></i>  مرحبا بك، يرجى تسجيل الدخول الى حسابك</h2>
                @if(session()->has('warning'))
                    <span class="error"><i class='bx bx-error-circle mx-2'></i>{{session('warning')}}</span>
                @endif
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="input-box">
                                <i class='bx bx-id-card'></i>
                                <input type="text" name="id_number"  placeholder=" رقم الهوية">
                            </div>
                            <div class="input-box">
                                <i class='bx bx-lock-alt'></i>
                                <input type="text" name="password"  placeholder=" كلمة المرور ">
                            </div>
                            <div class="input-box d-flex justify-content-center">
                                 <button type="submit" class="btn btn-outline-primary register"> تسجيل الدخول</button>
                            </div>
                            <div class="input-box d-flex justify-content-start">
                                    @if($errors->any())
                                    <ul class="error-list">
                                        @foreach($errors->all() as $error)
                                        <li class="error"><i class='bx bx-error-circle mx-2'></i>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                    @endif

                                    @if(session()->has('error'))
                                    <span class="error"><i class='bx bx-error-circle mx-2'></i>{{session('error')}}</span>
                                    @endif

                                    @if(session()->has('success'))
                                    <span class="success">{{session('success')}}</span>
                                    @endif
                            </div>
                        </div>
                    </div>
                </form>
                <p class="login">
                    <span>  ليس لديك حساب قم ؟ <a href="{{ route('register') }}"> انشاء حساب جديد </a></span>
                </p>
            </div>
        </section>
    </main>
    <!--/main-content-->
@endsection

 <!-- Bootstrap JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>