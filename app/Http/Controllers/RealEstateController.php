<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealEstate;
use App\Models\Currency;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RealEstateController extends Controller
{
    public function addRealEstatePost(Request $request){
         // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('warning', 'الرجاء التسجيل الدخول للاعلان عن عقار');
            return;
        }

        // Validate the incoming data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'space' => 'required',
            'real_estate_type' => 'required',
            'ad_type' => 'required',
            'price' => 'required',
            'price' => 'required',
            'currency_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example image validation, adjust as needed
        ],
        [
            'title.required' => 'حقل العنوان مطلوب.',
            'description.required' => 'حقل الوصف مطلوب.',
            'place.required' => 'حقل المنطقة مطلوب.',
            'space.required' => 'حقل المساحة مطلوب.',
            'real_estate_type.required' => 'حقل نوع العقار مطلوب.',
            'ad_type.required' => 'حقل نوع العرض مطلوب.',
            'price.required' => 'حقل السعر مطلوب.',
            'image.required' => 'حقل الصورة مطلوب.',
            'currency_id.required' => 'حقل العملة مطلوب.'
        ]);

        $messages = [
            'title.required' => 'حقل العنوان مطلوب.',
            'description.required' => 'حقل الوصف مطلوب.',
            'place.required' => 'حقل المنطقة مطلوب.',
            'space.required' => 'حقل المساحة مطلوب.',
            'real_estate_type.required' => 'حقل نوع العقار مطلوب.',
            'ad_type.required' => 'حقل نوع العرض مطلوب.',
            'price.required' => 'حقل السعر مطلوب.',
            'image.required' => 'حقل الصورة مطلوب.',
            'currency_id.required' => 'حقل العملة مطلوب.'
        ];

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'space' => 'required',
            'real_estate_type' => 'required',
            'ad_type' => 'required',
            'price' => 'required',
            'currency_id.required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Perform the validation
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
        }

        $image = new RealEstate();

        // Handle the file upload
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            // Generate a unique name for the image
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $currentMonthYear = date('FY', strtotime('now'));
            // Specify the directory where you want to store the uploaded images
            $imagePath = 'images/' . $currentMonthYear . '/';

            // Move the uploaded file to the specified location
            $imageFile->move($imagePath, $imageName);

            // Save the image's path (including the directory) to the database
            $image->image = $imagePath . $imageName;
        }

        // Save other form data to the Image model
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->place = $request->input('place');
        $image->space = $request->input('space');
        $image->real_estate_type = $request->input('real_estate_type');
        $image->ad_type = $request->input('ad_type');
        $image->price = $request->input('price');
        //$image->user_name = $request->input('user_name');
        //$image->user_phone = $request->input('user_phone');
        $image->user_id = auth()->user()->id;
        $image->currency_id = $request->input('currency_id');
        // Save the image data to the database
        $image->save();

        // Redirect or return a response
        return redirect(route('home'))->with('success', 'تم الاعلان بنجاح');
    }

    public function addRealEstate(){
        return view('register');
    }

    public function allRealEstates(){
        return view('all-real-estates');
    }

    public function showRealEstateDetails($id)
    {
        $realEstate = RealEstate::find($id);
        return view('details-real-estates', ['realEstate' => $realEstate]);
    }
}
