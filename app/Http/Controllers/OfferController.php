<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Video;
use App\Traits\OfferTrait;
use App\Events\VideoViewer;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class OfferController extends Controller
{
    use OfferTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers=Offer::select(
            'id',
            'price',
            'photo',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details',
        )->get();;
        return view('offers.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request)
    {
        $file_name = $this->saveImage($request->photo, 'images/offers');
        $offer=Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'photo' => $file_name,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
        ]);
        return redirect()->route('offers.index')->with(['success' => 'new offer is added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $offer=Offer::find($id);
        return view('offers.edit',compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferRequest $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->update($request->all());
        return redirect(route('offers.index'))->with(['success' => 'تم تحديث بيانات العنصر رقم ' . $offer->id . ' بنجاح']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {

        $offer = Offer::findOrFail($id);
        $offer->delete();
        return redirect(route('offers.index'))->with(['success' => 'تم تحديث بيانات العنصر   ' ]);

    }
    public function truncate()
    {
        $offers = Offer::truncate();
        return redirect(route('offers.index'))->with(['success' => "تم حذف كل العناصر" ]);
    }

    public function video()
    {
        $video=Video::first();
        event(new VideoViewer($video));
        return view('offers.video',compact('video'));
    }
}
