<?php

namespace App\Http\Controllers;

use App\Models\Lostitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LostitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except'=> 'index']);
    }

    public function index()
    {
        // $lostitems=Lostitem::orderBy('id', 'desc')->paginate(5);
        $lostitems=Lostitem::where('status', 0)->get();

        return view('lostitems.index', compact('lostitems'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lostitems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data=request()->validate([
        //     'whats_lost'=>'',
        //     'tod'=>'',
        //     'nod'=>'',
        //     'where'=>'',
        //     'description'=>''
        // ]);


        // $lostitem=Lostitem::create($data);
        // Session::flash('Success', 'The post was created successfully!');
        // return redirect()->route('lost_items.create');

        $request->validate([
            'whats_lost'=>'required',
            'tod'=>'',
            'nod'=>'',
            'where'=>'required',
            'description'=>'',
        ]);

        // $lostitem=Lostitem::create
        // ([
        //    'whats_lost'=>$request->input('whats_lost'),
        //    'tod'=>$request->input('tod'),
        //    'nod'=>$request->input('nod'),
        //    'where'=>$request->input('where'),
        //    'description'=>$request->input('description'),

        // ]);

        $lostitem = new Lostitem;

        $lostitem->whats_lost = $request->whats_lost;
        $lostitem->tod = $request->tod;
        $lostitem->nod=$request->nod;
        $lostitem->where=$request->where;
        $lostitem->description=$request->description;
        $lostitem['user_id'] = Auth::user()->id;
        $lostitem->finder=$request->finder;
        $lostitem->save();
        return redirect()->route('lost_items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lostitem  $lostitem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lostitem=Lostitem::find($id);
        return view('lostitems.show', compact('lostitem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lostitem  $lostitem
     * @return \Illuminate\Http\Response
     */
    public function edit(Lostitem $lostitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lostitem  $lostitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lostitem $lostitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lostitem  $lostitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lostitem $lostitem)
    {
        //
    }

    public function changeStatus($id){
        $getStatus = Lostitem::select('status')->where('id',$id)->first();
        if($getStatus->status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $finder = Auth::user()->id;
        Lostitem::where('id',$id)->update(['status'=>$status, 'finder'=>$finder]);
        return redirect()->back();
    }

    // $claimer = Auth::user()->id;
    //     Founditem::where('id',$id)->update(['status'=>$status, 'claimed_by'=>$claimer]);
    //     return redirect()->back();
}
