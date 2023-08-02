<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('can:admin.tags.index')->only('index');
         $this->middleware('can:admin.tags.create')->only('create', 'store');
         $this->middleware('can:admin.tags.edit')->only('edit', 'update');
         $this->middleware('can:admin.tags.destroy')->only('destroy');
     }
 
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors =
        [
            'red' =>'Color rojo',
            'yellow' =>'Color amarillo',
            'green' =>'Color verde',
            'blue' =>'Color azul',
            'indigo' =>'Color indigo',
            'pink' =>'Color rosa'
        ];
        return view('admin.tags.create',compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:tags',
            'color'=>'required',

        ]);

       $tag = Tag::create($request->all());

       return redirect()->route('admin.tags.edit',compact('tag'))->with('info','La etiqueta se creo con exito');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $colors =
        [
            'red' =>'Color rojo',
            'yellow' =>'Color amarillo',
            'green' =>'Color verde',
            'blue' =>'Color azul',
            'indigo' =>'Color indigo',
            'pink' =>'Color rosa'
        ];
        return view('admin.tags.edit',compact('tag','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:tags,slug, $tag->id",
            'color'=>'required',

        ]);

        $tag->update($request->all());
        return redirect()->route('admin.tags.edit',$tag)->with('info','La etiqueta se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info','La etiqueta se elimino con exito');
    }
}
