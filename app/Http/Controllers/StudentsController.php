<?php

namespace App\Http\Controllers;

use App\Models\RegUnit;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function homeStudent()
    {



//        $user = User::where('id', '4')->first();
//
//        $user->assignRole('admin');

        return view('student.home');
    }
    public function resultsPage(){
        //results page

        $results = RegUnit::orderBy('updated_at', 'DESC')->where('user_id', auth()->user()->id)->paginate(15);
        return view('student.results')->with('results', $results);
    }

    public function exportPdf(){

        $results = RegUnit::orderBy('updated_at', 'DESC')->where('user_id', auth()->user()->id)->get();
        $pdf = Pdf::loadView('student.pdf',
            [
                'results'=>$results,
            ]);

        return $pdf->download('results.pdf');
    }
}
