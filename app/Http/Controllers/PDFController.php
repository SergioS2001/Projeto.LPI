<?php

namespace App\Http\Controllers;

use App\Models\Avaliações;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\FrameDecorator\Table;
use Spatie\LaravelIgnition\Recorders\QueryRecorder\Query;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\OrderController;
use App\Models\Order;

class PDFController extends Controller
{
    public function generatePDF($name)
    {


        $user = DB::table('users')->where('name', $name)->get();
        $order = DB::table('orders')->where('fname', $name)->get();

        $data = [
            'title' => 'Store - Fatura',
            'data' => date('m/d/Y'),
            'user' => $user,
            'order' => $order,
        ];

        $pdf = Pdf::loadView('PDF', $data);
    
        return $pdf->download('myPDF.pdf');
    }
}
