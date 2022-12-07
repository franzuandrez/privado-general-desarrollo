<?php

namespace App\Http\Controllers;

use App\Cita;
use App\VWImprimirReceta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class PDFController extends Controller
{
    public function pdf_receta($id_cita)
    {
        try {
            $receta = VWImprimirReceta::where('id_cita', $id_cita)->get();
            $data = ['receta' => $receta];


            $pdf = PDF::loadView('PDF.receta', $data);

//            return $pdf->download('Receta.pdf');
            return $pdf->stream('Receta.pdf');


        } catch (\Exception $e) {
            return $e;
            return redirect()->back();
        }
    }
}
