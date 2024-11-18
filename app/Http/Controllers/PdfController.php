<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsignacionBeneficios;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class PdfController extends Controller
{
    public function asignacion($id)
    {
        $beneficio = AsignacionBeneficios::find($id);

        $pdf = PDF::loadView('pdf.asignacion', compact('beneficio'))->setPaper('letter', 'portrait');
        return $pdf->inline('asignacion.pdf');
    }
}
