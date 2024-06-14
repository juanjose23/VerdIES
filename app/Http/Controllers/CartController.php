<?php

namespace App\Http\Controllers;

use App\Models\Tasas;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::session(Auth::id())->getContent();
        if ($cartItems->isNotEmpty()) {
            // Obtiene el primer elemento del carrito y su atributo 'centro_acopio'
            $primerCentroAcopio = $cartItems->first()->attributes->centro_acopio;
            Session::put('primerCentroAcopio', $primerCentroAcopio);
            // Usa $primerCentroAcopio como necesites
        } else {
            $primerCentroAcopio = Session::get('primerCentroAcopio');

        }
        return view('cart.index', compact('cartItems','primerCentroAcopio'));
    }

    public function add(Request $request)
    {
        $tasas = new Tasas();
        $precio = $tasas->calcularPuntosAcumulados($request->input('id'), $request->input('quantity', 1));
        $product = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity', 1),
            'price' => $precio,
            'attributes' => [
                'image_url' => $request->input('image_url'),
                'centro_acopio' => $request->input('acopio'),
            ],
        ];

        
        Cart::session(Auth::id())->add($product);
        return redirect()->back()->with('success', 'Material agregado a la cesta de reciclaje correctamente');
    }

    public function update(Request $request, $itemId)
    {
        $tasas = new Tasas(); // Instancia de Tasas
        $quantity = $request->input('quantity', 1);
        $precio = $tasas->calcularPuntosAcumulados($request->input('id'), $quantity);
    
        // Obtener el artículo antes de eliminarlo
        $item = Cart::session(Auth::id())->get($itemId);
        // Eliminar el artículo del carrito
        Cart::remove($itemId);
        $product = [
            'id' => $item->id,
            'name' =>  $item->name,
            'quantity' => $request->input('quantity', 1),
            'price' => $precio,
            'attributes' => [
                'image_url' =>  $item->attributes->image_url,
                'centro_acopio' => $item->attributes->centro_acopio,
            ],
        ];
        // Agregar el artículo con la nueva cantidad y precio
      
        Cart::session(Auth::id())->add($product);
        return redirect()->route('cart.index')->with('success', 'Cantidad del material actualizado');
    }

    public function remove($itemId)
    {
        Cart::session(Auth::id())->remove($itemId);
        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }

    public function clear()
    {
        Cart::session(Auth::id())->clear(); 
        return redirect()->route('cart.index')->with('success', 'Carrito vaciado');
    }
}
