<?php

namespace App\Http\Controllers;

use App\Models\Agendamentos;
use App\Models\Avaliações;
use App\Models\Cacifos;
use App\Models\Cacifos_Estágios;
use App\Models\Cauções;
use App\Models\Curso_Aluno;
use App\Models\Estágios;
use App\Models\Instituicao_Aluno;
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
    // Retrieve the additional data needed for the PDF
    //$agendamento = Agendamentos::findOrFail($record->agendamentos_id);

    // Define the data to be passed to the PDF view
    $data = [
        'record' => $record,
        //'agendamento' => $agendamento,
        //'estagio' => $estagio,
    ];

    // Generate the PDF using the avaliacoes.blade.php view
    $pdf = PDF::loadView('agendamentospdf', $data);
    $filename = 'agendamentos' . $record->id . '.pdf';

    // Download the PDF file
    return $pdf->download($filename);
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

    $data = [
        'record' => $record,
        //'instituição' => $instituição,
    ];

    $pdf = PDF::loadView('estagiospdf', $data);
    $filename = 'estagios' . $record->id . '.pdf';

    // Download the PDF file
    return $pdf->download($filename);
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

    $data = [
        'record' => $record,
        //'instituição' => $instituição,
    ];

    $pdf = PDF::loadView('solicitacaovagas-pdf', $data);
    $filename = 'solicitacaovagas' . $record->id . '.pdf';

    // Download the PDF file
    return $pdf->download($filename);
}

public function users(User $record)
{

    //$instituição =User::findOrFail(Instituicao_Aluno::findOrFail($record->instituicao_aluno_id)->users_id);
    //$curso =User::findOrFail(Curso_Aluno::findOrFail($record->instituicao_aluno_id)->users_id);

    // Define the data to be passed to the PDF view
    $data = [
        'record' => $record,
        //'instituição' => $instituição,
    ];

    $pdf = PDF::loadView('userspdf', $data);
    $filename = 'users' . $record->id . '.pdf';

    // Download the PDF file
    return $pdf->download($filename);
}

public function orientacaoestagio(Orientação_Estagios $record)
{
    $data = [
        'record' => $record,
        //'instituição' => $instituição,
    ];

    $pdf = PDF::loadView('orientacaoestagiopdf', $data);
    $filename = 'orientacaoestagio' . $record->id . '.pdf';

    // Download the PDF file
    return $pdf->download($filename);
}


}