<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agendamentos;

class CalendarController extends Controller
{
    public function show(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Agendamentos::whereDate('data', '>=', $request->data)
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
    			$Agendamentos = Agendamentos::create([
    				'nome'		=>	$request->nome,
    				'data'		=>	$request->data,
    				'hora'		=>	$request->hora
    			]);

    			return response()->json($Agendamentos);
    		}

    		if($request->type == 'update')
    		{
    			$Agendamentos = Agendamentos::find($request->id)->update([
    				'nome'		=>	$request->nome,
    				'data'		=>	$request->data,
    				'hora'		=>	$request->hora
    			]);

    			return response()->json($Agendamentos);
    		}

    		if($request->type == 'delete')
    		{
    			$Agendamentos = Agendamentos::find($request->id)->delete();

    			return response()->json($Agendamentos);
    		}
    	}
    }
}
?>