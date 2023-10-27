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
        <section class="main-section">
            <div class="search-bar">
                <div class="search-card">
                    <h2 class="search-text"> إبحث عن عقار</h2>
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
        </section>
        <!--/main-content-->

        <!--about-us-->
        <section class="about-us">
            <div class="container">
                <h2 class="title">سواء كنت تريد شراء، بيع او إستئجار داخل يطا، نحن هنا للمساعدة.</h2>

                <div class="about-btn d-flex justify-content-center mb-3">
                     <a href="{{ route('add-real-estates') }}" class="card-btn mx-auto">  <i class="bx bx-right-arrow-alt"></i> أعلن عن عقار</a> 
                </div>

                <div class="about-cards">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="card-box">
                                <div class="card-icon">
                                    <img src="/assets/images/img1.svg" alt="about-icon-img">
                                </div>
                                <h3 class="card-title">شراء عقار</h3>
                                <div class="card-description">اعثر على عقار المستقبل في يطا من خلال تجربة  يطا عقار ماب</div>
                                <!-- <button class="card-btn">  <i class="bx bx-right-arrow-alt"></i> إبحث عن عقار</button> -->
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="card-box">
                                <div class="card-icon">
                                    <img src="/assets/images/img2.svg" alt="about-icon-img">
                                </div>
                                <h3 class="card-title">بيع عقار</h3>
                                <div class="card-description">سواء كنت تقدم عرضًا بالتقسيط أو تختار البيع نقدًا ، يطا عقار ماب سوف يساعدك في  الاعلان بسهولة</div>
                                <!-- <button class="card-btn">  <i class="bx bx-right-arrow-alt"></i> أعلن عن عقار</button> -->
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="card-box">
                                <div class="card-icon">
                                    <img src="/assets/images/img3.svg" alt="about-icon-img">
                                </div>
                                <h3 class="card-title">تأجير عقار</h3>
                                <div class="card-description"> يطا عقار ماب,  ايجاد عقار للايجار اسهل و اسرع، مكان واحد للجميع نجمع فيه بين المالك و المستأجر.</div>
                                <!-- <button class="card-btn">  <i class="bx bx-right-arrow-alt"></i> إبحث عن عقار للايجار</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/about-us-->

        <!--recently-->
        <section class="recently-services">
            <div class="container">
                <h2 class="title">العقارات المضافة حديثاً</h2>
                @foreach(App\Models\RealEstate::take(5)->get() as $item)
                <div class="row">
                    <div class="col-md-12 mt-2 d-flex justify-content-center">
                        <div class="services-box">
                            <div class="services-image">
                            <img src="{{ $item->image }}" alt="Real Estate Image">
                            </div>
                            <div class="row w-100">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="service-description">
                                        <h3 class="service-title">{{ $item->title }}</h3>
                                        <p class="place">{{ $item->description }}</p>

                                        <div class="space-and-place">
                                            <div class="place"> <i class='bx bx-map'></i>{{ $item->place }}</div>
                                            <div class="space mx-5"> <i class='bx bx-ruler'></i> {{ $item->space }} متر مربع </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="see-more">
                                    <a href="{{ route('real-estate.details', ['id' => $item->id]) }}" class="btn btn-outline-primary see-more-btn mx-auto my-4">
                                        <i class='bx bx-show-alt'></i> التفاصيل
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="about-btn d-flex justify-content-center">
                    <a href="{{ route('all-real-estates') }}" class="card-btn mx-auto">
                        <i class="bx bx-right-arrow-alt"></i> جميع العقارات
                    </a>
                </div>
            </div>
        </section>
    </main>
    <!--/main-content-->
@endsection


 <!-- Bootstrap JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the file input and label element
        const fileInput = document.getElementById('imageInput');
        const label = document.querySelector('[data-js-label]');

        // Add an event listener to the file input to update the label text
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                // If a file is selected, update the label with the file name
                label.textContent = fileInput.files[0].name;
            } else {
                // If no file is selected, revert to the original text
                label.textContent = 'لم يتم تحميل صورة';
            }
        });
    });
</script>
</body>
</html>