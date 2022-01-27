<?php

namespace App\Http\Controllers;

use App\Models\Instant;
use App\Models\User;
use App\Http\Requests\StoreInstantRequest;
use App\Http\Requests\UpdateInstantRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class InstantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instantForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'img' => $request->img,
            'user_id' => Auth::user()->id,
        ];
        Instant::create($data);
        return redirect(route('landing'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instant  $instant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instant = Instant::find($id);
        return view('instantShow', ['instant'=>$instant, 'commentators'=>$instant->commentators()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instant  $instant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instantToEdit = Instant::findOrFail($id);
        if(!Auth::user()->isAuthor($instantToEdit)) return back();
        
        return view('instantEdit', ['instant'=>$instantToEdit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstantRequest  $request
     * @param  \App\Models\Instant  $instant
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $instantToUpdate = Instant::findOrFail($id);
        $data = [
            'title' => $request->title,
            'img' => $request->img,
        ];
        $instantToUpdate->update($data);

        return redirect(route('landing'));//try with back()
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instant  $instant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instantToDelete = Instant::findOrFail($id);
        if(!Auth::user()->isAuthor($instantToDelete)) return back();
        
        $instantToDelete->delete();
        return back();
    }
}
