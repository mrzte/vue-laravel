<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Pilar;
use App\Indikator;
use DataTables;
class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('indikator')
        ->join('pilar','pilar.id_pilar','=','indikator.id_pilar')
        ->select('indikator.*','pilar.pilar')->paginate(10); 
        return response()->json($data);
    }

    public function index2 ()
    {
        $data = DB::table('indikator')
        ->join('pilar','pilar.id_pilar','=','indikator.id_pilar')
        ->select('indikator.*','pilar.pilar')->get(); 
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function skuy()
    {
        $pilar = Pilar::all();
        return view('layouts.indikator')->with('pilar',$pilar);
    }

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
              'indikator' => ['required', 'string', 'max:255','unique:indikator'],
              'id_pilar' => ['required', 'integer', 'max:255'],
              'definisi' => ['required','string','max:90'],
              
          ]);
          return Indikator::create($request->all());
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
        $data = Indikator::find($id);
        return response()->json($data);
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
        $data = Indikator::findOrFail($id);
        
        $this->validate($request,
        [
    
            'indikator' => 'required|string|unique:indikator,indikator,'.$data->id,
            'id_pilar' => 'required',
            'definisi' => 'required|string|max:200|unique:indikator,definisi,'
            .$data->id,
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

        Indikator::findOrFail($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
