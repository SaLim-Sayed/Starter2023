<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AjaxOfferController extends Controller
{
    use OfferTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::select('id',
            'price',
            'photo',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details'
        )->limit(10)->get(); // return collection

        return view('ajaxoffers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajaxOffers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request)
    {
        $file_name = $this->saveImage($request->photo, 'images/offers');
        $offer = Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'photo' => $file_name,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
        ]);
        if ($offer) {
            return response()->json([
                'status' => true,
                'msg' => 'new offer is added successfully',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ  حاول ثانيةّ',
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $offer = Offer::find($request->offer_id); // search in given table id only
        if (!$offer) {
            return response()->json([
                'status' => false,
                'msg' => 'هذ العرض غير موجود',
            ]);
        }

        $offer = Offer::select('id', 'name_ar', 'name_en', 'photo', 'details_ar', 'details_en', 'price')->find($request->offer_id);

        return view('ajaxoffers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $offer = Offer::find($request->offer_id);
        if (!$offer) {
            return response()->json([
                'status' => false,
                'msg' => 'هذ العرض غير موجود',
            ]);
        }

        $file_name = $this->saveImage($request->photo, 'images/offers');
        //update data
        $offer->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'photo' => $file_name,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'تم  التحديث بنجاح',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {

        $offer = Offer::find($request->id); // Offer::where('id','$offer_id') -> first();

        if (!$offer) {
            return redirect()->back()->with(['error' => __('messages.offer not exist')]);
        }

        $offer->delete();

        return response()->json([
            'status' => true,
            'msg' => 'تم الحذف بنجاح',
            'id' => $request->id,
        ]);

    }
}
