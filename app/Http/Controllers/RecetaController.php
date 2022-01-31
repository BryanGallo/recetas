<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //vertic que se haya realizado la autentificacion
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Capturar el id del usuarioo autentificado
        //Auth::user()->userRecetas->dd();//dependiendo de la informacion del usuario autentificado
        $userRecetas = Auth::user()->userRecetas;
        // return 'Bienvenido';
        return view('recetas.index')->with('userRecetas',$userRecetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $categorias=DB::table('categorias')->get()->pluck('nombre','id');
        // $categorias=Categoria::all()->dd();
        $categorias=Categoria::all(['id','nombre']);
        return view('recetas.create')->with('categorias',$categorias);
        //create carga formulario
        //consulta
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        //dd($request['img']->store('upload-recetas','public'));//base de datos de imagenes propias de laravel
        //validaciones
        $data = request()->validate([
            'nombre' => 'required|min:6',
            'categoria'=> 'required',
            'ingredientes'=>'required',
            'preparacion'=>'required',
            'img'=>'required|image',

        ]);

        //variable
        $ruta_imagen=($request['img']->store('upload-recetas','public'));

        //redimensionar imagen
        // $img=Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000,50);

        //guaradr en el disco duro del servidor
        // $img->save();
        //almacenar en la base de datos
        DB::table('recetas')-> insert([
            'nombre' =>$data['nombre'],
            'ingredientes'=>$data['ingredientes'],
            'preparacion'=>$data['preparacion'],
            'imagen'=> $ruta_imagen,
            'user_id'=>Auth::user()->id,//obtener el id del usuario que esta logeado
            'categoria_id'=>$data['categoria'],

        ]);
        return redirect()-> action([RecetaController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
