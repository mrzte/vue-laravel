<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lembaga;
use App\User;
use App\Kota;
use App\Provinsi;
use Illuminate\Support\Facades\Auth;
class LembagaProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user()->kode;
        $data = Lembaga::where('kode',$user)->select('*')->first();
        return response()->json($data);

        // $data = Lembaga::join('users','users.kode','=','pdpt_detail.kode')->get();
        // return view('layouts.user')->with('lembaga',$data);
        // dd($data);
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
        //
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
        $data = Lembaga::findOrFail($id);
        $this->validate($request,
        [
            'nama' => 'required|string|max:200',
            'email' => 'sometimes|string|max:200|unique:users,email,'
            .$data->id,
            'phone' => 'sometimes|max:20|unique:users,phone,'.$data->id,
            'alamat' => 'sometimes|string|max:200',
            'logo' => 'sometimes',
            'kode' => 'sometimes|max:8',
            // 'kota' => 'sometimes|integer',
            // 'provinsi' => 'sometimes|integer',
            'kode_pos' => 'sometimes|max:8',
            'kontak' => 'sometimes|max:8',
        ]);
        
        $potosaacana = $data->logo;
        if($request->logo != $potosaacana){
            $name = time().'.' . explode('/', explode(':', substr($request->logo, 0, strpos
            ($request->logo, ';')))[1])[1];
            \Image::make($request->logo)->save(public_path('img/logo/').$name);
            $request->merge(['logo' => $name]);
            $userPhoto = public_path('img/profile/').$potosaacana;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }
        $data->update($request->all());

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
