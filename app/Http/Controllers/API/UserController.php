<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

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

    // User Profile
    public function profile()
    {
        return auth('api')->user();
    }

    // User Uplod Image
    public function uplod_image()
    {
        
        $id = auth('api')->user()->id;
        $User = User::where('id',$id)->update([
            'photo'=>up()->upload([
                    'file'          =>'file',
                    'path'          =>'User/image/'.$id,
                    'upload_type'   =>'single',
                    'delete_file'   =>'',
            ])
        ]);

        return response([
            'status'=>true,
            $id
        ], 200);
    }

    public function delete_min_image($id)
    {
        $user = User::find($id);

        Storage::delete($user->photo);

        $user->photo = null;

        $user->save();
        return response(['status' => true], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validate(request(),
            [
                'name'      =>  'required|string|max:191',
                'email'     =>  'required|string|email|max:191|unique:users',
                'password'  =>  'required|string|max:191|min:6',
                'type'      =>  'required',
                'bio'       =>  'sometimes|nullable',
            ],
        );
        $data['password']= bcrypt(request('password'));

        User::create($data);

        return response([
            'status'=>true,
            'message'=>'Created User'
        ], 200);
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

        // $user = User::findOrfail($id);

        $data = $this->validate(request(),
        [
            'name'      =>  'required|string|max:191',
            'email'     =>  'required|string|email|max:191|unique:users,email,'.$id,
            'password'  =>  'sometimes|nullable|string|max:191|min:6',
            'type'      =>  'required',
            'bio'       =>  'sometimes|nullable',
        ],
    );

    if( request()->has('password')){

        $data['password']= bcrypt(request('password'));
    }


    User::where('id',$id)->update($data);

    return response([
        'status'=>true,
        'message'=>'Updated User'
    ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);

        $user->delete();

        // Delete The User

        return ['message' => 'Delete User Success'];
    }
}
