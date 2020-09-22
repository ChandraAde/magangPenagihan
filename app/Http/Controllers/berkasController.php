<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wp;
use App\file;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
class berkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = file::get();
        return view('berkas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data2 = Wp::all();
       $data = file::all();
       return view('berkas.create', compact("data", "data2"));
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
            'title' => 'nullable|max:100',
            'file' => 'required|file|max:2000', // max 2MB
        ]);
        $uploadedFile = $request->file('file'); 
        $path = $uploadedFile->store('public/files');
        $data = file::create([
            'id_wp' => $request->id_wp,
            'jenis_dok' => $request->jenis_dok,
            'nomor_ketetapan' => $request->nomor_ketetapan,
            'no_dok' => $request->no_dok,
            'tittle' => $request->title ?? $uploadedFile->getClientOriginalName(),
            'filename' => $path
        ]);

        Alert::success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('berkas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $dl = file::find($id);
     return Storage::download($dl->filename, $dl->tittle);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dl = file::find($id);
        $hapus = Storage::delete($dl->filename);
        alert()->success('Berhasil.','Data telah dihapus!');
        $dl2 = file::find($id)->delete();
        return redirect()->route('berkas.index',compact("hapus"));
    }
}
