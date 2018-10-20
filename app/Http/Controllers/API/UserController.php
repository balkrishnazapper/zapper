<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validations
      $this->validate($request,[
        'title'   => 'required|string',
        'first_name'    => 'required|string|min:5|max:255',
        'last_name'    => 'required|string|max:255',
        'password' => 'required|string|min:6|max:10',
        'email'   => 'required|string|email|max:255|unique:users',
        'user_type' => 'required'
    ]);


    return User::create([
        'title' => $request['title'],
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'email' => $request['email'],
        'user_type' => $request['user_type'],
        'password' => Hash::make($request['password']),
        'department' => $request['department'],
        'user_type' => $request['user_type'],
        'mobile_no' => $request['mobile_no'],
        'address' => $request['address'],
        'state' => $request['state'],
        'country' => $request['country'],
        'zip_code' => $request['zip_code'],
        'photo' => $request['photo']
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();
        //validations
      $this->validate($request,[
        'title'   => 'required|string',
        'first_name'    => 'required|string|min:5|max:191',
        'last_name'    => 'required|string|max:191',
        'password' => 'sometimes|string|min:6|max:10',
        'email'   => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'user_type' => 'required'
    ]);

        
        $currentPhoto = $user->photo;
        if($request->photo != $currentPhoto) {
            $name = time(). '.' . explode('/', explode(':', substr($request->photo,0,strpos
            ($request->photo,';')))[1])[1];

            \Image::make($request->photo)->save(public_path('img/profile/').$name);
            $request->merge(['photo' => $name]);

            $userPhoto = public_path('img/profile/').$currentPhoto;
            if(file_exists($userPhoto)) {
                @unlink($userPhoto);
            }
        }

        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]) ;
        }

        $user->update($request->all());
        return ["message" => "Success"];
    }

    public function profile()
    {
        return auth('api')->user();
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
        $user = User::findOrFail($id);
        //validations
      $this->validate($request,[
        'title'   => 'required|string',
        'first_name'    => 'required|string|min:5|max:255',
        'last_name'    => 'required|string|max:255',
        'password' => 'sometimes|string|min:6|max:10',
        'email'   => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'user_type' => 'required'
    ]);
        $user->update($request->all());
        return ["message" => "User Info Updated"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return ['message' => 'user deleted'];
    }
}
