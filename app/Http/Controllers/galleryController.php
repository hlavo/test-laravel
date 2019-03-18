<?php

namespace App\Http\Controllers;

use Chumper\Zipper\Facades\Zipper;
use App\Http\Requests\saveGallery;
use App\Services\UploadService;
use Illuminate\Http\Request;
use File;

class galleryController extends Controller
{
    /**
     * galleryController constructor.
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
        $galleries = \App\Gallery::all();
        return view('admin.gallery.index')->withGalleries($galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveGallery $request)
    {

        $gallery = \App\Gallery::create($request->all());

        foreach($request->file("img") as $key=>$img){
            $this->upload->saveFile($gallery, $img, $key);
        }

        $this->editOrCreateZipFile($gallery->id);

        return redirect()->route('admin.galerie.show',$gallery);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = \App\Gallery::findOrFail($id);
        return view('admin.gallery.single')->withGallery($gallery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = \App\Gallery::findOrFail($id);
        return view('admin.gallery.edit')->withGallery($gallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(saveGallery $request, $id)
    {
        $gallery = \App\Gallery::findOrFail($id);
        $gallery->update($request->except('delete'));

        if($request->get('delete')){
            $deleteItems = $request->get('delete') ? $request->get('delete') : [];
            foreach($deleteItems as $item){
                $file = \App\File::find($item);
                if($file){
                    $path = getPathToGallery($id,$file->filename,false,true);
                    File::delete($path);
                }
                $file->delete();
            }
        }
        if($request->file('img') && !empty($request->file('img')[0])){
            File::deleteDirectory(public_path("img/gallerys/$id"));
            foreach($request->file("img") as $key=>$img){
                $this->upload->saveFile($gallery, $img, $key);
            }
        }

        $this->editOrCreateZipFile($id);

        return redirect()->route('admin.galerie.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = \App\Gallery::findOrFail($id);
        $files = $gallery->files->toArray();
        if($files){
            $ids = array_map(function($item){
                return $item['id'];
            },$files);
            $remove =\App\File::destroy($ids);
        }
        File::deleteDirectory(storage_path("app/gallerys/$id"));
        File::deleteDirectory(storage_path("app/zip/$id"));
        File::deleteDirectory(public_path("img/gallerys/$id"));
        $gallery->delete();
        return redirect()->route('admin.galerie.index');
    }

    private function editOrCreateZipFile($id){
        $zipPath = getPathToZipFile($id);
        if(file_exists($zipPath)){
            File::deleteDirectory(storage_path("app/zip/$id"));
        }
        $files = glob((storage_path("app/gallerys/$id")."/*"));
        Zipper::make($zipPath)->add($files);
    }

}
