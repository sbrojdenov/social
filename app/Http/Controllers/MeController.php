<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\User;
use App\Photo;
use Intervention\Image\Facades\Image;

class MeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('me.index');
    }

    public function upload($id) {
       
        $user =\Auth::user()->id;
     
        if (!file_exists("upload/$user")) {
            mkdir("upload/$user");
        }
      
        $file = Input::file('file');
        $extension = Input::file('file')->getClientOriginalExtension();
        $destinationPath = "upload/$user"; // upload path
        $fileName = rand(11111, 99999) . '.' . $extension;
        $fileThumb = "thumb_".$fileName;    
        Input::file('file')->move($destinationPath, $fileName);
        $img = Image::make("$destinationPath/$fileName")->resize(400, 300);
         Photo::create([
            'user_id' => $user,
            'photos' => $fileName,
            'avatar' => $id === 1 ? 0 : 1
        ]);
         $img->save("$destinationPath/$fileThumb");
       
        return response()->json(['path' => "$destinationPath/$fileName",'thumb'=>"$destinationPath/$fileThumb"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function images() {
      $user =\Auth::user()->photo()->get()->toArray();
      
       return $user;
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
