<?php

namespace App\Http\Controllers\Promociones;

use App\Http\Controllers\Controller;
use App\Models\DetallesPromociones;
use App\Models\Media;
use App\Models\Monedas;
use App\Models\Promociones;
use App\Models\RolesUsuarios;
use App\Models\User;
use App\Services\MonedaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NuevaPromocion;
use Illuminate\Support\Facades\Notification;
use App\Services\CategoriaService;
use App\Services\PromocionesServices;
use Illuminate\Validation\Rule;
class PromocionesController extends Controller
{
    //
    protected $PromocionServices;
    protected $CategoriaServices;
    protected $MonedaServices;
    public function __construct(PromocionesServices $PromocionServices, CategoriaService $CategoriaServices, MonedaService $MonedaServices)
    {
        // Aplica el middleware de autorización solo a los métodos "create" y "store"

        $this->PromocionServices = $PromocionServices;
        $this->CategoriaServices = $CategoriaServices;
        $this->MonedaServices = $MonedaServices;
    }
    public function index()
    {
        return view('Gestion_Promociones.Promociones.index');
    }

    public function create()
    {
        $categorias = $this->PromocionServices->ObtenerCategorias();
        $monedas = $this->MonedaServices->ObtenerMonedasActivas();
        return view('Gestion_Promociones.Promociones.create', compact('categorias', 'monedas'));
    }
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $validator = Validator::make($request->all(), [
            'categorias' => 'required|exists:categoria,id',
            'nombre' => 'required|string|max:255|unique:promociones',
            'fecha' => 'required|date',
            'estado' => 'required|boolean',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'moneda' => 'required|exists:monedas,id',
            'preciomoneda' => 'required|numeric|min:0',
            'descripcion' => 'required|string',
        ]);
        $this->PromocionServices->crearPromocion($request);
        return redirect()->route('promociones.index')->with('success', 'Promoción registrada exitosamente.');
    }
    public function edit($promociones)
    {
        $promocion = $this->PromocionServices->ObtenerPromocionPorId($promociones);
        $categorias = $this->PromocionServices->ObtenerCategorias();
        $monedas = $this->MonedaServices->ObtenerMonedasActivas();

        return view('Gestion_Promociones.Promociones.edit', compact('promocion', 'monedas', 'categorias'));
    }
    //
    public function update(Request $request, $promociones)
    {

        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                'string',
                'max:255',
            ],
            'categorias' => 'required|exists:categoria,id',
            'fecha' => 'required|date',
            'estado' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'moneda' => 'required|exists:monedas,id',
            'preciomoneda' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
        ]);
        

        // Si la validación falla, retornar los errores
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Actualizar la promoción usando el servicio
        $this->PromocionServices->editarPromocion($request, $promociones);

        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada exitosamente.');
    }
    //
    public function destroy($promociones)
    {
        // Encuentra el cargo por su ID
        $promocion = Promociones::findOrFail($promociones);

        // Cambia el estado del cargo
        $promocion->estado = $promocion->estado == 1 ? 0 : 1;
        $promocion->save();
        // Redirige de vuelta a la página de índice con un mensaje flash
        Session::flash('success', 'El estado  ha sido cambiado exitosamente.');

        return redirect()->route('promociones.index');
    }

}
