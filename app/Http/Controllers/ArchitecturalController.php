<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Building;
use App\Models\City;
use App\Models\State;
use Image;

class ArchitecturalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Building::all();
        return view('admin.architectural.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.architectural.create', compact('cities'));
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
        $data['user_id'] = auth()->id();
        // $data['user_id'] = \App\Models\User::wherePhone(91377887)->first()->id;
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
        return view('admin.architectural.view', compact('model'));
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
        $cities = City::all();
        $city = City::where('name', $building->city)->first();
        $stats = [];
        if($city){
            $stats = State::where('city_id', $city->city_id)->get();
        }
        return view('admin.architectural.edit', compact('building', 'cities', 'stats'));
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
        if($request->has('status_ar')){
            $response = null;
            if($request->status_ar == 'accept'){    
                $response = \App\Helper\WebClient::post('building/accept',[
                    'id' => $id
                ]);
                $response =  $response->json();
            }else{    
                $response = \App\Helper\WebClient::post('building/reject',[
                    'id' => $id,
                    'reason' => $request->reason,
                ]);
                $response =  $response->json();
            }
            return  redirect()->back()->with(['alert' => $response['success'] ?? false, 'message' => $response['message'] ]);
        }
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
