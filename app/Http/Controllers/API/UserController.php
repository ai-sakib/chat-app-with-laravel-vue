<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
        if (Gate::allows('isAdmin') || Gate::allows('isSubAdmin')) {
            return User::latest()->paginate(20);
            // return response()->json([
            //     'users'=>User::orderBy('id','desc')->paginate(5),
            // ]);
        }
        //return User::orderBy('id','desc')->get();
        
    }
    public function onlineUsers()
    {
        $user = new User;
        return $user->allOnline();
        
    }
    public function search()
    {
        if (Gate::allows('isAdmin') || Gate::allows('isSubAdmin')) {
            $keyword = \Request::get('s');
            if($keyword){
                return User::latest()
                        ->where('name', 'like', '%'.$keyword.'%')
                        ->orWhere('email', 'like', '%'.$keyword.'%')
                        ->paginate(20);
            }else{
                return User::latest()->paginate(20);
            }
            
        }
        
    }

    public function getProfile(){
        return auth('api')->user();
    }
    public function updateProfile(Request $request, $id){

        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required | min:3 | max: 20',
            'email' => 'required |email | unique:users,email,'.$user->id.'|max:255',
            'bio' => 'required | min:20 | max: 200',
            'password' => 'sometimes | confirmed | max: 20',
        ]);
        if($request->photo){
            if($request->photo != $user->photo){
                $user->provider_id = 0;
                $userPhoto = public_path('images/profile/'.$user->photo);
                if(file_exists($userPhoto)){
                    @unlink($userPhoto);
                }
                $extention = explode('/',explode(':',explode(';',$request->photo)[0])[1])[1];
                $image = time().'.'.$extention;
                \Image::make($request->photo)->resize(320, 240)->save('public/images/profile/'.$image);
                // $request->merge(['photo'=> $image]);
                $user->photo = $image;
            }
        }
        if(!empty($request->password)){
            //$request->merge(['password'=> Hash::make($request['password'])]);
            $user->password = Hash::make($request['password']);
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->bio = $request['bio'];
        $user->save();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users|max:255',
            'bio' => 'required|min:20|max:200',
            'type' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'bio' => $request['bio'],
            'type' => $request['type'],
            'photo' => $request['photo'],
            'password' => Hash::make($request['password']),
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
        $this->validate($request,[
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|max:200|unique:users,email,'.$user->id,
            'bio' => 'required|min:20|max:200',
            'type' => 'required',
            'password' => 'sometimes|confirmed|min:6',
        ]);

        $user->update($request->all());
        return ['message'=>'updated'];
        // User::update([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'bio' => $request['bio'],
        //     'type' => $request['type'],
        //     'photo' => $request['photo'],
        //     'password' => Hash::make($request['password']),
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isSubAdmin')) {
            User::findOrFail($id)->delete();
        }
        
    }
}
