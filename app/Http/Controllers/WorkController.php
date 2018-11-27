<?php

namespace App\Http\Controllers;

use App\Work;
use http\Env\Response;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    use GuardHelpers;

    public function index()
    {
        $works = Work::all();

        return view('index', compact('works'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request, Work $work)
    {
//        $this->requestValidate(Validator::make($request->all(),[
//            'title' => 'required|sting|max:255',
//            'description' => 'required|string|max:255',
//            'authors' => 'required|string|max:255',
//            'year' => 'required|string|max:4',
//            'jury' => 'required|string|max:255',
//        ]));

        if($request->hasfile('filename'))
        {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/works/', $name);
        }

        //$user = Auth::user()->id;

        $work->title        = $request->get('title');
        $work->description  = $request->get('description');
        $work->authors      = $request->get('authors');
        $work->year         = $request->get('year');
        $work->jury         = $request->get('jury');
        $work->filename = $name;
       //$work->creator_id   = $user;
        $work->save();

        return redirect('/work/create')->with('success', 'Cadastrado com sucesso.');
    }

    public function show()
    {
       $id = Auth::id();

       print_r($id);
    }

    public function download($filename)
    {
        $file = public_path()."/works/$filename";
        $header = array(
            'Content-Type: application/pdf',
        );
        return response()->download($file, $filename, $header);
    }
}
