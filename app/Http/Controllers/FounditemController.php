<?php

namespace App\Http\Controllers;

use App\Models\Founditem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FounditemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $founditems=Founditem::orderBy('id', 'desc')->paginate(5);

        return view('founditems.index', compact('founditems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('founditems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'whats_found'=>'required',
            'tod'=>'',
            'nod'=>'',
            'where'=>'required',
            'description'=>'',
            'claimed_by'=>'',
            'photo' => 'required|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);



        //  $founditem=Founditem::create
        //  ([
        //     'whats_found'=>$request->input('whats_found'),
        //     'tod'=>$request->input('tod'),
        //     'nod'=>$request->input('nod'),
        //     'where'=>$request->input('where'),
        //     'description'=>$request->input('description'),
        //     'image'=>$newImageName
        //  ]);
         $founditem = new Founditem;

         $founditem->whats_found = $request->whats_found;
         $founditem->tod = $request->tod;
         $founditem->nod=$request->nod;
         $founditem->where=$request->where;
         $founditem->description=$request->description;
         $founditem['user_id'] = Auth::user()->id;

         if ($request->has('photo')) {

            $image = $request->file('photo');
            $newImageName=time().'.'.$image->getClientOriginalName();
            $request->photo->move(public_path('images'), $newImageName);

            $founditem->image = $newImageName;
            }
            $founditem->claimed_by=$request->claimed_by;

         $founditem->save();
         return redirect()->route('found_items.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Founditem  $founditem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $founditem = Founditem::find($id);
        return view('founditems.show', compact('founditem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Founditem  $founditem
     * @return \Illuminate\Http\Response
     */
    public function edit(Founditem $founditem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Founditem  $founditem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Founditem $founditem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Founditem  $founditem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Founditem $founditem)
    {
        //
    }

    public function changeStatus($id){
        $getStatus = Founditem::select('status')->where('id',$id)->first();
        if($getStatus->status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $claimer = Auth::user()->id;
        Founditem::where('id',$id)->update(['status'=>$status, 'claimed_by'=>$claimer]);
        return redirect()->back();
    }
}
