<?php

namespace App\Http\Controllers;
use File;
use App\Http\Requests\saveImg;
use App\Services\UploadService;
use Illuminate\Http\Request;

class bookController extends Controller
{
    /**
     * bookController constructor.
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
        $books = \App\Book::all();
        return view('admin.book.index')->withBooks($books);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveImg $request)
    {
        $book = \App\Book::create(["status"=>1]);
        $this->upload->saveFile($book, $request->file('img'));
        return redirect()->route('admin.swiper-kniha.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = \App\Book::findOrFail($id);
        return view('admin.book.single')->withBook($book);
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
        $book = \App\Book::findOrFail($id);
        $files =  $book->files;
        foreach($files as $file){
            $path = getPathToBook($id,$file->filename,true);
            $a = File::delete($path);
            $file->delete();
        }
        $book->delete();
        return redirect()->route('admin.swiper-kniha.index');
    }
}
