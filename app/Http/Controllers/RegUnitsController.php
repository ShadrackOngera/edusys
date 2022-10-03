<?php

namespace App\Http\Controllers;

use App\Models\RegUnit;
use App\Models\Unit;
use Illuminate\Http\Request;

class RegUnitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $units = Unit::orderBy('updated_at', 'DESC')->paginate(15);

        return view('student.register')->with('units', $units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_id' => 'required',
            'programme' => 'required',
            'unit' => 'required',
            'description' => 'required',
            'score' => ['min:1',],
        ]);


//        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $unit = RegUnit::create([
            'programme' => $request->input('programme'),
            'unit' => $request->input('unit'),
            'description' => $request->input('description'),
            'unit_id' => $request->input('unit_id'),
            'score' => $request->input('score'),
            'user_id' => auth()->user()->id,
        ]);



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        RegUnit::where('id', $id)
            ->update([
                'unit_id' => $request->input('unit_id'),
                'programme' => $request->input('programme'),
                'unit' => $request->input('unit'),
                'description' => $request->input('description'),
                'score' => $request->input('score'),
            ]);


        return redirect()->back()->with('message', 'Your Post has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = RegUnit::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Your Post has been Deleted');
    }
}
