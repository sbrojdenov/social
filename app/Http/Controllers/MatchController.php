<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\User;
use Carbon;

class MatchController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('match.index');
    }

    public function getAll() {
        $me = DB::table('users')
                ->join('locations', function ($join) {
                    $join->on('users.id', '=', 'locations.user_id')
                    ->where('locations.user_id', '=', \Auth::user()->id);
                })
                ->first();


        $gender = ($me->gender == 'Fema' ? 'Male' : 'Fema');

        $match = DB::table('users')
                ->leftJoin('locations', 'users.id', '=', 'locations.user_id')
                ->leftJoin('photos', 'users.id', '=', 'photos.user_id')
                ->where('current_town', $me->current_town)
                ->where('gender', "Male")
                ->whereBetween('age', [$me->age - 3, $me->age + 3])
                ->select('users.id', 'users.name', 'photos.avatar', 'users.session')
                ->get();

        return response($match);
    }

    public function getmatch() {
        $me = DB::table('users')
                ->join('locations', function ($join) {
                    $join->on('users.id', '=', 'locations.user_id')
                    ->where('locations.user_id', '=', \Auth::user()->id);
                })
                ->first();


        $gender = ($me->gender == 'Fema' ? 'Male' : 'Fema');
        $mytime = date("Y-m-d h:i:s ", time() - 60);

        $match = DB::table('users')
                ->leftJoin('locations', 'users.id', '=', 'locations.user_id')
                ->leftJoin('photos', 'users.id', '=', 'photos.user_id')
                ->where('current_town', $me->current_town)
                ->where('gender', "Male")
                ->where('session', '>', $mytime)
                ->whereBetween('age', [$me->age - 3, $me->age + 3])
                ->select('users.id', 'users.name', 'photos.avatar', 'users.session')
                ->get();

        return response($match);
    }

    public function update() {
        $mytime = Carbon\Carbon::now();
        $userId = \Auth::user()->id;
        $user = User::find($userId);
        $user->session = $mytime->toDateTimeString();
        $user->save();
    }

}
