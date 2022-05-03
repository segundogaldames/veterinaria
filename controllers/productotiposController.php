<?php
use models\ProductoTipo;

class productotiposController extends Controller
{
	public function __construct(){
        $this->verificarSession();
        $this->verificarRolAdmin();

		parent::__construct();

	}

	public function index()
	{
		$this->verificarMensajes();

		$this->_view->assign('titulo', 'Producto Tipos');
		$this->_view->assign('title', 'Tipo de Productos');
        $this->_view->assign('tipos', ProductoTipo::orderBy('id','DESC')->get());

		$this->_view->renderizar('index');
	}

    public function view($id = null)
    {
        $this->verificarProductoTipo($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo', 'Producto Tipo');
        $this->_view->assign('title', 'Detalle Tipo de Productos');
        $this->_view->assign('tipo', ProductoTipo::find($this->filtrarInt($id)));

        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarProductoTipo($id);

        $this->_view->assign('titulo', 'Editar Producto Tipos');
        $this->_view->assign('title', 'Editar Tipo de Productos');
        $this->_view->assign('button','Editar');
        $this->_view->assign('ruta','productotipos/view/' . $this->filtrarInt($id));
        $this->_view->assign('tipo', ProductoTipo::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->getAlphaNum('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del producto tipo');
                $this->_view->renderizar('edit');
                exit;
            }

            $tipo = ProductoTipo::select('id')->where('nombre', $this->getAlphaNum('nombre'))->first();

            if ($tipo) {
                $this->_view->assign('_error','El producto tipo ingresado ya existe... modifique el nombre para continuar');
                $this->_view->renderizar('edit');
                exit;
            }

            $tipo = ProductoTipo::find($this->filtrarInt($id));
            $tipo->nombre = $this->getAlphaNum('nombre');
            $res = $tipo->save();

            if ($res) {
                Session::set('msg_success','El producto tipo se ha modificado correctamente');
            }else {
                Session::set('msg_error','El producto tipo no se ha modificado... intente nuevamente');
            }

            $this->redireccionar('productotipos/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        $this->_view->assign('titulo', 'Nuevo Producto Tipos');
        $this->_view->assign('title', 'Nuevo Tipo de Productos');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','productotipos/');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('tipo', $_POST);

            if (!$this->getAlphaNum('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del producto tipo');
                $this->_view->renderizar('add');
                exit;
            }

            $tipo = ProductoTipo::select('id')->where('nombre', $this->getAlphaNum('nombre'))->first();

            if ($tipo) {
                $this->_view->assign('_error','El producto tipo ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $tipo = new ProductoTipo;
            $tipo->nombre = $this->getAlphaNum('nombre');
            $res = $tipo->save();

            if ($res) {
                Session::set('msg_success','El producto tipo se ha registrado correctamente');
            }else {
                Session::set('msg_error','El producto tipo no se ha registrado... intente nuevamente');
            }

            $this->redireccionar('productotipos');
        }

        $this->_view->renderizar('add');
    }

    ############################################

    private function verificarProductoTipo($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('productotipos');
        }

        $tipo = ProductoTipo::select('id')->find($this->filtrarInt($id));

        if (!$tipo) {
            $this->redireccionar('productotipos');
        }
    }
}