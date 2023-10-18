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
        <section class="details-info">
            <div class="container">
                <div class="title"> {{ $realEstate->title }}</div>
                <div class="image-box">
                    <img src="{{ asset($realEstate->image) }}" alt="{{ $realEstate->title }}">
                </div>
                <div class="description"> {{ $realEstate->description }} </div>
                <h2 class="mt-3">تفاصيل العقار </h2>
                <div class="details">
                    <ul>
                        <li class="mx-4"><p><span>تاريخ النشر :</span> {{ $realEstate->created_at->format('Y-m-d') }} .</p></li>
                        <li class="mx-4"><p><span> نوع العقار :</span> {{ $realEstate->realEstateType->title }} .</p></li>
                        <li class="mx-4"><p><span> نوع العرض :</span> {{ $realEstate->realEstateAdType->title }} .</p></li>
                        <li class="mx-4"><p><span> السعر التقريبي:</span> {{ $realEstate->price }} {{ $realEstate->realEstateCurrency->title }} .</p></li>
                        <li class="mx-4"><p><span> المساحة :</span> {{ $realEstate->space }} متر مربع .</p></li>
                        <li class="mx-4"><p><span> المنطقة  :</span> {{ $realEstate->place }} .</p></li>
                    </ul>
                </div>

                <h2 class="mt-3">تفاصيل المالك </h2>
                <div class="details">
                    <ul>
                        <li class="mx-4"><p><span>  الاسم :</span> {{ $realEstate->realEstateUser->name }} .</p></li>
                        <li class="mx-4"><p><span>  رقم الهاتف:</span> {{ $realEstate->realEstateUser->phone }}  .</p></li>
                    </ul>
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
