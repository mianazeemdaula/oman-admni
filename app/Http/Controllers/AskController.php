<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ask;
use App\Models\NewsImage;
use Image;

class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Ask::where('status','PENDING')->get();
        return view('admin.asks.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.asks.create');
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
            'tittle' => 'required',
            'body' => 'required',
            'images' => 'required',
        ]);
        $data = $request->all();
        $news = new Ask();
        $news->tittle = $request->tittle;
        $news->body = $request->body;
        $news->save();
        if($request->has('images')){
            foreach ($request->images as $img) {
                $file = $img;
                $ext = $file->getClientOriginalExtension();
                $fileName = time().'.'.$ext;
                $path = "product/".$fileName;
                $image = Image::make($file->getRealPath());
                $image->save($path);
                NewsImage::create([
                    'image' => asset($path),
                    'name' => $path,
                    'news_id' => $news->id
                ]);
            }
        }
        return redirect()->route('sells');
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
        return view('admin.news.view', compact('model'));
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
        $building = Sell::find($id)->update($data);
        $building->save();
        return redirect()->route('sells');
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

    public function statusUpdate(Request $request)
    {
        $response = App\Helper\WebClient::post('ask/accept',[
            'id' => $request->id,
        ]);
        return $response;
    }

    public function reject(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:asks',
            'reason'=>'required'
        ]);
        $response = App\Helper\WebClient::post('ask/reject',[
            'id' => $request->id,
            'reason' => $request->reason,
        ]);
        return $response;
    }
}
