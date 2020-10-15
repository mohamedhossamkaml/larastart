<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;
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
        if (Gate::allows('isAdmin') || Gate::allows('isAuthor')) {
            return User::latest()->paginate(10);
        }
    }

    // User Profile
    public function profile()
    {
        return auth('api')->user();
    }

    // User Update Profile
    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();
        $currentPhoto = $user->photo ;
        $id = $user->id;

        $data = $this->validate(request(),[
            'name'      =>  'required|string|max:191',
            'email'     =>  'required|string|email|max:191|unique:users,email,'.$id,
            'password'  =>  'sometimes|nullable|string|max:191|min:6',
            'type'      =>  'required',
            'bio'       =>  'sometimes|nullable|string',
            'education' =>  'sometimes|nullable|string',
            'skills'    =>  'sometimes|nullable|string',
            // 'photo'     =>  'sometimes|nullable|string|'.v_image(),
        ]);

        if(request()->hasFile('photo') != $currentPhoto){
            $data['photo'] = up()->upload([
                'file'          =>'file',
                'path'          =>'User/profile/'.$id,
                'upload_type'   =>'single',
                'delete_file'   =>'',
            ]);
        }

        // User::where('id',$id)->update($data);
        User::where('id',$id)->update($request->all());
        // $user->update($request->all());

        return [ 
            'status'=>true,
            'massage' => "Succcess" 
        ];
    }

    // User Update Profile 2
    public function updateProfileTow(Request $request)
    {
        
        $user = auth('api')->user();
        $id = $user->id;


        $this->validate(request(),[
            'name'      =>  'required|string|max:191',
            'email'     =>  'required|string|email|max:191|unique:users,email,'.$id,
            'password'  =>  'sometimes|required|string|max:191|min:6',
            'type'      =>  'required',
            'bio'       =>  'sometimes|nullable|string',
            'education' =>  'sometimes|nullable|string',
            'skills'    =>  'sometimes|nullable|string',
        ]);

        if(!empty($request->password) && $request->password !="" ){

            $request->merge(['password' =>  bcrypt(request('password'))]) ;
        }

        $currentPhoto = $user->photo ;

        if(request('photo') != $currentPhoto ){
            $name = time().'.'.explode('/', explode(':', substr($request->photo, 0, strpos($request->photo,';')))[1])[1];
            
            Image::make(request('photo'))->save(public_path('storage/User/profile/').$name);

            $request->merge(['photo' => $name]) ;

            $userPhoto = public_path('storage/User/profile/').$currentPhoto;

            if( file_exists($userPhoto) ){
                
                @unlink($userPhoto);
            }
        }

        User::where('id',$id)->update($request->all());
        
        return [ 
            'status'=>true,
            'massage' => "Succcess" 
        ];
    }

    // User Uplod Image
    public function uplod_image()
    {

        $id = auth('api')->user()->id;
        $User = User::where('id',$id)->update([
            'photo'=>up()->upload([
                    'file'          =>'file',
                    'path'          =>'User/profile/'.$id,
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
        $this->authorize('isAdmin');
        $data = $this->validate(request(),
        [
            'name'      =>  'required|string|max:191',
            'email'     =>  'required|string|email|max:191|unique:users',
            'password'  =>  'required|string|max:191|min:6',
            'type'      =>  'required',
            'bio'       =>  'sometimes|nullable|string',
            'education' =>  'sometimes|nullable|string',
            'skills'    =>  'sometimes|nullable|string',
            'photo'     =>  'sometimes|nullable|string|'.v_image(),
        ],);

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
        $this->authorize('isAdmin');
        // $user = User::findOrfail($id);

        $data = $this->validate(request(),
        [
            'name'      =>  'required|string|max:191',
            'email'     =>  'required|string|email|max:191|unique:users,email,'.$id,
            'password'  =>  'sometimes|nullable|string|max:191|min:6',
            'type'      =>  'required',
            'bio'       =>  'sometimes|nullable|string',
            'education' =>  'sometimes|nullable|string',
            'skills'    =>  'sometimes|nullable|string',
            // 'photo'     =>  'sometimes|nullable|string|'.v_image(),
        ],
    );

    if( request()->has('password')){

        $data['password']= bcrypt(request('password'));
    }


    if(request()->hasFile('photo')){
        $data['photo'] = up()->upload([
            'file'          =>'file',
            'path'          =>'User/profile/'.$id,
            'upload_type'   =>'single',
            'delete_file'   =>'',
        ]);
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
        $this->authorize('isAdmin');
        $user = User::findOrfail($id);

        $user->delete();

        // Delete The User

        return ['message' => 'Delete User Success'];
    }
}
