<?php
use models\Proveedor;
use models\Comuna;

class proveedoresController extends Controller
{
   public function __construct()
    {
        $this->verificarSession();
        parent::__construct();
        //$this->verificarRolAdmin();
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Proveedores');
        $this->_view->assign('title','Lista de Proveedores');
        $this->_view->assign('proveedores', Proveedor::with('comuna')->orderBy('id','desc')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarProveedor($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Proveedor');
        $this->_view->assign('title','Detalle Proveedor');
        $this->_view->assign('proveedor', Proveedor::with('comuna')->find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarProveedor($id);

        $this->_view->assign('titulo', 'Proveedores');
        $this->_view->assign('title', 'Editar Proveedor');
        $this->_view->assign('button','Editar');
        $this->_view->assign('ruta','proveedores/view/' . $this->filtrarInt($id));
        $this->_view->assign('proveedor', Proveedor::with('comuna')->find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->validaRut($this->getSql('rut')))
            {
                $this->_view->assign('_error','Ingrese el RUT del proveedor');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getSql('nombre') || strlen($this->getSql('nombre')) < 4) {
                $this->_view->assign('_error','Ingrese un nombre de al menos 4 caracteres');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->validarEmail($this->getPostParam('email')))
            {
                $this->_view->assign('_error','Ingrese el email del proveedor');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getTexto('direccion')) {
                $this->_view->assign('_error','Ingrese la dirección del proveedor');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('comuna')) {
                $this->_view->assign('_error','Seleccione la comuna del proveedor');
                $this->_view->renderizar('edit');
                exit;
            }

            $proveedor = Proveedor::select('id')
                        ->where('rut', $this->getSql('rut'))
                        ->where('nombre', $this->getSql('nombre'))
                        ->where('email', $this->getPostParam('email'))
                        ->where('direccion', $this->getTexto('direccion'))
                        ->where('comuna_id', $this->getInt('comuna'))
                        ->first();

            if ($proveedor) {
                $this->_view->assign('_error','El proveedor ingresado ya existe... modifique alguno de los datos para continuar');
                $this->_view->renderizar('edit');
                exit;
            }

            $proveedor = Proveedor::find($this->filtrarInt($id));
            $proveedor->rut = $this->getSql('rut');
            $proveedor->nombre = $this->getSql('nombre');
            $proveedor->email = $this->getPostParam('email');
            $proveedor->direccion = $this->getTexto('direccion');
            $proveedor->comuna_id = $this->getInt('comuna');
            $res = $proveedor->save();

            if ($res) {
                Session::set('msg_success','El proveedor se ha modificado correctamente');
            }else {
                Session::set('msg_error','El proveedor no se ha modificado... intente nuevamente');
            }


            $this->redireccionar('proveedores/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        $this->_view->assign('titulo', 'Proveedores');
        $this->_view->assign('title', 'Nuevo Proveedor');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','proveedores/');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('proveedor', $_POST);

            if (!$this->validaRut($this->getSql('rut')))
            {
                $this->_view->assign('_error','Ingrese el RUT del proveedor');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getSql('nombre') || strlen($this->getSql('nombre')) < 4)
            {
                $this->_view->assign('_error','Ingrese un nombre de al menos 4 caracteres');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->validarEmail($this->getPostParam('email')))
            {
                $this->_view->assign('_error','Ingrese el email del proveedor');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getTexto('direccion'))
            {
                $this->_view->assign('_error','Ingrese la dirección del proveedor');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('comuna'))
            {
                $this->_view->assign('_error','Seleccione la comuna del proveedor');
                $this->_view->renderizar('edit');
                exit;
            }

            $proveedor = Proveedor::select('id')->where('rut', $this->getSql('rut'))->first();

            if ($proveedor) {
                $this->_view->assign('_error', 'El proveedor ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $proveedor = new Proveedor;
            $proveedor->rut = $this->getSql('rut');
            $proveedor->nombre = $this->getSql('nombre');
            $proveedor->email = $this->getPostParam('email');
            $proveedor->direccion = $this->getTexto('direccion');
            $proveedor->comuna_id = $this->getInt('comuna');
            $res = $proveedor->save();

            if ($res) {
                Session::set('msg_success','El proveedor se ha registrado correctamente');
            }else {
                Session::set('msg_error','El proveedor no se ha registrado... intente nuevamente');
            }

            $this->redireccionar('proveedores');
        }

        $this->_view->renderizar('add');
    }

    ##################################################################

    private function verificarProveedor($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('proveedores');
        }

        $proveedor = Proveedor::select('id')->find($this->filtrarInt($id));

        if (!$proveedor) {
            $this->redireccionar('proveedores');
        }
    }
}
