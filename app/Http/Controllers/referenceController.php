<?php

namespace App\Http\Controllers;

use App\Services\UploadService;
use Illuminate\Http\Request;
use File;

class referenceController extends Controller
{

    /**
     * referenceController constructor.
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
        $refernces = \App\Reference::all();
        return view('admin.reference.index')->withReferences($refernces);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reference.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reference = \App\Reference::create($request->all());

        if($request->file("img")){
            $this->upload->saveFile($reference, $request->file("img"));
        }

        return redirect()->route('admin.reference.show',$reference);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reference = \App\Reference::findOrFail($id);
        return view('admin.reference.single')->withReference($reference);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reference = \App\Reference::findOrFail($id);
        return view('admin.reference.edit')->withReference($reference);
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
        $reference = \App\Reference::findOrFail($id);
        $reference->update($request->except('delete'));

        if($request->file('img')){
            $file = $reference->files;

            if($file && isset($file[0])){
                $path = public_path("img/references/$id");
                File::deleteDirectory($path);
                $file[0]->delete();
            }

            $this->upload->saveFile($reference, $request->file("img"));
        }

        return redirect()->route('admin.reference.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reference = \App\Reference::findOrFail($id);
        $files = $reference->files->toArray();
        if($files){
            $ids = array_map(function($item){
                return $item['id'];
            },$files);
            $remove =\App\File::destroy($ids);
        }
        File::deleteDirectory(public_path("img/references/$id"));
        $reference->delete();
        return redirect()->route('admin.reference.index');
    }
}
