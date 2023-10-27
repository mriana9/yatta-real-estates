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
    <main class="pt-0 user-profile">
        <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
            <div class="row">
                <div class="col-lg-4 col-md-6-col-sm-12">
                    <div class="user-info">
                        <h2 class="title">  <i class="bx bx-user"></i>المعلومات الشخصية</h2>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="user-info-box">
                            <label for="name">الاسم</label>
                            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
                            <button class="btn-outline-primary btn register " type="submit">تعديل</button>
                        </div>
                        <div class="user-info-box">
                            <label for="phone">الهاتف</label>
                            <input type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" required>
                            <button class="btn-outline-primary btn register " type="submit">تعديل</button>
                        </div>
                        <div class="user-info-box">
                            <label for="id_number">رقم الهوية</label>
                            <input type="text" id="id_number" name="id_number" value="{{ auth()->user()->id_number }}" required>
                            <button class="btn-outline-primary btn register " type="submit">تعديل</button>
                        </div>
                        <div class="user-info-box">
                            <label for="email">الايميل</label>
                            <input type="text" id="email" name="email" value="{{ auth()->user()->email }}" required>
                            <button class="btn-outline-primary btn register " type="submit">تعديل</button>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        <!-- Form fields -->
                    </form>

                    </div>
                </div>
                <div class="col-lg-8 col-md-6-col-sm-12">
                    <div class="user-cards">
                        <div class="carda-header d-flex justify-content-between">
                            <h2 class="title"> <i class='bx bxs-buildings'></i>اعلانات العقارات الخاصة بك</h2>
                            <a href="{{ route('add-real-estates') }}" class="btn-outline-primary btn register ">  <i class="bx bx-right-arrow-alt"></i> أعلن عن عقار</a> 
                        </div>
                        @if ($realEstates->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">العنوان</th>
                                    <th scope="col">الوصف</th>
                                    <th scope="col">المنطقة</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">المساحة</th>
                                    <th scope="col">نوع العقار</th>
                                    <th scope="col">نوع العرض</th>
                                    <th scope="col">تاريح النشر</th>
                                    <th scope="col">الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($realEstates as $realEstate)
                                    <tr class="real-estate-card">
                                        <td>{{ $realEstate->title }}</td>
                                        <td>{{ $realEstate->description }}</td>
                                        <td>{{ $realEstate->place }}</td>
                                        <td>{{ $realEstate->price }}</td>
                                        <td>{{ $realEstate->space }}</td>
                                        <td>{{ $realEstate->realEstateType->title }}</td>
                                        <td>{{ $realEstate->realEstateAdType->title }}</td>
                                        <td>{{ $realEstate->created_at->format('Y-m-d') }}</td>
                                        <td class="d-flex justify-content-between align-items-center">
                                        <form method="POST" action="{{ route('real-estates.destroy', ['id' => $realEstate->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                            <a href="{{ route('real-estates.edit', ['id' => $realEstate->id]) }}" class="btn btn-primary mx-2">تعديل</a>
                                            <a href="{{ route('real-estate.details', ['id' => $realEstate->id]) }}" class="btn btn-warning">التفاصيل</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p>ليس لديك أي عقارات حالياً.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--/main-content-->
@endsection


 <!-- Bootstrap JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
 <script>
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 2000);
</script>
</body>
</html>