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
        Indikator::updateOrCreate(
            [
                'id' => $request->id_indikator],
                [
                    'id_pilar' => $request->id_pilar, 
                    'indikator' => $request->indikator
                ]);        
   
        return response()->json(['success'=>'Product saved successfully.']);
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
        // $data = Indikator::findOrFail($id_indikator);
        
        // $this->validate($request,
        // [
    
        //     'id_pilar' => 'sometimes',
        //     'indikator' => 'sometimes',
        //     'definisi' => 'sometimes',
        //     .$data->id,
            

        // ]);
        
        // $data->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_indikator)
    {

        Indikator::find($id_indikator)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
