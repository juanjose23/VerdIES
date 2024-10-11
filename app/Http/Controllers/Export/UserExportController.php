<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserExportController extends Controller
{
    //
    public function credenciales($Id)
    {
         // Usar transacción para asegurar la consistencia de los datos
         DB::beginTransaction();
         $user = User::find($Id);
 
         try {
             $html = view('pdf.user_credentials', ['user' => $user])->render();
 
             // Instantiate Dompdf
             $dompdf = new Dompdf();
             $dompdf->loadHtml($html);
 
             // Set paper size and orientation
             $dompdf->setPaper('A1', 'portrait'); // Cambié 'A1' a 'A4'
 
           
             $dompdf->render();
 
             $user->password =hash::make($user->password); // Asegúrate que este método esté implementado
             $user->estado = 1;
             $user->save();
 
             // Confirmar la transacción
             DB::commit();
 
             // Output PDF to browser
             return $dompdf->stream('document.pdf');
 
         } catch (\Exception $e) {
             // Rollback de la transacción en caso de error
             DB::rollback();
 
             // Manejar el error según sea necesario
             return response()->json(['error' => 'Error al generar el PDF: ' . $e->getMessage()], 500);
         }
    }
}
