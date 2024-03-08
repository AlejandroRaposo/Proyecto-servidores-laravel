<?php

namespace App\Http\Controllers;

use App\Models\Novela;
use App\models\Autor;
use App\models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class novelaController extends Controller
{
    public function index()
    {
        // Cargamos todas las novelas
        $lista_novelas = novela::all();
        $usuarios = User::with('autores')->get();
        
        // Vuelve a la vista y envia los datos compactados
        return view('novelas.index',compact('lista_novelas','usuarios'));
    }

    public function create(){
        return view('novelas.create');
    }

    /**
     * Esta es la funcion que vamos a llamar cuando queramos añadir una novela que
     * recibe los datos de un formulario y despues redirecciona al indice.
     */
    public function store(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'nombre'=> 'required|max:200|min:5',
            'descripcion'=> 'required|max:200|min:2',
            'categoria' => 'required|max:200|min:2',
            'edad_minima' => 'required|min:1|max:120',
        ]);

        novela::create($request->all());
        return redirect()->route('novelas.index')->with('success','novela añadida');
    }

    /**
     * 
     * */
    public function show(string $id)
    {
       
        $novela =  novela::find($id);
        $usuarios = User::with('autores')->get();
        return view('novelas.show', compact('novela','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'nombre'=> 'required|max:200|min:5',
            'descripcion'=> 'required|max:200|min:2',
            'categoria' => 'required|max:200|min:2',
            'edad_minima' => 'required|min:1|max:120',
        ]);
        
        // Cargamos la novela a modificar
        $novela = novela::find($id);

        // Modifica la novela en bd
        $novela->update($request->all());
        

        return redirect()->route('novelas.index')->with('success','novela modificada');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $novela = novela::find($id);
        $novela->delete();
        return redirect()->route('novelas.index')->with('success','novela eliminada');
    }

    

      public function edit($id){
        $novela = novela::find($id);
        return view('novelas.edit',compact('novela'));
    }


    public function showNovelasAutor(string $id)
    {
        $lista_novelas =  novela::where("autores_autor_id",$id)->get();
        $usuarios = User::with('autores')->get();
        return view('novelas.index',compact('lista_novelas','usuarios'));
    }

}
