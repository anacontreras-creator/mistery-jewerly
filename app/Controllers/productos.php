<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Productos extends BaseController
{
    // VER PRODUCTOS: acceso libre
    public function index()
    {
        $productoModel = new ProductoModel();
        $datos['productos'] = $productoModel->findAll();

        return view('productos/index', $datos);
    }

    // CREAR PRODUCTOS: requiere iniciar sesión
    public function crear()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Iniciá sesión para continuar.');
        }

        return view('productos/crear');
    }

    // GUARDAR PRODUCTOS: requiere iniciar sesión
    public function guardar()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Iniciá sesión para continuar.');
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

    // AGREGAR AL CARRITO: requiere iniciar sesión
    public function agregarAlCarrito($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Iniciá sesión para agregar productos al carrito.');
        }

        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id);

        if (!$producto) {
            return redirect()->to('/productos');
        }

        $carrito = session()->get('carrito') ?? [];

        $carrito[$id] = ($carrito[$id] ?? 0) + 1;

        session()->set('carrito', $carrito);

        session()->setFlashdata('notificacionCarrito', [
            'nombre'   => $producto['nombre'],
            'imagen'   => $producto['imagen'] ?? '',
            'cantidad' => $carrito[$id]
        ]);

        return redirect()->to('/productos');
    }

    // VER CARRITO: requiere iniciar sesión
    public function verCarrito()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')
                ->with('error', 'Iniciá sesión para ver tu carrito.');
        }

        $productoModel = new ProductoModel();

        $carrito = session()->get('carrito') ?? [];

        $datos['productos'] = [];

        if (!empty($carrito)) {
            foreach ($carrito as $id => $cantidad) {

                $producto = $productoModel->find($id);

                if ($producto) {
                    $producto['cantidad'] = (int) $cantidad;
                    $datos['productos'][] = $producto;
                }
            }
        }

        return view('carrito/index', $datos);
    }

    // AUMENTAR CANTIDAD: requiere iniciar sesión
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

    // DISMINUIR CANTIDAD: requiere iniciar sesión
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
