<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Pertanyaan;
class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pertanyaan')
        ->join('indikator', 'indikator.id_indikator', 'pertanyaan.id_indikator')
        ->join('pertanyaan_jenis', 'pertanyaan_jenis.id_jenis', 'pertanyaan.jenis')
        ->select('pertanyaan.pertanyaan','pertanyaan.petunjuk','pertanyaan.id_pertanyaan',
        'pertanyaan.jenis',
        'pertanyaan_jenis.uraian','pertanyaan.urutan','pertanyaan.id_indikator','indikator.indikator')
        ->paginate(8);
      return response()->json($data); 
    }

    public function index2 (){
        $data = Pertanyaan::select('*')->orderBy('pertanyaan.urutan','asc' )->get();
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
        $this->validate(
            $request,
              [
              'pertanyaan' => ['required', 'string', 'max:255','unique:pertanyaan'],
              'petunjuk' => ['required', 'string', 'max:255'],
              // 'foto' => ['required','string','max:90'],
              'urutan' => ['required','integer','max:90'],
              'id_indikator' => ['required','integer',],
              'jenis' => ['required', 'integer'],
              
          ]);
          return Pertanyaan::create($request->all());
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
    public function update(Request $request,$id_pertanyaan)
    {
        $data = Pertanyaan::findOrFail($id_pertanyaan);
        
        $this->validate($request,
        [
    
            'pertanyaan' => 'required|string|unique:pertanyaan,pertanyaan,'.$data->id,
            'id_indikator' => 'sometimes',
            'petunjuk' => 'required|string|max:200|unique:pertanyaan,petunjuk,'
            .$data->id,
            // 'kontak' => 'required|string|max:200',
            // 'phone' => 'sometimes|integer|max:20|unique:users,phone,'.$user->id,
            'jenis' => 'required',
            'urutan' => 'required|unique:pertanyaan,urutan,'.$data->id,
            // 'provinsi' => 'required|integer',
            // 'kota' => 'required|integer',

        ]);
        
        $data->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pertanyaan::findOrFail($id)->delete();
    }
}
