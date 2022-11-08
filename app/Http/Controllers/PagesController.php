<?php

namespace App\Http\Controllers;

use App\Models\Lostitem;
use App\Models\Founditem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function index()
    {
        $founditems=Founditem::where('status', '0')->orderBy('id', 'desc')->limit(8)-> get();
        $lostitems=Lostitem::where('status', '0')->orderBy('id', 'desc')->limit(8)-> get();
        return view('pages.index', compact('lostitems', 'founditems'));

        // return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function myPosts()
    {

        $lostitems = Lostitem::where('user_id', Auth::id())->get();
        $founditems = Founditem::where('user_id', Auth::id())->get();

        return view('pages.show', compact('lostitems', 'founditems'));
    }
}
