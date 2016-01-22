<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Education;
use App\Hobby;
use App\Location;
use App\Look;


class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {


//         $users = DB::table('products')->where('front', '=', 1)->get();
//         //dd($users);die();
        return view('home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
      $input = $request->all();
      $this->saveUser($input);
      $this->saveEducation($input);
      $this->saveLocation($input);
      $this->saveHobby($input);
      $this->saveLook($input);
      
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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
        
    }

    protected function saveUser(array $input) {
        User::create([
            'name' => $input[0]['name'],
            'email' => $input[0]['email'],
            'password' => bcrypt($input[0]['password']),
            'birthday' => $input[0]['birthday'],
            'gender' => $input[0]['gender']['label']
        ]);
    }

    protected function saveEducation(array $input) {
        Education::create([
            'work' => $input[1]['work'],
            'college' => $input[1]['college'],
            'college' => $input[1]['hight'],
        ]);
    }

    protected function saveHobby(array $input) {

        Hobby::create([
            'sport' => $input[2]['sport'],
            'movie' => $input[2]['movie'],
            'book' => $input[2]['book'],
            'club' => $input[2]['club'],
        ]);
    }

    protected function saveLocation(array $input) {
        Location::create([
            'home_town' => $input[3]['hometown']['name'],
            'current_town' => $input[3]['current']['name'],
            'favorite_town' => $input[3]['favorite']['name'],      
        ]);
    }

    protected function saveLook(array $input) {
          Look::create([
            'height' => $input[4]['height'],
            'eyes' => $input[4]['eyes'],
            'hair' => $input[4]['hair'],
            'weight' => $input[4]['weight'], 
        ]);
        
    }
    
      public function email(Request $request){
         $input = $request->all();
         $user = DB::table('users')->where('email', $input['email'])->count();
          return response()->json(['countEmail' => $user]); 
     } 

}
