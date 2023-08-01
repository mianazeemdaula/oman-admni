<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use Image;

class PendingCollectableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Item::whereStatus('PENDING')->get();
        return view('admin.pending-collect.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pending-collect.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'registration_number' => 'required',
            'type' => 'required',
            'area' => 'required',
            'type_description' => 'required',
            'material' => 'required',
            'common_name' => 'required',
            'description' => 'required',
            'state' => 'required',
            'origin' => 'required',   
            'how_own' => 'required',   
            'where_saved' => 'required',   
            'from_when' => 'required',   
            'length' => 'required',   
            'width' => 'required',   
            'hight' => 'required',   
            'diameter' => 'required',   
            'weight' => 'required',   
            'count' => 'required',   
            'time_details' => 'required',
            'background_location' => 'required',
            'special_item' => 'required',
            'status' => 'required',
            'qr' => 'required',
        ]);
        $data = $request->all();
        $data['user_id'] = \App\Models\User::wherePhone(91377887)->first()->id;
        $building = Item::create($data);
        // if($request->has('property_image')){
        //     $file = $request->property_image;
        //     $ext = $file->getClientOriginalExtension();
        //     $fileName = time().'.'.$ext;
        //     $path = "items/".$fileName;
        //     $image = Image::make($file->getRealPath());
        //     $image->save($path);
        //     $building->property_image = asset($path);
        // }
        // if($request->has('image')){
        //     $file = $request->image;
        //     $ext = $file->getClientOriginalExtension();
        //     $fileName = time().'.'.$ext;
        //     $path = "items/".$fileName;
        //     $image = Image::make($file->getRealPath());
        //     $image->save($path);
        //     $building->image = asset($path);
        // }
        // $building->save();
        return redirect()->route('pending-collect');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Item::findOrFail($id);
        return view('admin.pending-collect.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('admin.pending-collect.edit', compact('item'));
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
            $response = \App\Helper\WebClient::post('item/accept',[
                'id' => $id
            ]);
            $response =  $response->json();
        }else{    
            $response = \App\Helper\WebClient::post('item/reject',[
                'id' => $id,
                'reason' => $request->reason,
            ]);
            $response =  $response->json();
        }
        return $response;
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
        Item::find($id)->delete();
        return redirect()->back();
    }
}
