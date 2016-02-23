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
      $uid=$this->saveUser($input);
      $this->saveEducation($input,$uid);
      $this->saveLocation($input,$uid);
      $this->saveHobby($input,$uid);
      $this->saveLook($input,$uid);
       $user = array(
            'email' => $input[0]['email'],
            'password' => $input[0]['password']
        );
      
      if(\Auth::attempt($user)){
           return response()->json(['perfect'=>true]);
      }
    }

    protected function saveUser(array $input) {
        $this->getDate($input[0]['birthday']);
        $user=User::create([
            'name' => $input[0]['name'],
            'email' => $input[0]['email'],
            'password' => bcrypt($input[0]['password']),
            'birthday' => $input[0]['birthday'],
            'gender' => $input[0]['gender']['label'],
            'age'=>$this->getDate($input[0]['birthday'])
        ]);
        
        return $user->id;
    }

    protected function saveEducation($input,$uid) {
       
        Education::create([
            'work' => $input[1]['work'],
            'college' => $input[1]['college'],
            'hight_school' => $input[1]['hight'],
            'user_id' => $uid
        ]);
    }

    protected function saveHobby($input,$uid) {

        Hobby::create([
            'sport' => $input[2]['sport'],
            'movie' => $input[2]['movie'],
            'book' => $input[2]['book'],
            'club' => $input[2]['club'],
            'user_id' => $uid
        ]);
    }

    protected function saveLocation($input,$uid) {
        Location::create([
            'home_town' => $input[3]['hometown']['name'],
            'current_town' => $input[3]['current']['name'],
            'favorite_town' => $input[3]['favorite']['name'],
            'user_id' => $uid
        ]);
    }

    protected function saveLook($input,$uid) {
          Look::create([
            'height' => $input[4]['height'],
            'eyes' => $input[4]['eyes'],
            'hair' => $input[4]['hair'],
            'weight' => $input[4]['weight'], 
            'user_id' => $uid
        ]);
        
    }
    
      public function email(Request $request){
         $input = $request->all();
         $user = DB::table('users')->where('email', $input['email'])->count();
          return response()->json(['countEmail' => $user]); 
     } 
     
      public function profile(){
         return redirect('me');
    }
    
       protected function getDate($dob){
         $date=explode("/",$dob); 
         $dateDif=date("Y")-$date[2];
         return $dateDif;
    }

}
