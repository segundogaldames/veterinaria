<?php
use models\PacienteTipo;

class pacientetiposController extends Controller
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

        $this->_view->assign('titulo','Tipo Pacientes');
        $this->_view->assign('title','Tipo Pacientes');
        $this->_view->assign('tipos', PacienteTipo::select('id','nombre','exotico')->orderBy('nombre')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarPacienteTipo($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Paciente');
        $this->_view->assign('title','Paciente');
        $this->_view->assign('tipo', PacienteTipo::find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarPacienteTipo($id);

        $this->_view->assign('titulo','Editar Tipo Pacientes');
        $this->_view->assign('title','Editar Tipo Pacientes');
        $this->_view->assign('button', 'Editar');
        $this->_view->assign('ruta', 'pacientetipos/view/' . $this->filtrarInt($id));
        $this->_view->assign('tipo', PacienteTipo::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {


            if (!$this->getSql('nombre')) {
                $this->_view->assign('_error', 'Ingrese el nombre del paciente tipo');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('exotico')) {
                $this->_view->assign('_error', 'Seleccione una opcion para el paciente tipo');
                $this->_view->renderizar('edit');
                exit;
            }

            $tipo = PacienteTipo::select('id')->where('nombre', $this->getSql('nombre'))->where('exotico', $this->getInt('exotico'))->first();

            if ($tipo) {
                $this->_view->assign('_error', 'El paciente tipo ingresado ya existe... modifique alguno de los datos para continuar');
                $this->_view->renderizar('edit');
                exit;
            }

            $tipo = PacienteTipo::find($this->filtrarInt($id));
            $tipo->nombre = $this->getSql('nombre');
            $tipo->exotico = $this->getInt('exotico');
            $tipo->save();

            Session::set('msg_success', 'El paciente tipo se ha modificado correctamente');
            $this->redireccionar('pacientetipos/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Nuevo Tipo Pacientes');
        $this->_view->assign('title','Nuevo Tipo Pacientes');
        $this->_view->assign('button', 'Guardar');
        $this->_view->assign('ruta', 'pacientetipos');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('tipo', $_POST);


            if (!$this->getSql('nombre')) {
                $this->_view->assign('_error', 'Ingrese el nombre del paciente tipo');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('exotico')) {
                $this->_view->assign('_error', 'Seleccione una opcion para el paciente tipo');
                $this->_view->renderizar('add');
                exit;
            }

            $tipo = PacienteTipo::select('id')->where('nombre', $this->getSql('nombre'))->first();

            if ($tipo) {
                $this->_view->assign('_error', 'El paciente tipo ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $tipo = new PacienteTipo;
            $tipo->nombre = $this->getSql('nombre');
            $tipo->exotico = $this->getInt('exotico');
            $tipo->save();

            Session::set('msg_success', 'El paciente tipo se ha registrado correctamente');
            $this->redireccionar('pacientetipos');
        }

         $this->_view->renderizar('add');
    }

    ####################################################
    private function verificarPacienteTipo($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('pacientetipos');
        }

        $paciente_tipo = PacienteTipo::select('id')->find($this->filtrarInt($id));

        if (!$paciente_tipo) {
            $this->redireccionar('pacientetipos');
        }
    }
}