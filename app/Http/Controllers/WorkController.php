<?php

namespace App\Http\Controllers;

use App\Field;
use App\Work;
use App\Author;
use App\Jury;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    use GuardHelpers;
    protected $author;

    public function __construct(Author $author, Jury $jury){
        $this->author = $author;
        $this->jury = $jury;
    }
    public function shows()
    {
        $works = Work::all();

        return view('newlayout', compact('works'));
    }
    public function getWorks()
    {
        $works = Work::all();
        $juries_works = DB::table('jury_work')->join('juries', 'jury_work.jury_id', '=', 'juries.id')->get();
        $authors_works = DB::table('author_work')->join('authors', 'author_work.author_id', '=', 'authors.id')->get();

        return view('admin', compact('works', 'authors_works', 'juries_works'));
    }

    public function getWork($work)
    {
        $works = Work::find($work);
        $juries = DB::table('jury_work')->join('juries', 'jury_work.jury_id', '=', 'juries.id')->where('work_id', '=', $works->id )->get();
        $authors = DB::table('author_work')->join('authors', 'author_work.author_id', '=', 'authors.id')->where('work_id', '=', $works->id)->get();
        
        return view('work', compact('works', 'juries', 'authors'));
    }

    public function createForm()
    {
        $fields = Field::all();
        return view('create', compact('fields'));
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
            
            if((Storage::disk('s3')->put($name, file_get_contents($file))))
            {
                //$user = Auth::user()->id;

                $work->title        = $request->get('title');
                $work->description  = $request->get('description');
                $work->field_id = $request->get('field');
                $work->year         = $request->get('year');
                $work->filename = $name;
                //$work->creator_id   = $user;
                if($work->save())
                {   $authors = $request->get('authors');
                    $jurys = $request->get('jury');

                    foreach ($authors as $authorcriar)
                    {   $authorUppercase = strtoupper($authorcriar);
                        $findAuthor = Author::where('name', '=', $authorUppercase)->first();
                        if($findAuthor == null){
                            $authorId = DB::table('authors')->insertGetId([
                                'name' => $authorUppercase
                            ]);

                            $author_work = DB::table('author_work')->insert([
                                'author_id' => $authorId,
                                'work_id' => $work->id
                            ]);
                    }
                    else{
                            $author_work = DB::table('author_work')->insert([
                                'author_id' => $findAuthor->id,
                                'work_id' => $work->id
                        ]);
                    }
                    }

                    foreach ($jurys as $jurycriar)
                    {   $juryUppercase = strtoupper($jurycriar);
                        $findJury = Jury::where('name', '=', $juryUppercase)->first();
                        if($findJury == null){
                            $juryId = DB::table('juries')->insertGetId([
                                'name' => $juryUppercase
                            ]);

                            $jury_work = DB::table('jury_work')->insert([
                                'jury_id' => $juryId,
                                'work_id' => $work->id
                            ]);
                    }
                    else{
                            $jury_work = DB::table('jury_work')->insert([
                                'jury_id' => $findJury->id,
                                'work_id' => $work->id
                        ]);
                    }
                    }
                    return redirect('/admin')->with('success', 'Cadastrado com sucesso.');
                }
                else
                {
                return redirect('/admin')->with('alert', 'Erro ao salvar no banco de dados..');
                }
            }
            else
            {
            return redirect('/admin')->with('alert', 'Erro ao enviar o arquivo para o s3.');
            }
        }
        else
        {
            return redirect('/admin')->with('alert', 'Erro com o arquivo.');
        }

        
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
            Storage::delete($work->filename);
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            Storage::disk('s3')->put($name, file_get_contents($file));
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
        return $file = Storage::download($filename); 
    }

    public function deleteWork($work)
    {
        $works = Work::find($work);
        $excluirArquivo = Storage::delete($works->filename);
        if ($excluirArquivo) {
            if($works->delete())
            {
                return redirect('/')->with('success','TCC deletado!');
            }
            else
            {
                return redirect('/')->with('alert','Não foi possível deletar o TCC do banco de dados.');
            }
        }
        else
            return redirect('/')->with('alert','Não foi possível deletar o TCC do s3.');
    }
}
