<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create()
    {
        // view from to add this offer
        return view('ajaxoffers.create');

    }

    public function store(Request $request)
    {
       // $photo = $request->file('photo');
        //$filename=$this->saveimage($photo,'uploads/offers');
        Offer::create([
            //'photo'=>$filename,
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'price'=>$request->price,
            'details_ar'=>$request->details_ar,
            'details_en'=>$request->details_en,
        ]);
        return redirect()->back()->with(['success'=>'تم اضافة العرض بنجاح']);
    }
    public function saveimage($photo,$path)
    {
        $filename = time(). '.' .$photo->getClientOriginalExtension();
        $photo->move($path,$filename);
        return $filename;
    }
}
