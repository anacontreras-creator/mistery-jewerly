<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Productos extends BaseController
{
    public function index()
    {
        $productoModel = new ProductoModel();
        $datos['productos'] = $productoModel->findAll();

        return view('productos/index', $datos);
    }

    public function crear()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('productos/crear');
    }

    public function guardar()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $productoModel = new ProductoModel();

        $productoModel->insert([
            'nombre'       => $this->request->getPost('nombre'),
            'descripcion'  => $this->request->getPost('descripcion'),
            'stock'        => $this->request->getPost('stock'),
            'precio'       => $this->request->getPost('precio'),
            'id_categoria' => $this->request->getPost('id_categoria'),
            'imagen'       => $this->request->getPost('imagen')
        ]);

        return redirect()->to('/productos');
    }

   
public function agregarAlCarrito($id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $productoModel = new ProductoModel();
    $producto = $productoModel->find($id);

    if (!$producto) {
        return redirect()->to('/productos');
    }

    $carrito = session()->get('carrito') ?? [];

    $carrito[$id] = ($carrito[$id] ?? 0) + 1;

    session()->set('carrito', $carrito);

    // Datos para mostrar la notificación
    session()->setFlashdata('notificacionCarrito', [
        'nombre' => $producto['nombre'],
        'imagen' => $producto['imagen'] ?? '',
        'cantidad' => $carrito[$id]
    ]);

    return redirect()->to('/productos');
}

   public function verCarrito()
{
    $productoModel = new ProductoModel();

    // Obtener el carrito de la sesión
    $carrito = session()->get('carrito') ?? [];

    // Preparar la lista de productos
    $datos['productos'] = [];

    // Si el carrito tiene productos
    if (!empty($carrito)) {

        foreach ($carrito as $id => $cantidad) {

            $producto = $productoModel->find($id);

            if ($producto) {
                $producto['cantidad'] = (int) $cantidad;
                $datos['productos'][] = $producto;
            }
        }
    }

    // Abrir siempre la vista del carrito
    return view('carrito/index', $datos);
}
public function aumentarCantidad($id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $carrito = session()->get('carrito') ?? [];

    if (isset($carrito[$id])) {
        $carrito[$id]++;
    }

    session()->set('carrito', $carrito);

    return redirect()->to('/carrito');
}

public function disminuirCantidad($id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $carrito = session()->get('carrito') ?? [];

    if (isset($carrito[$id])) {
        $carrito[$id]--;

        if ($carrito[$id] <= 0) {
            unset($carrito[$id]);
        }
    }

    session()->set('carrito', $carrito);

    return redirect()->to('/carrito');
}
}