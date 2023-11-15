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
        <div class="container pb-5">
        <div class="search-bar my-5">
                <div class="search-card">
                    <h2 class="search-text pb-3 d-flex align-items-center"> 
                        <i class="bx bx-search p-2"></i> 
                        <span> إبحث عن عقار</span>
                    </h2>
                    <form action="{{ route('search') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-sm-12 px-1">
                                <input class="form-control" name="place" placeholder="المنطقة" />
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 px-1">
                                <input class="form-control" list="datalistOptions2" name="ad_id" id="exampleDataList" placeholder="نوع العرض " />
                                <datalist id="datalistOptions2">
                                    @foreach(App\Models\AdType::all() as $item)
                                        <option value="{{ $item->title }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 px-1">
                                <input class="form-control" list="datalistOptions3" name="type_id" id="exampleDataList" placeholder="نوع العقار" />
                                <datalist id="datalistOptions3">
                                    @foreach(App\Models\RealestatesType::all() as $item)
                                        <option value="{{ $item->title }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 px-1">
                                <input class="form-control" name="min_price" placeholder="السعر الأدنى" />
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 px-1">
                                <input class="form-control" name="max_price" placeholder="السعر الأعلى" />
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 px-1">
                                <button type="submit" class="btn btn-outline-primary search-btn"> بحث</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="all-real-estate">
            <h2 class="search-text pb-3 d-flex align-items-center justify-content-between">
                <div class="search-text pb-3 d-flex align-items-center">
                    <i class='bx bx-list-ul p-2'></i>
                    <span>جميع العقارات</span>
                </div>
                <a href="{{ route('add-real-estates') }}" class="btn-outline-primary btn register ">  <i class="bx bx-right-arrow-alt"></i> أعلن عن عقار</a> 
            </h2>
                <div class="row">
                @foreach(App\Models\RealEstate::all() as $item)
                    <div class="col-lg-4 col-md-2 col-sm-12 mt-3">
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
                </div>
            </div>
        </div>
    </main>
    <!--/main-content-->
@endsection


 <!-- Bootstrap JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>