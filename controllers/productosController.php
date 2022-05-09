<?php
use models\Producto;
use models\ProductoTipo;
use models\PacienteTipo;

class productosController extends Controller
{
    public function __construct()
    {
        $this->verificarSession();
        parent::__construct();
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Productos');
        $this->_view->assign('title','Lista de Productos');
        $this->_view->assign('productos', Producto::with(['productoTipo','pacienteTipo'])->orderBy('id','desc')->get());

        $this->_view->renderizar('index');
    }

    public function add()
    {
        $this->_view->assign('titulo','Nuevo Producto');
        $this->_view->assign('title','Nuevo Producto');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','productos/');
        $this->_view->assign('tipos', ProductoTipo::select('id','nombre')->orderBy('nombre','asc')->get());
        $this->_view->assign('pacienteTipos', PacienteTipo::select('id','nombre')->orderBy('nombre','asc')->get());
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('producto', $_POST);

            if (!$this->getAlphaNum('codigo')) {
                $this->_view->assign('_error','Ingrese el código del producto');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getAlphaNum('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del producto');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getTexto('descripcion')) {
                $this->_view->assign('_error','Ingrese la descripción del producto');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('precio_venta')) {
                $this->_view->assign('_error','Ingrese el precio de venta del producto');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('tipo')) {
                $this->_view->assign('_error','Seleccione el tipo de producto');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('pacienteTipo')) {
                $this->_view->assign('_error','Seleccione el tipo de paciente');
                $this->_view->renderizar('add');
                exit;
            }

            $producto = Producto::select('id')->where('codigo', $this->getAlphaNum('codigo'))->first();

            if ($producto) {
                $this->_view->assign('_error','El producto ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $producto = new Producto;
            $producto->codigo = $this->getAlphaNum('codigo');
            $producto->nombre = $this->getAlphaNum('nombre');
            $producto->descripcion = $this->getTexto('descripcion');
            $producto->precio_venta = $this->getInt('precio_venta');
            $producto->status = 2;
            $producto->producto_tipo_id = $this->getInt('tipo');
            $producto->paciente_tipo_id = $this->getInt('pacienteTipo');
            $res = $producto->save();

            if ($res) {
                Session::set('msg_success','El producto se ha registrado correctamente');
            }else {
                Session::set('msg_error','El producto no se ha registrado... intente nuevamente');
            }

            $this->redireccionar('productos');
        }

        $this->_view->renderizar('add');
    }
}