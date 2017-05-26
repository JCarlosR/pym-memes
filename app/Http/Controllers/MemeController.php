<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemeController extends Controller
{
    public function index() {

    	return view('memes.index');
    }

    public function store(Request $request){
    	
    	$rules = [
            'description' => 'required|string|max:255',
            'image' => 'required|max:255|',
            'user_id' => 'required|integer|unique:users'
    	];

    	$messages = [
    		'description.required' => 'Es necesario ingresar la descripción del Meme.',
    		'description.max' => 'La descripción es demasiada extensa.',
    		'image.required' => 'Es indispensable subir la imágen del Meme.',
    		'image.max' => 'El nombre  dela imágen es demasiado extenso.',
    	];

    	$this->validate($request, $rules, $messages);
    	
    	$meme = new Meme();
    	$meme->description = $request->input('description');
    	$meme->image = $request->input('image');
    	$meme->user_id = $request->input('user_id');    	
    	$meme->save();

    	return back()->with('notification', 'Meme registrado exitosamente.');
    }

    public function edit() {

    	return view('memes.edit');
    }

    public function update($id, Request $request) {

    	$rules = [
            'description' => 'required|string|max:255',
            'image' => 'required|max:255|',
            'user_id' => 'required|integer|unique:users'
    	];

    	$messages = [
    		'description.required' => 'Es necesario ingresar la descripción del Meme.',
    		'description.max' => 'La descripción es demasiada extensa.',
    		'image.required' => 'Es indispensable subir la imágen del Meme.',
    		'image.max' => 'El nombre  dela imágen es demasiado extenso.',
    	];

    	$this->validate($request, $rules, $messages);

    	$meme = Meme::find($id);
    	$meme->description = $request->input('description');
    	$meme->image = $request->input('image');
    	$meme->user_id = $request->input('user_id');    	
    	$meme->save();

    	return back()->with('notification', 'Meme modificado exitosamente.');
    }


    public function delete($id) {
    	
        $meme = Meme::find($id);
        $meme->delete();

        return back()->with('notification', 'El Meme se ha dado de baja correctamente.');
    }    
}
