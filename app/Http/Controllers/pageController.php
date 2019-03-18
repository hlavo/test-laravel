<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;

class pageController extends Controller
{
    public function index()
    {
        $books = \App\Book::all();
        return view('pages.home')->with("books",$books);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function gallery()
    {
        $gallery = \App\Gallery::all();
        return view('pages.gallery')->withGallerys($gallery);
    }

    public function references()
    {
        $text = Session::get('applocale') ? "text_".Session::get('applocale') : 'text_cs';
        $references = \App\Reference::all();
        return view('pages.references')->withReferences($references)->withText($text);
    }

    public function services()
    {
        return view('pages.services');
    }

//    public function shop()
//    {
//        return view('pages.shop');
//    }

    public function partners()
    {
        $parnters = \App\Partner::all();
        return view('pages.partners')->withPartners($parnters);
    }

    public function galleryShow($id)
    {
        $gallery = \App\Gallery::findOrFail($id);
        return view('pages.gallerySingle')->withGallery($gallery);
    }

    public function galleryForm($id)
    {
        return view('pages.galleryForm')->withId($id);
    }

    public function galleryRequestForm(Request $request)
    {
        $id = $request->get("id");
        $password = $request->get("password");
        $gallery = \App\Gallery::findOrFail($id);
        if($gallery->password===$password){
            \Session::put('galerie',$password);
            return redirect()->route('gallery.show',$id);
        }
        return redirect()->back()->withErrors(["password"=>"Nesprávne heslo"]);
    }

    public function downloadZip($id)
    {
        $gallery = \App\Gallery::findOrFail($id);
        $zipPath = getPathToZipFile($id);
        return response()->download($zipPath);
    }


}
