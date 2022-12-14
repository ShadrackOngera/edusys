<?php

namespace App\Http\Controllers;

use App\Models\RegUnit;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
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
    public function index(){
        //units page

        $units = Unit::orderBy('updated_at', 'DESC')->paginate(15);
        return view('student.units')->with('units', $units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //add a unit to the system


        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'programme' => 'required',
            'unit' => 'required',
            'description' => 'required',
        ]);

//        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $unit = Unit::create([
            'programme' => $request->input('programme'),
            'unit' => $request->input('unit'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/admin');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $unit = Unit::where('id', $id)->first();
        return view('admin.unit.edit')->with('unit', $unit);
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
        Unit::where('id', $id)
            ->update([
                'programme' => $request->input('programme'),
                'unit' => $request->input('unit'),
                'description' => $request->input('description'),
                'user_id' => auth()->user()->id,
            ]);

        return redirect('/admin/units');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $unit = Unit::where('id', $id)->delete();

        return redirect()->back();
    }
}
