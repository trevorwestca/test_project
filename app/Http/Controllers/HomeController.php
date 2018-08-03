<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware('auth', ['only' => ['profile', 'saveProfile']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('profile');
    }

    /**
     * Save profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveProfile(Request $request)
    {
        $data = $request->json()->all();
        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
        ];

        $validator = \Validator::make($data, $rules);
        if ($validator->passes()) {

            $user = \Auth::user();

//            var_dump($user);die;

            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->save();

            return response()->json(200);
        } else {
            //TODO Handle your error
            return response()->json(
                $validator->errors()->all(), 422
            );

        }

    }
}
