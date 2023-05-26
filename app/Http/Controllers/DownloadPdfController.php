<?php

namespace App\Http\Controllers;

use App\Models\Avaliações;
use App\Models\Cacifos_Estágios;
use App\Models\Cauções;
use App\Models\Estágios;
use App\Models\Orientadores;
use App\Models\Orientação_Estagios;
use App\Models\Presenças;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class DownloadPdfController extends Controller
{
    public function avaliações(Avaliações $record)
{
    // Retrieve related data
    $orientacao = Orientação_Estagios::findOrFail($record->orientacoes_estagios_id);
    $estagio = Estágios::findOrFail($orientacao->estágios_id);
    $aluno = User::findOrFail($orientacao->users_id);
    $orientador = Orientadores::findOrFail($orientacao->orientador_id);

    // Generate PDF
    $pdf = Pdf::loadView('pdf.avaliacoes', compact('record', 'aluno', 'estagio', 'orientador'));

    // Optionally, you can customize the PDF configuration
    // For example, to set the paper size and orientation:
    // $pdf->setPaper('A4', 'portrait');

    // Stream or download the PDF
    return $pdf->stream();
}

public function estágios(Estágios $record)
{
}

public function presenças(Presenças $record)
{
}

public function cauções(Cauções $record)
{
}
public function cacifoestagio(Cacifos_Estágios $record)
{
}

}