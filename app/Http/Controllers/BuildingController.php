<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Building;
use App\Models\City;
use Image;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Building::all();
        return view('admin.buildings.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.buildings.create', compact('cities'));
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
            'type' => 'required',
            'how_own' => 'required',
            'from_when' => 'required',
            'room_number' => 'required',
            'area' => 'required',
            'dimensions' => 'required',
            'state' => 'required',
            'restoration_date' => 'required',   
            'city' => 'required',   
            'building_status' => 'required',   
            'neighborhood' => 'required',
            'village' => 'required',   
            'location' => 'required',   
            'property_image' => 'required',   
            'image' => 'required',
        ]);
        $data = $request->all();
        // $data['user_id'] = auth()->id();
        $data['user_id'] = \App\Models\User::wherePhone(91377887)->first()->id;
        $data['status'] = 'PENDING';
        $building = Building::create($data);
        if($request->has('property_image')){
            $file = $request->property_image;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = "product/".$fileName;
            $image = Image::make($file->getRealPath());
            $image->save($path);
            $building->property_image = asset($path);
        }
        if($request->has('image')){
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = "product/".$fileName;
            $image = Image::make($file->getRealPath());
            $image->save($path);
            $building->image = asset($path);
        }
        $building->save();
        return redirect()->route('buildings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Building::findOrFail($id);
        return view('admin.buildings.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $building = Building::findOrFail($id);
        return view('admin.buildings.edit', compact('building'));
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
        $request->validate([
            'type' => 'required',
            'how_own' => 'required',
            'from_when' => 'required',
            'room_number' => 'required',
            'area' => 'required',
            'dimensions' => 'required',
            'state' => 'required',
            'restoration_date' => 'required',   
            'city' => 'required',   
            'building_status' => 'required',   
            'neighborhood' => 'required',   
            'status' => 'required',   
            'village' => 'required',   
            'location' => 'required',   
            'property_image' => 'required',   
            'image' => 'required',
        ]);
        $data = $request->all();
        $building = Building::find($id)->update($data);
        if($request->has('property_image')){
            $file = $request->property_image;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = "product/".$fileName;
            $image = Image::make($file->getRealPath());
            $image->save($path);
            $building->property_image = asset($path);
        }
        if($request->has('image')){
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = "product/".$fileName;
            $image = Image::make($file->getRealPath());
            $image->save($path);
            $building->image = asset($path);
        }
        $building->save();
        return redirect()->route('buildings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Building::find($id)->delete();
        return redirect()->back();
    }
}
