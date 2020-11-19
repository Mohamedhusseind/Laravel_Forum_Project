<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Video;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  LaravelLocalization;
use Auth;
use Image;

class CrudController extends Controller
{
    public function getalloffers()
    {
        $offers = Offer::select('id',
            'price',
            'name_'. LaravelLocalization::getCurrentLocale().' as name',
            'details_'. LaravelLocalization::getCurrentLocale().' as details',
            'photo'
            )->get();
        return view('offers.all',compact('offers'));
    }

    public function editOffer($offer_id)
    {
        $offer = Offer::find($offer_id);//find for id only
        if (!$offer)
        {
            return redirect()->back();
        }

        $offer = Offer::select('id','name_ar','name_en','photo','price','details_ar','details_en')->find($offer_id);

        return view('offers.edit',compact('offer'));

    }

    public function deleteoffer($offer_id)
    {
        //check if offer exsit
        $offer = Offer::find($offer_id);
        if ($offer)
        {
            $offer->delete();

            return redirect() -> route('offers.all',$offer_id)-> with(['success'=>__('messages.The offer deleted success')]);

        }
        else{
            return redirect()-> back()->with(['error'=>__('messages.The offer not Exist')]);
          }
    }


    public function updateOffer(Request $request, $offer_id){
        //validation request IN OfferRequest
        $offer = Offer::find($offer_id);
        //find for id only
        if (!$offer)
        {
            return redirect()->back();
        }
        $offer ->update($request->all());
        return redirect()->back()->with(['success'=>'تم التثبيت بنجاح']);
    }

    public function create()
    {
        return view('offers.create');
    }

    public function store(OfferRequest $request)
    {
        $photo = $request->file('photo');
        $filename=$this->saveimage($photo,'uploads/offers');
        Offer::create([
            'photo'=>$filename,
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

    public function getvideo(){
        $video = Video::first();
        event(new VideoViewer($video));
        return view('video')->with('video',$video);
    }


}
