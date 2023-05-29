<?php

namespace App\Http\Controllers;

use App\Models\Agendamentos;
use App\Models\Avaliações;
use App\Models\Cacifos;
use App\Models\Cacifos_Estágios;
use App\Models\Cauções;
use App\Models\Estágios;
use App\Models\Orientadores;
use App\Models\Orientação_Estagios;
use App\Models\Presenças;
use App\Models\Solicitação_Vagas;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class DownloadPdfController extends Controller
{

    public function agendamentos(Agendamentos $record)
{
}
    public function avaliações(Avaliações $record)
    {
        // Retrieve the additional data needed for the PDF
        $aluno = User::findOrFail(Orientação_Estagios::findOrFail($record->orientação_estagios_id)->users_id);
        $estagio = Estágios::findOrFail(Orientação_Estagios::findOrFail($record->orientação_estagios_id)->estágios_id);

        // Define the data to be passed to the PDF view
        $data = [
            'record' => $record,
            'aluno' => $aluno,
            'estagio' => $estagio,
        ];

        // Generate the PDF using the avaliacoes.blade.php view
        $pdf = PDF::loadView('avaliações', $data);
        $filename = 'avaliacoes_' . $record->id . '.pdf';

        // Download the PDF file
        return $pdf->download($filename);
    }

public function estágios(Estágios $record)
{
}

public function presenças(Presenças $record)
{
    // Retrieve the data needed for the PDF
    $orientacao = Orientação_Estagios::findOrFail($record->orientação_estagios_id);
    $aluno = User::findOrFail($orientacao->users_id)->name;
    $estagio = Estágios::findOrFail($orientacao->estágios_id)->nome;
    
    $data = [
        'record' => $record,
        'aluno' => $aluno,
        'estagio' => $estagio,
        // Include any additional data you need for the PDF view
    ];

    // Generate the PDF using the presenças.blade.php view
    $pdf = PDF::loadView('presenças', $data);
    $pdf->setPaper('A4', 'portrait');

    // Set the file name for the downloaded PDF
    $filename = 'presenças_' . $record->id . '.pdf';

    // Download the PDF file
    return $pdf->download($filename);
}


public function cauções(Cauções $record)
{
}
public function cacifoestagio(Cacifos_Estágios $record)
{
    // Retrieve the additional data needed for the PDF
    $user = User::findOrFail($record->users_id);
    $estagio = Estágios::findOrFail($record->estágios_id);
    $cacifo = Cacifos::findOrFail($record->cacifos_id);
    $caucao = Cauções::findOrFail($record->cauções_id);

    // Define the data to be passed to the PDF view
    $data = [
        'record' => $record,
        'user' => $user,
        'estagio' => $estagio,
        'cacifo' => $cacifo,
        'caucao' => $caucao,
    ];

    // Generate the PDF using the cacifoestagio.blade.php view
    $pdf = PDF::loadView('cacifoestagio', $data);
    $filename = 'cacifoestagio_' . $record->id . '.pdf';

    // Download the PDF file
    return $pdf->download($filename);
}

public function solicitacaovagas(Solicitação_Vagas $record)
{
}

public function users(User $record)
{
}

}