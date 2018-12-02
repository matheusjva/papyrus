<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    use GuardHelpers;

    public function shows()
    {
        $works = Work::all();
        return view('index2', compact('works'));
    }
    public function getWorks()
    {
        $works = Work::all();
        return view('index', compact('works'));
    }

    public function getWork()
    {
    }

    public function createForm()
    {
        return view('create');
    }

    public function createWork(Request $request, Work $work)
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

        return redirect('/')->with('success', 'Cadastrado com sucesso.');
    }

    public function updateForm($id)
    {
        $work = Work::find($id);
        return view('editForm', compact('work'));
    }

    public function updateWork(Request $request, $id)
    {
        $work = Work::find($id);

        if($request->hasfile('filename'))
        {
            unlink(public_path()."/works/$work->filename");

            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/works/', $name);

            $work->filename = $name;
        }

        //$user = Auth::user()->id;

        $work->title        = $request->get('title');
        $work->description  = $request->get('description');
        $work->authors      = $request->get('authors');
        $work->year         = $request->get('year');
        $work->jury         = $request->get('jury');

        //$work->creator_id   = $user;
        $work->save();

        return redirect('/')->with('success', 'TCC editado com sucesso.');    }

    public function download($filename)
    {
        $file = public_path()."/works/$filename";
        $header = array(
            'Content-Type: application/pdf',
        );
        return response()->download($file, $filename, $header);
    }

    public function deleteWork($work)
    {
        $works = Work::find($work);
        if (unlink(public_path()."/works/$works->filename")) {
            $works->delete();
            return redirect('/')->with('success','TCC deletado!');
        }
        else
            return redirect('/')->with('alert','Não foi possível deletar o TCC!');
    }
}
