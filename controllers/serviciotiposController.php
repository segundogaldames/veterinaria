<?php
use models\ServicioTipo;

class serviciotiposController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->verificarSession();
        $this->verificarRolAdmin();
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Servicio Tipos');
        $this->_view->assign('title','Tipo de Servicios');
        $this->_view->assign('tipos', ServicioTipo::select('id','nombre','precio')->orderBy('nombre')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarServicioTipo($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Servicio Tipo');
        $this->_view->assign('title','Tipo de Servicio');
        $this->_view->assign('tipo', ServicioTipo::find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarServicioTipo($id);

        $this->_view->assign('titulo','Editar Servicio Tipo');
        $this->_view->assign('title','Editar Tipo de Servicio');
        $this->_view->assign('button','Editar');
        $this->_view->assign('ruta','serviciotipos/view/' . $this->filtrarInt($id));
        $this->_view->assign('tipo', ServicioTipo::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->getSql('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del tipo de servicio');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('precio')) {
                $this->_view->assign('_error','Ingrese el precio del tipo de servicio');
                $this->_view->renderizar('edit');
                exit;
            }

            $tipo = ServicioTipo::select('id')->where('nombre', $this->getSql('nombre'))->where('precio', $this->getInt('precio'))->first();

            if ($tipo) {
                $this->_view->assign('_error','El tipo de servicio ingresado ya existe... modifique alguno de los datos para continuar');
                $this->_view->renderizar('edit');
                exit;
            }

            $tipo = ServicioTipo::find($this->filtrarInt($id));
            $tipo->nombre = $this->getSql('nombre');
            $tipo->precio = $this->getInt('precio');
            $tipo->save();

            Session::set('msg_success','El tipo de servicio se ha modificado correctamente');

            $this->redireccionar('serviciotipos/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        $this->_view->assign('titulo','Nuevo Servicio Tipo');
        $this->_view->assign('title','Nuevo Tipo de Servicio');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','serviciotipos');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('tipo', $_POST);

            if (!$this->getSql('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del tipo de servicio');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('precio')) {
                $this->_view->assign('_error','Ingrese el precio del tipo de servicio');
                $this->_view->renderizar('add');
                exit;
            }

            $tipo = ServicioTipo::select('id')->where('nombre', $this->getSql('nombre'))->first();

            if ($tipo) {
                $this->_view->assign('_error','El tipo de servicio ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $tipo = new ServicioTipo;
            $tipo->nombre = $this->getSql('nombre');
            $tipo->precio = $this->getInt('precio');
            $tipo->save();

            Session::set('msg_success','El tipo de servicio se ha registrado correctamente');

            $this->redireccionar('serviciotipos');
        }

        $this->_view->renderizar('add');
    }

    #########################################
    /*
    * verifica id de rol
    * @param int id
    * return roles/index
    */

    private function verificarServicioTipo($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('serviciotipos');
        }

        $tipo = ServicioTipo::select('id')->find($this->filtrarInt($id));

        if (!$tipo) {
            $this->redireccionar('serviciotipos');
        }
    }
}
