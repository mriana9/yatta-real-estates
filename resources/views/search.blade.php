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
        <!--main-content-->
        <div class="search-result w-100">
            <div class="container">
            <div class="section-title"> نتائج البحث</div>

                <div class="row">
                    @isset($results)
                    @if ($results->isEmpty())
                        <p>لا يوجد نتائج بحث.</p>
                    @else
                    @foreach($results as $item)
                        <div class="col-lg-4 col-md-2 col-sm-12">
                            <div class="card-box">
                                        <div class="image-box">
                                            <img src="{{ $item->image }}" alt="{{ $item->title }}">
                                        </div>
                                        <div class="box-description">
                                            <h3 class="service-title">{{ $item->title }}</h3>
                                            <p class="place">{{ Str::limit($item->description, 50) }}</p>

                                            <div class="see-more">
                                                <a href="{{ route('real-estate.details', ['id' => $item->id]) }}" class="btn btn-outline-primary see-more-btn mx-auto my-4">
                                                    <i class='bx bx-show-alt'></i> التفاصيل
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        @endif
                    @endisset
                </div>
            </div>
        </div>
        <!--/main-content-->
    </main>
    <!--/main-content-->
@endsection


 <!-- Bootstrap JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>