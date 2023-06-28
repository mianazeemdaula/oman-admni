<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserUpdate;
use App\Models\NewsImage;
use Image;

class UserUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = UserUpdate::where('status','PENDING')->get();
        return view('admin.userupdates.index', compact('collection'));
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
        $request->validate([
            'tittle' => 'required',
            'body' => 'required',
            'images' => 'required',
        ]);
        $data = $request->all();
        $news = new Sell();
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
        $response = null;
        if($request->status == 'accept'){    
            $response = \App\Helper\WebClient::post('user/update/accept',[
                'id' => $id
            ]);
            $response =  $response->json();
        }else{    
            $response = \App\Helper\WebClient::post('user/update/reject',[
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
        UserUpdate::find($id)->delete();
        return redirect()->back();
    }
}
