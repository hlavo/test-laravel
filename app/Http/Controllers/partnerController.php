<?php

namespace App\Http\Controllers;
use File;
use App\Http\Requests\saveImg;
use App\Services\UploadService;
use Illuminate\Http\Request;

class partnerController extends Controller
{
    /**
     * partnerController constructor.
     */
    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = \App\Partner::all();
        return view('admin.partner.index')->withPartners($partners);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveImg $request)
    {
        $partner = \App\Partner::create($request->all());
        $this->upload->saveFile($partner, $request->file('img'));
        return redirect()->route('admin.partneri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = \App\Partner::findOrFail($id);
        return view('admin.partner.single')->withPartner($partner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = \App\Partner::findOrFail($id);
        return view('admin.partner.edit')->withPartner($partner);
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
        $partner = \App\Partner::findOrFail($id);
        $partner->update($request->all());

        if($request->file('img')){
            $file = $partner->files;

            if($file && isset($file[0])){
                $path = public_path("img/partners/$id");
                File::deleteDirectory($path);
                $file[0]->delete();
            }

            $this->upload->saveFile($partner, $request->file("img"));
        }

        return redirect()->route('admin.partneri.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = \App\Partner::findOrFail($id);
        $files =  $partner->files;
        foreach($files as $file){
            $path = getPathToPartner($id,$file->filename,true);
            $a = File::delete($path);
            $file->delete();
        }
        $partner->delete();
        return redirect()->route('admin.partneri.index');
    }
}
