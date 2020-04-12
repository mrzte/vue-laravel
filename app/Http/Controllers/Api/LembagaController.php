<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lembaga;
use App\Provinsi;
use App\Kota;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
class LembagaController extends Controller
{
    public function __construct()
    {
    
            $this->user = Auth::user();
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
    //     $data = Lembaga::join('kota', 'kota.id', '=', 'pdpt_detail.kota')
    //    ->join('provinsi', 'provinsi.id', '=', 'kota.province_id')
    //    ->select('pdpt_detail.*','provinsi.provinsi','kota.kota')
    //    ->get();
        $data2 = Provinsi::all();
        $data = Lembaga::
        select('pdpt_detail.*')->paginate(10);
        return response()->json($data);
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
    public function update(Request $request,$id)
    {
        $user = Lembaga::findOrFail($id);
        
        $this->validate($request,
        [
            'nama' => 'required|string|max:200,alamat'.$user->id,
            'alamat' => 'sometimes|string|max:200,alamat'.$user->id,
            'email' => 'required|string|max:200|unique:users,email,'
            .$user->id,
            // 'kontak' => 'required|string|max:200',
            // 'phone' => 'sometimes|integer|max:20|unique:users,phone,'.$user->id,
            'kode' => 'required','integer','unique:users,kode,'.$user->id,
            'logo' => 'sometimes',
            // 'provinsi' => 'required|integer',
            // 'kota' => 'required|integer',

        ]);
        
        $user->update($request->all());
    }

    public function kode($slug)
    {
        return $slug;
    }

    public function lembagaprofile()
    {
        $user = auth('api')->user()->kode;
        $data = Lembaga::where('kode',$user)->get();
        return response()->json($data);
    }

    public function updateProfileLembaga(Request $request)
    {
        $user = auth('api')->user()->kode;
    
        $data = Lembaga::where('kode',$user)->get();
        $this->validate($request,
        [
            'nama' => 'required|string|max:200',
            'email' => 'required|string|max:200|unique:users,email,'
            .$user->id,
            'phone' => 'sometimes|max:20|unique:users,phone,'.$user->id,
            'alamat' => 'required|string|max:200',
            'logo' => 'required|string',
            'kode' => 'sometimes|max:8',
            'kota' => 'sometimes|max:8',
            'provinsi' => 'sometimes|max:8',
            'kode_pos' => 'sometimes|max:8',
            'kontak' => 'sometimes|max:8',
        ]);
        
        $potosaacana = $data->logo;
        if($request->logo != $potosaacana){
            $name = time().'.' . explode('/', explode(':', substr($request->logo, 0, strpos
            ($request->logo, ';')))[1])[1];
            \Image::make($request->logo)->save(public_path('img/profile/').$name);
            $request->merge(['logo' => $name]);
            $userPhoto = public_path('img/profile/').$potosaacana;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }
        $data->update($request->all());
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
        $user = Lembaga::findOrFail($id);
        $user->delete();
    }
}
