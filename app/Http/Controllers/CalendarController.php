<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;

class CalendarController extends Controller
{
    public function show(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Evento::whereDate('data', '>=', $request->data)
                       ->get(['id','nome','data','hora']);
            return response()->json($data);
    	}
    	return view('calendar');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$Evento = Evento::create([
    				'nome'		=>	$request->nome,
    				'data'		=>	$request->data,
    				'hora'		=>	$request->hora
    			]);

    			return response()->json($Evento);
    		}

    		if($request->type == 'update')
    		{
    			$Evento = Evento::find($request->id)->update([
    				'nome'		=>	$request->nome,
    				'data'		=>	$request->data,
    				'hora'		=>	$request->hora
    			]);

    			return response()->json($Evento);
    		}

    		if($request->type == 'delete')
    		{
    			$Evento = Evento::find($request->id)->delete();

    			return response()->json($Evento);
    		}
    	}
    }
}
?>