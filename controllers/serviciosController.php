<?php
use models\Servicio;
use models\Paciente;
use models\ServicioTipo;
use models\Horario;
use models\FuncionarioRol;

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
        foreach (Session::get('usuario_roles')->funcionarioRol as $funcionarioRol) {
            //echo $funcionarioRol->rol->nombre;
            if ($funcionarioRol->rol->nombre == 'Administrador(a)' || $funcionarioRol->rol->nombre == 'Supervisor(a)') {
                $servicios = Servicio::with(['paciente','funcionario','servicioTipo','horario'])->orderBy('created_at','DESC')->orderBy('horario_id','DESC')->get();
            }elseif ($funcionarioRol->rol->nombre == 'Veterinario(a)') {
                $servicios = Servicio::with(['paciente','funcionario','servicioTipo','horario'])->orderBy('created_at','DESC')->orderBy('horario_id','DESC')->where('funcionario_id',
                Session::get('funcionario_id'))->get();
            }
        }
        $this->_view->assign('servicios', $servicios);
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarServicio($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Servicio');
        $this->_view->assign('title','Servicio');
        $this->_view->assign('servicio', Servicio::with(['paciente','funcionario','servicioTipo','horario'])->find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function serviciosFecha()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Servicios Fecha');
        $this->_view->assign('title','Servicios');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('servicio', $_POST);

            if (!$this->getSql('fecha')) {
                $this->_view->assign('_error', 'Seleccione la fecha del servicio');
                $this->_view->renderizar('serviciosFecha');
                exit;
            }

            $servicios = Servicio::with(['paciente','funcionario','servicioTipo','horario'])->orderBy('horario_id','DESC')->where('created_at','like','%'.$this->getSql('fecha') . '%')->get();

            if ($servicios) {
                # code...
                $this->_view->assign('servicios', $servicios);
            }
        }

        $this->_view->renderizar('serviciosFecha');
    }

    public function edit($id = null)
    {
        $this->verificarRolAdminVeterinario();
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

            $servicio = Servicio::find($this->filtrarInt($id));
            $servicio->descripcion = $this->getSql('descripcion');
            $servicio->status = 2;
            $servicio->save();

            Session::set('msg_success','El servicio se ha modificado correctamente');

            $this->redireccionar('servicios/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');

    }

    public function add($paciente)
    {
        $this->verificarRolAdminSuper();
        $this->verificarPaciente($paciente);

        $this->_view->assign('titulo','Nuevo Servicio');
        $this->_view->assign('title','Nuevo Servicio');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','pacientes/view/' . $this->filtrarInt($paciente));
        $this->_view->assign('paciente', Paciente::with('cliente')->find($this->filtrarInt($paciente)));
        $this->_view->assign('tipos', ServicioTipo::select('id','nombre')->orderBy('nombre')->get());
        $this->_view->assign('funcionarios', FuncionarioRol::with('funcionario')->where('rol_id', 3)->get());
        $this->_view->assign('horarios', Horario::select('id','rango_hora')->get());
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('servicio', $_POST);

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

            if (!$this->getInt('funcionario')) {
                $this->_view->assign('_error','Seleccione el veterinario para el servicio');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('horario')) {
                $this->_view->assign('_error','Seleccione el horario del servicio');
                $this->_view->renderizar('add');
                exit;
            }

            //status = 1 => pendiente; status = 2 => realizado

            $servicio = new Servicio;
            $servicio->urgencia = $this->getInt('urgencia');
            $servicio->status = 1;
            $servicio->paciente_id = $this->filtrarInt($paciente);
            $servicio->funcionario_id = $this->getInt('funcionario');
            $servicio->servicio_tipo_id = $this->getInt('tipo');
            $servicio->horario_id = $this->getInt('horario');
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
