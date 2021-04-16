<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MoreUserInfo;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = User::orderBy('id', 'desc')->get();
            return datatables::of($data)
                ->addColumn('status', function($data) {
                    if($data->is_active == true){
                        return '<span class="badge badge-pill badge-success">Active</span>';
                    }else{
                        return '<span class="badge badge-pill badge-danger">Inactive</span>';
                    }
                })->addColumn('image', function($data) {
                    return '<img class="rounded-circle" height="70px;" src="'.asset($data->image ?? get_static_option('no_image')).'" width="70px;" class="rounded-circle" />';
                })->addColumn('action', function($data) {
                    return '<a href="'.route('backend.user.edit', $data).'" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                    <button class="btn btn-danger" onclick="delete_function(this)" value="'.route('backend.user.destroy', $data).'"><i class="fa fa-trash"></i> </button>';
                })
                ->rawColumns(['status','image','action'])
                ->make(true);
        }else{
            return view('backend.user.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
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
            'name'      =>  'required|string',
            'email'     =>  'required|email|unique:users,email',
            'phone'     =>  'nullable|string',
            'password'  =>  'required|string|min:4',
            'status'    =>  'required|boolean',
            'image'     =>  'required|image',
        ]);
        $user = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     =  bcrypt($request->password);;
        $user->is_active    = $request->status;
        $user->save();

        $more_user_info = new MoreUserInfo();
        $more_user_info->user_id = $user->id;
        if($request->hasFile('image')){
            $image             = $request->file('image');
            $folder_path       = 'uploads/images/user/avatar/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->save($folder_path.$image_new_name);
            $more_user_info->avatar = $folder_path.$image_new_name;
        }
        $more_user_info->avatar = $request->avatar;
        $more_user_info->phone = $request->phone;
        $more_user_info->save();

        return back()->withSuccess('Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'avatar' => 'nullable|image',
            'phone' => 'nullable',
            'address' => 'nullable',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
            'map' => 'nullable',
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,'.$user->id
        ]);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password =  bcrypt($request->password);;

        $userMoreInfo=$user->moreInfo;

        if($userMoreInfo){
            $userMoreInfo->phone = $request->phone;
            $userMoreInfo->address = $request->address;
            $userMoreInfo->facebook = $request->facebook;
            $userMoreInfo->twitter = $request->twitter;
            $userMoreInfo->youtube = $request->youtube;
            $userMoreInfo->map = $request->map;
            if($request->hasFile('avatar')){
                if ($userMoreInfo->avatar != null)
                    File::delete(public_path($userMoreInfo->avatar)); //Old image delete
                $image             = $request->file('avatar');
                $folder_path       = 'uploads/images/user/avatar/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                $userMoreInfo->avatar = $folder_path.$image_new_name;
            }
        }else{
            $userMoreInfo = new MoreUserInfo();
            $userMoreInfo->phone = $request->phone;
            $userMoreInfo->address = $request->address;
            $userMoreInfo->facebook = $request->facebook;
            $userMoreInfo->twitter = $request->twitter;
            $userMoreInfo->youtube = $request->youtube;
            $userMoreInfo->map = $request->map;
            $userMoreInfo->user_id = $user->id;
            if($request->hasFile('avatar')){
                $image             = $request->file('avatar');
                $folder_path       = 'uploads/images/user/avatar/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                $userMoreInfo->avatar = $folder_path.$image_new_name;
            }
        }

        try {
            $user->save();
            $userMoreInfo->save();
            return back()->withSuccess('User updated successfully');
        } catch (\Exception $exception) {
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(User::all()->count() <= 1){
            return response()->json([
                'type' => 'error',
                'message' => 'Minimum 1 admin must need for maintain.'
            ]);
        }
        if(auth()->user()->id == $user->id){
            return response()->json([
                'type' => 'error',
                'message' => 'Don\'t try to delete your self.'
            ]);
        }
        try {
            if ($user->image != null)
                File::delete(public_path($user->image)); //Old image delete
            $user->delete();
            return response()->json([
                'type' => 'success',
                'message' => ''
            ]);
        }catch (\Exception$exception){
            return response()->json([
                'type' => 'error',
                'message' => ''
            ]);
        }
    }
}
