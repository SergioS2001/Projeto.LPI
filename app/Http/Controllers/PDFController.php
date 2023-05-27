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
use Illuminate\Support\Facades\Auth;
use PDO;

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

    public function generateCertificadoAlunoPdf()
    {
        // Generate the PDF using the 'pdf-aluno' view
        $pdf = PDF::loadView('pdf-aluno');
    
        // Download the PDF file
        return $pdf->download('table.pdf');
    }
    

    // Method to fetch the table data (replace with your own logic)
    private function fetchTableData()
    {
        // Perform the necessary database queries or retrieve the data from wherever it is stored
        // Return the table data as an array or collection
        // Example:
        $data = [
            ['column1' => 'Value 1', 'column2' => 'Value 2', 'column3' => 'Value 3'],
            ['column1' => 'Value 4', 'column2' => 'Value 5', 'column3' => 'Value 6'],
            // Add more rows as needed
        ];

        return $data;
    }

}
