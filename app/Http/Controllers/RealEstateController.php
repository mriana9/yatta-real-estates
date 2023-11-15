<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealEstate;
use App\Models\Currency;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RealEstateController extends Controller
{
    public function search(Request $request)
    {
        $query = RealEstate::query();
    
        if ($request->input('place')) {
            $query->where('Place', 'like', '%' . $request->input('place') . '%');
        }
    
        if ($request->input('min_price')) {
            $query->where('Price', '>=', $request->input('min_price'));
        }
    
        if ($request->input('max_price')) {
            $query->where('Price', '<=', $request->input('max_price'));
        }
    
        if ($request->input('type_id')) {
            $query->whereHas('realEstateType', function ($query) use ($request) {
                $query->where('title', $request->input('type_id'));
            });
        }

        if ($request->input('ad_id')) {
            $query->whereHas('realEstateAdType', function ($query) use ($request) {
                $query->where('title', $request->input('ad_id'));
            });
        }
    
        $results = $query->get();
    
        return view('search', compact('results'));
    }
     
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
            'type_id' => 'required',
            'ad_id' => 'required',
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
            'type_id.required' => 'حقل نوع العقار مطلوب.',
            'ad_id.required' => 'حقل نوع العرض مطلوب.',
            'price.required' => 'حقل السعر مطلوب.',
            'image.required' => 'حقل الصورة مطلوب.',
            'currency_id.required' => 'حقل العملة مطلوب.'
        ]);

        $messages = [
            'title.required' => 'حقل العنوان مطلوب.',
            'description.required' => 'حقل الوصف مطلوب.',
            'place.required' => 'حقل المنطقة مطلوب.',
            'space.required' => 'حقل المساحة مطلوب.',
            'type_id.required' => 'حقل نوع العقار مطلوب.',
            'ad_id.required' => 'حقل نوع العرض مطلوب.',
            'price.required' => 'حقل السعر مطلوب.',
            'image.required' => 'حقل الصورة مطلوب.',
            'currency_id.required' => 'حقل العملة مطلوب.'
        ];

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'space' => 'required',
            'type_id' => 'required',
            'ad_id' => 'required',
            'price' => 'required',
            'currency_id.required',
            'image' => 'required',
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
        $image->price = $request->input('price');
        $image->user_id = auth()->user()->id;
        $image->currency_id = $request->input('currency_id');
        $image->type_id = $request->input('type_id');
        $image->ad_id = $request->input('ad_id');
        // Save the image data to the database
        $image->save();

        // Redirect or return a response
        return redirect(route('add-real-estates'))->with('success', 'تم الاعلان بنجاح')->with('delay', 1);
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

    public function destroy($id) {
        $realEstate = RealEstate::find($id);
        if (!$realEstate || $realEstate->user_id !== auth()->user()->id) {
            return back()->with('error', 'Unable to delete this listing.');
        }
        $realEstate->delete();

        return redirect()->route('profile')->with('success', 'تم الحذف بنجاح');
    }

    public function confirm($id) {
        $realEstate = RealEstate::find($id);
    
        if (!$realEstate || $realEstate->user_id !== auth()->user()->id) {
            return back()->with('error', 'Unable to confirm this listing.');
        }
        $realEstate->delete();
    
        return redirect()->route('profile')->with('success', 'تم تاكيد الحجز بنجاح');
    }
    

    public function edit($id) {
        $realEstate = RealEstate::find($id);
        return view('edit-user-real-estates', ['realEstate' => $realEstate]);
    }

    public function update(Request $request, $id) {
        // Find the real estate listing by its ID
        $realEstate = RealEstate::find($id);
    
        // Validate the incoming data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'space' => 'required',
            'type_id' => 'required',
            'ad_id' => 'required',
            'price' => 'required',
            'price' => 'required',
            'currency_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $realEstate->title = $request->input('title');
        $realEstate->description = $request->input('description');
        $realEstate->place = $request->input('place');
        $realEstate->space = $request->input('space');
        $realEstate->price = $request->input('price');
        $realEstate->user_id = auth()->user()->id;
        $realEstate->currency_id = $request->input('currency_id');
        $realEstate->type_id = $request->input('type_id');
        $realEstate->ad_id = $request->input('ad_id');
    
        $realEstate->save();
    
        return redirect()->route('profile')->with('success', 'تم تحديث العقار بنجاح');
    }
}

