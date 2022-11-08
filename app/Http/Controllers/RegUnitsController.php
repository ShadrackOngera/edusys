<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\RegUnit;
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
        $units = Unit::orderBy('updated_at', 'DESC')->with(['regUnit'])->paginate(15);
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
            'score_one' => ['min:1', 'max:30'],
            'score_two' => ['min:1','max:70'],
        ]);


        //        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $unit = RegUnit::create([
            'programme' => $request->input('programme'),
            'unit' => $request->input('unit'),
            'description' => $request->input('description'),
            'unit_id' => $request->input('unit_id'),
            'score_one' => $request->input('score'),
            'score_two' => $request->input('score'),
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
        $request->validate([
            'unit_id' => 'required',
            'programme' => 'required',
            'unit' => 'required',
            'description' => 'required',
            'score_one' => ['min:1', 'max:30'],
            'score_two' => ['min:1','max:70'],
        ]);

        RegUnit::where('id', $id)
            ->update([
                'unit_id' => $request->input('unit_id'),
                'programme' => $request->input('programme'),
                'unit' => $request->input('unit'),
                'description' => $request->input('description'),
                'score_one' => $request->input('score_one'),
                'score_two' => $request->input('score_two'),
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

        $regUnit = RegUnit::where('id', $id)->delete();

        $msg = 'Your Post has been Deleted';
        return redirect()->back()->with('message', $msg);
    }
}
