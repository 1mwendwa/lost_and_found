<?php

namespace App\Http\Controllers;
use App\Models\Founditem;
use App\Models\Lostitem;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $founditems=Founditem::orderby('id', 'desc')->paginate(5);
        $lostitems=Lostitem::orderby('id', 'desc')->paginate(5);
        $users=User::orderby('id', 'desc')->paginate(5);

        $userCount=User::count();
        $foundCount=Founditem::count();
        $lostCount=Lostitem::count();

        return view('admin.index', compact('founditems', 'lostitems', 'users', 'userCount', 'foundCount', 'lostCount'));
    }

    public function users()
    {
        $users=User::orderby('id', 'desc')->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function lostitems()
    {
        $lostitems=Lostitem::orderby('id', 'desc')->paginate(20);

        return view('admin.lostitems', compact('lostitems'));
    }

    public function showLostitem($id)
    {
        $lostitem=Lostitem::where('id', '=', $id)->first();
        return view('admin.showlostitem', compact('lostitem'));
    }

    public function founditems()
    {
        $founditems=Founditem::orderby('id', 'desc')->paginate(20);

        return view('admin.founditems', compact('founditems'));
    }

    public function showFounditem($id)
    {
        $founditem=Founditem::where('id', '=', $id)->first();
        return view('admin.showfound', compact('founditem'));
    }

    public function deleteLostitem($id)
    {
        $lostitem = Lostitem::where('id', '=', $id)->first();
        $lostitem->delete();
        return redirect()->back();
    }

    public function deleteFounditem($id)
    {
        // $founditem=Founditem::find($id);
        $founditem=Founditem::where('id', '=', $id)->first();
        $founditem->delete();
        return redirect()->back();
    }

    public function deleteUser($id)
    {
        // $founditem=Founditem::find($id);
        $user=User::where('id', '=', $id)->first();
        $user->delete();
        return redirect()->back();
    }
}
