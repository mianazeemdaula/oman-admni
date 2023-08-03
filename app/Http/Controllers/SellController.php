<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sell;
use App\Models\NewsImage;
use Image;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Sell::whereStatus('PENDING')->whereType('طلب بيع')->get();
        return view('admin.sells.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sells.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Sell::findOrFail($id);
        return view('admin.sells.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = Sell::findOrFail($id);
        return view('admin.sells.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = null;
        if($request->status == 'accept'){    
            $response = \App\Helper\WebClient::post('sell/accept',[
                'id' => $id
            ]);
            $response =  $response->json();
        }else{    
            $response = \App\Helper\WebClient::post('sell/reject',[
                'id' => $id,
                'reason' => $request->reason,
            ]);
            $response =  $response->json();
        }
        return  redirect()->back()->with(['alert' => $response['success'] ?? false, 'message' => $response['message'] ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sell::find($id)->delete();
        return redirect()->back();
    }

    public function getGifts()
    {
        $collection = Sell::whereStatus('PENDING')->whereType('طلب اهداء')->get();
        return view('admin.gifts.index', compact('collection'));
    }
}
