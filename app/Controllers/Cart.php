<?php

namespace App\Controllers;

use App\Models\Products;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Envio;
use App\Models\Users;
class Cart extends BaseController
{

    protected $cart;
    protected $session;

    public function __construct()
    {
        helper(['form', 'url', 'cart']);

        $session = session();
        $this->cart = \Config\Services::cart();
    }

    public function view()
    {
        $cart = $this->cart->contents();
        $model = new Products();
        $productos = [];

        foreach ($cart as $item) {
            $producto = $model->find($item['id']);
            $producto['qty'] = $item['qty'];
            $producto['rowid'] = $item['rowid'];
            $productos[] = $producto;
        }

        $data['productos'] = $productos;
        $data['cart'] = $this->cart;
        echo view('components/header');
        echo view('Products/carrito', $data);
        echo view('components/footer');
    }

    public function add()
    {
        $request = \Config\Services::request();
        $qty = $request->getPost('qty');

        // Si el campo 'qty' está vacío o no está presente en el formulario, establecerlo en 1
        if (empty($qty)) {
            $qty = 1;
        }
        $data = array(
            'id'      => $request->getPost('id'),
            'qty'     => $qty,
            'price'   => $request->getPost('price'),
            'name'    => $request->getPost('name'),
            'categoriaID' => $request->getPost('categoriaID')
        );

        $this->cart->insert($data);

        return redirect()->to(base_url('listado_productos/'. $data['categoriaID']));
    }
    public function update()
    {
        $request = \Config\Services::request();
        $rowid = $request->getPost('rowid');
        $qty = $request->getPost('qty');

        // Si la cantidad es menor o igual a 0, eliminamos el producto del carrito
        if ($qty <= 0) {
            $this->cart->remove($rowid);
        } else {
            $data = array(
                'rowid'   => $rowid,
                'qty'     => $qty,
            );
            $this->cart->update($data);
        }

        return redirect()->back()->withInput();
    }
    public function remove($rowid)
    {
        if ($rowid === "all") {
            $this->cart->destroy();
        } else {
            $this->cart->remove($rowid);
        }

        return redirect()->back()->withInput();
    }
    public function continuar()
    {
        $cart = \Config\Services::cart();
        $carrito = $this->cart->contents();

        if (empty($carrito)) {
            return redirect()->back()->with('mensaje', 'El carrito esta vacio');
        }

        echo view('components/header');
        echo view('Products/compra', ['productos' => $carrito, 'cart' => $cart]);
        echo view('components/footer');
    }

    public function comprar()
    {
        $productModel = new Products();
        $session = session();
        $cart = \Config\Services::cart();
        $db = \Config\Database::connect();
        $db->transBegin();
        
            $carrito = $this->cart->contents();
            if (empty($carrito)) {
                return redirect()->back()->with('mensaje', 'El carrito esta vacio');
            }

            $userID= $session->get('userID');

            $total_venta = $cart->total();

            $tipoPagoId = $this->request->getPost('tipoPagoId');
            $tarjeta = $this->request->getPost('tarjeta');
            $direccion = $this->request->getPost('direccion');
            $ciudad = $this->request->getPost('ciudad');
            $provincia = $this->request->getPost('provincia');
            $codPostal = $this->request->getPost('codPostal');
            $metodoEnvio = $this->request->getPost('metodoEnvio');
            $precioEnvio = $this->request->getPost('precioEnvio');

            $Order = new Order();
            $datosOrder = [
                'fecha' => date('Y-m-d H:i:s'),
                'userID' => $userID,
                'total_venta' => $total_venta,
                'tipoPagoId' => $tipoPagoId,
                'tarjeta' => $tarjeta,
            ];

            if (!empty($datosOrder)) {
                $Order->insert($datosOrder);
                $OrderId= $Order->insertID();
            }

            $OrderDetail = new OrderDetail();
            foreach ($carrito as $producto) {
                $dataOrderDetail = [
                    'orderID' => $OrderId,
                    'productID' => $producto['id'],
                    'cantidad' => $producto['qty'],
                    'price' => $producto['price'],
                ];
                $OrderDetail->insert($dataOrderDetail);
                $producto_id = $producto['id'];
                $stockAct = $productModel->getCantidad($producto_id);

                $newStock = $stockAct - $producto['qty'];

                $productModel->updateCantidad($producto_id, $newStock);
            }
            //Guardar los datos de envio
            $enivo = new Envio();
            $envioData = [
                'orderID' => $OrderId,
                'direccion' => $direccion,
                'ciudad' => $ciudad,
                'provincia' => $provincia,
                'codPostal' => $codPostal,
                'metodoEnvio' => $metodoEnvio,
                'precioEnvio' => $precioEnvio,
                'fecha' => date('Y-m-d H:i:s'),
            ];
            $enivo->insert($envioData);
            echo ("asd");
            if ($db->transStatus() === false) {
                throw new \Exception('Error en la transaccion');
            }

            $db->transCommit();
            $cart->destroy();

            // Redirigir a una página de éxito
           return redirect()->to('compra/comprobante/' . $OrderId)->with('mensaje', 'La compra se ha realizado con éxito.');
    }

    public function comprobante($orderId)
{
    $Order = new Order();
    $OrderDetail = new OrderDetail();
    $Envio = new Envio();
    $User = new Users(); // Supongamos que tienes un modelo User para los datos del usuario
    $Product = new Products(); // Supongamos que tienes un modelo Products para los datos del producto

    $order = $Order->find($orderId);
    $orderDetails = $OrderDetail->where('orderID', $orderId)->findAll();
    $envio = $Envio->where('orderID', $orderId)->first();
    $user = $User->find($order['userID']); // Obtenemos los datos del usuario
    // Obtenemos los nombres de los productos
    foreach ($orderDetails as &$detail) {
        $product = $Product->find($detail['productID']);
        $detail['productName'] = $product['nombre'];
    }

    $data = [
        'order' => $order,
        'orderDetails' => $orderDetails,
        'envio' => $envio,
        'user' => $user, // Incluimos los datos del usuario en la vista
    ];

    echo view('components/header');
    echo view('Products/comprobante', $data);
    echo view('components/footer');
}


    
}