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
        <div class="container">
        <div class="add-real-state-modal">
            <div class="section-title"> <i class="bx bx-plus"></i>الاعلان عن عقار جديد</div>
            <div class="modal-body">
                <form method="POST" action="{{ route('real-estates.update', ['id' => $realEstate->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                                <div class="input-box">
                                    <label>عنوان الاعلان</label>
                                    <input type="text" name="title" placeholder="ادخل العنوان" value="{{ $realEstate->title }}">
                                </div>
                                <div class="input-box">
                                    <label>وصف الاعلان</label>
                                    <textarea type="text" name="description" placeholder="ادخل الوصف">{{$realEstate->description}}</textarea>
                                </div>
                                <div class="input-box">
                                    <label>اسم المنظقة</label>
                                    <input type="text" name="place" placeholder="اسم المنظقة"  value="{{ $realEstate->place }}">
                                </div>
                                <div class="input-box">
                                    <label> السعر</label>
                                    <input type="text" name="price" placeholder="السعر" value="{{ $realEstate->price }}">
                                </div>
                                <div class="input-box">
                                    <label> العملة</label>
                                    <select name="currency_id">
                                    @foreach(App\Models\Currency::all() as $currency)
                                        <option value="{{ $currency->id }}">{{ $currency->title }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="input-box">
                                    <label>نوع الاعلان (بيت مستقل, شقة, مكتب, محل)   </label>
                                    <select name="type_id">
                                        @foreach(App\Models\RealestatesType::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-box">
                                    <label>نوع العرض ( بيع, أجار, شراء)   </label>
                                    <select name="ad_id">
                                        @foreach(App\Models\AdType::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>                            
                                </div>
                                <div class="input-box">
                                    <label> مساحة المكان</label>
                                    <input type="text" name="space"  placeholder=" ادخل المساحة" value="{{ $realEstate->space }}">
                                </div>
                                <div class="input-box">
                                    <label>الاسم</label>
                                    <input type="text" name="user_name" placeholder="ادخل الاسم" value="{{ auth()->check() ? auth()->user()->name : '' }}">
                                </div>

                                <div class="input-box">
                                    <label>رقم الهاتف</label>
                                    <input type="text" name="user_phone" placeholder="ادخل رقم الهاتف" value="{{ auth()->check() ? auth()->user()->phone : '' }}">
                                </div>
                                <div class="input-box d-flex justify-content-start">
                                    <label>اضافة صورة</label>
                                    <div class='file-input'>
                                        <input type="file" name="image" accept="image/*" id="imageInput">
                                        <span class='button' id="uploadButton">تحميل</span>
                                        <span class='label' data-js-label>لم يتم تحميل صورة</span>
                                    </div>
                                </div>
                            </div>
                    </div>

                    @error('title', 'description')
                        <span class="error"><i class='bx bx-error-circle mx-2'></i>{{ $message }}</span>
                    @enderror

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

                    <button type="submit" class="btn btn-primary w-100 my-3">حفظ</button>
                </form>
            </div>
        </div>
        </div>
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