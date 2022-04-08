<?php
use models\Servicio;
use models\Paciente;
use models\ServicioTipo;

class serviciosController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->verificarSession();
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Servicios');
        $this->_view->assign('title','Servicios');
        $this->_view->assign('servicios', Servicio::with(['paciente','usuario','servicioTipo'])->orderBy('id', 'DESC')->take(50)->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarServicio($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Servicio');
        $this->_view->assign('title','Servicio');
        $this->_view->assign('servicio', Servicio::with(['paciente','usuario','servicioTipo'])->find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarRolAdmin();
        $this->verificarServicio($id);

        $this->_view->assign('titulo','Editar Servicio');
        $this->_view->assign('title','Editar Servicio');
        $this->_view->assign('button','Editar');
        $this->_view->assign('ruta','servicios/view/' . $this->filtrarInt($id));
        $this->_view->assign('servicio', Servicio::with(['paciente','usuario','servicioTipo'])->find($this->filtrarInt($id)));
        $this->_view->assign('tipos', ServicioTipo::select('id','nombre')->orderBy('nombre')->get());
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->getSql('descripcion')) {
                $this->_view->assign('_error','Ingrese la descripcion del servicio');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('tipo')) {
                $this->_view->assign('_error','Ingrese el tipo de servicio');
                $this->_view->renderizar('edit');
                exit;
            }


            $servicio = Servicio::find($this->filtrarInt($id));
            $servicio->descripcion = $this->getSql('descripcion');
            $servicio->servicio_tipo_id = $this->getInt('tipo');
            $servicio->save();

            Session::set('msg_success','El servicio se ha modificado correctamente');

            $this->redireccionar('servicios/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');

    }

    public function add($paciente)
    {
        $this->verificarRolAdminVeterinario();
        $this->verificarPaciente($paciente);

        $this->_view->assign('titulo','Nuevo Servicio');
        $this->_view->assign('title','Nuevo Servicio');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','pacientes/view/' . $this->filtrarInt($paciente));
        $this->_view->assign('paciente', Paciente::with('cliente')->find($this->filtrarInt($paciente)));
        $this->_view->assign('tipos', ServicioTipo::select('id','nombre')->orderBy('nombre')->get());
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('servicio', $_POST);

            if (!$this->getSql('descripcion')) {
                $this->_view->assign('_error','Ingrese la descripcion del servicio');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('precio')) {
                $this->_view->assign('_error','Ingrese el valor del servicio');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('urgencia')) {
                $this->_view->assign('_error','Ingrese una opción del servicio');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('tipo')) {
                $this->_view->assign('_error','Ingrese el tipo de servicio');
                $this->_view->renderizar('add');
                exit;
            }


            $servicio = new Servicio;
            $servicio->descripcion = $this->getSql('descripcion');
            $servicio->precio = $this->getInt('precio');
            $servicio->urgencia = $this->getInt('urgencia');
            $servicio->paciente_id = $this->filtrarInt($paciente);
            $servicio->usuario_id = Session::get('usuario_id');
            $servicio->servicio_tipo_id = $this->getInt('tipo');
            $servicio->save();

            Session::set('msg_success','El servicio se ha registrado correctamente');

            $this->redireccionar('pacientes/view/' . $this->filtrarInt($paciente));
        }

        $this->_view->renderizar('add');
    }

    #########################################

    private function verificarServicio($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('servicios');
        }

        $servicio = Servicio::select('id')->find($this->filtrarInt($id));

        if (!$servicio) {
            $this->redireccionar('servicios');
        }
    }

    private function verificarPaciente($id)
    {
    if (!$this->filtrarInt($id)) {
        Session::set('_error','El paciente ingresado no existe');
        $this->redireccionar('clientes');
    }

    $paciente = Paciente::select('id')->find($this->filtrarInt($id));

    if (!$paciente) {
        Session::set('_error','El paciente ingresado no existe');
        $this->redireccionar('clientes');
    }
    }
}
