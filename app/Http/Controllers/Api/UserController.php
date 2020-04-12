<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Lembaga;
use DataTables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function index()
    {
        // $user = User::with('lembaga')->select('*')->paginate(5);
        $user = User::join('pdpt_detail', 'pdpt_detail.kode', '=', 'users.kode')
       ->select('users.*','pdpt_detail.nama');
       return Datatables::of($user)->make(true);
        // return DataTables::of(User::query())->make(true);
        
    }

    public function skuy()
    {
        return view('layouts.pengguna');
    }

    public function lembaga()
    {
        // $user = User::with('lembaga')->select('*')->paginate(5);
        $user = User::join('pdpt_detail', 'pdpt_detail.kode', '=', 'users.kode')
        ->join('kota', 'kota.id', '=', 'pdpt_detail.kota')
        ->join('provinsi', 'provinsi.id', '=', 'kota.province_id')
       ->select('users.*','provinsi.provinsi','kota.kota','pdpt_detail.*')
       ->paginate(10);
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
          $request,
            [
            'name' => ['required', 'string', 'max:255','unique:users'],
            'username' => ['required', 'string', 'max:255'],
            // 'foto' => ['required','string','max:90'],
            'level' => ['required','string','max:90'],
            'kode' => ['required','integer','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        return User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'photo' => $request['photo'],
            'level' => $request['level'],
            'kode' => $request['kode'],
            'email' => $request['email'],
            'phone' => $request['phone'],
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        
        $this->validate($request,
        [
            'name' => 'required|string|max:200,name'.$user->id,
            'username' => 'required|string|max:200,username'.$user->id,
            'email' => 'required|string|max:200|unique:users,email,'
            .$user->id,
            'level' => 'required|string|max:200',
            'phone' => 'required|max:20|unique:users,phone,'.$user->id,
            'kode' => 'required','integer','unique:users,kode,'.$user->id,
            'password' => 'sometimes|min:8'
        ]);
        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }
        $user->update($request->all());
    }
    public function profile()
    {
        return auth('api')->user();
    }

    public function lembagaprofile()
    {
        return auth('api')->user();
    }

    public function updateProfile(Request $request)
    {
    
        $user = auth('api')->user();
        $this->validate($request,
        [
            'name' => 'required|string|max:200',
            'email' => 'required|string|max:200|unique:users,email,'
            .$user->id,
            'phone' => 'sometimes|max:20|unique:users,phone,'.$user->id,
            'level' => 'required|string|max:200',
            'photo' => 'required|string',
            'password' => 'sometimes|min:8'
        ]);
        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }
        $potosaacana = $user->photo;
        if($request->photo != $potosaacana){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos
            ($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('img/profile/').$name);
            $request->merge(['photo' => $name]);
            $userPhoto = public_path('img/profile/').$potosaacana;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }
        $user->update($request->all());
        // return ['message' => 'nyobaan hela cuy'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        $user = User::findOrFail($id);
        $user->delete();
    }
}
