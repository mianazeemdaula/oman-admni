<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\NewsImage;
use Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = News::all();
        return view('admin.news.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
        $news = new News();
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
        return redirect()->route('news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = News::findOrFail($id);
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
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
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
        $building = News::find($id)->update($data);
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
        return redirect()->route('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return redirect()->back();
    }
}
