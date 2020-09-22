<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\file;
use App\Wp;
use Alert;
use DB;
use paginate;
class wajibpajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Wp::get();
        return view('wajibpajak.index' ,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('wajibpajak.create');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {		


    	$this->validate($request, [
    		'Nama' => 'required',
    		'NPWP' => 'required|unique:wajibpajak|numeric',
    		'Lemari' => 'required',
    		'No_urut' => 'required',
    	]);
     $data = Wp::create([
        'Nama' => $request->Nama,
        'NPWP' => $request->NPWP,
        'Lemari' => $request->Lemari,
        'No_urut' => $request->No_urut,
    ]);

     Alert::success('Berhasil.','Data telah ditambahkan!');
     return redirect()->route('wajibpajak.index');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cari = $request->cari;
        $wp = DB::table('wajibpajak')
        ->where('NPWP','like',"%".$cari."%")
        ->paginate();

        return view('wajibpajak.index',['wp' => $wp]);
    }

    public function cari(Request $request){



     $cari = $request->NPWP;
     $cari2 = Wp::where('NPWP',$request->NPWP)->count();
     $kos="";
     if($cari2>0){
         $kos = "Data Ada";

     }else {
        $kos = "<h3 style='text-align: center;color: red;''>
         Data Tidak Ditemukan
         </h3>";
         return $kos;
     }
     $data = DB::table('wajibpajak')
     ->where('NPWP','like',"%".$cari."%")->paginate();

     return view('wajibpajak.cari',compact('data','kos'));
       // return $kos;

 }

 public function modal(){
    return view('layouts.modal');
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
        $data = Wp::findOrFail($id);
        return view('wajibpajak.edit',compact('data'));
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
        $data =  Wp::find($id)->update([
            'Nama' => $request->Nama,
            'NPWP' => $request->NPWP,
            'Lemari' => $request->Lemari,
            'No_urut' => $request->No_urut,
        ]);
        Alert::success('Berhasil.','Data telah diupdate!');
        return redirect()->route('wajibpajak.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wp::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('wajibpajak.index');
    }
}
