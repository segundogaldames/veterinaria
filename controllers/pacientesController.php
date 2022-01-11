<?php
use models\Paciente;
use models\Cliente;
use models\PacienteTipo;

class pacientesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->verificarSession();
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Pacientes');
        $this->_view->assign('title','Lista de Pacientes');
        $this->_view->assign('pacientes', Paciente::with(['pacienteTipo','cliente'])->take(20)->orderBy('id', 'DESC')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarPaciente($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Paciente');
        $this->_view->assign('title','Paciente');
        $this->_view->assign('paciente', Paciente::with(['pacienteTipo','cliente'])->find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarPaciente($id);

        $this->_view->assign('titulo','Editar Paciente');
        $this->_view->assign('title','Editar Paciente');
        $this->_view->assign('button', 'Editar');
        $this->_view->assign('ruta', 'pacientes/view/' . $this->filtrarInt($id));
        $this->_view->assign('tipos', PacienteTipo::select('id','nombre')->orderBy('nombre')->get());
        $this->_view->assign('paciente', Paciente::with(['pacienteTipo','cliente'])->find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->getSql('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del paciente');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('edad')) {
                $this->_view->assign('_error','Ingrese la edad del paciente');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('tamanio')) {
                $this->_view->assign('_error','Seleccione el tamaño del paciente');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getFloat('peso')) {
                $this->_view->assign('_error','Ingrese el peso del paciente');
                $this->_view->renderizar('edit');
                exit;
            }

            if (!$this->getInt('tipo')) {
                $this->_view->assign('_error','Seleccione el tipo de paciente');
                $this->_view->renderizar('edit');
                exit;
            }

            $paciente = Paciente::select('id')->where('nombre', $this->getSql('nombre'))->where('codigo_chip', $this->getPostParam('codigo_chip'))->where('edad',
            $this->getInt('edad'))->where('tamanio', $this->getInt('tamanio'))->where('peso', $this->getFloat('peso'))->where('paciente_tipo_id', $this->getInt('tipo'))->first();

            if ($paciente) {
                $this->_view->assign('_error','El paciente ingresado ya existe... modifique alguno de sus datos para continuar');
                $this->_view->renderizar('edit');
                exit;
            }

        /*
        * tamanio:
        * 1 => pequeño;
        * 2 => mediano;
        * 3 => grande;
        */

            $paciente = Paciente::find($this->filtrarInt($id));
            $paciente->nombre = $this->getSql('nombre');
            $paciente->codigo_chip = $this->getPostParam('codigo_chip');
            $paciente->edad = $this->getInt('edad');
            $paciente->tamanio = $this->getInt('tamanio');
            $paciente->peso = $this->getFloat('peso');
            $paciente->paciente_tipo_id = $this->getInt('tipo');
            $paciente->save();

            Session::set('msg_success','El paciente se ha modificado correctamente');

            $this->redireccionar('pacientes/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add($cliente = null)
    {
        $this->verificarCliente($cliente);

        $this->_view->assign('titulo','Nuevo Paciente');
        $this->_view->assign('title','Nuevo Paciente');
        $this->_view->assign('button', 'Guardar');
        $this->_view->assign('ruta', 'clientes/view/' . $this->filtrarInt($cliente));
        $this->_view->assign('tipos', PacienteTipo::select('id','nombre')->orderBy('nombre')->get());
        $this->_view->assign('cliente', Cliente::select('rut','nombre')->find($this->filtrarInt($cliente)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('paciente', $_POST);

            if (!$this->getSql('nombre')) {
                $this->_view->assign('_error','Ingrese el nombre del paciente');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('edad')) {
                $this->_view->assign('_error','Ingrese la edad del paciente');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('tamanio')) {
                $this->_view->assign('_error','Seleccione el tamaño del paciente');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getFloat('peso')) {
                $this->_view->assign('_error','Ingrese el peso del paciente');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('tipo')) {
                $this->_view->assign('_error','Seleccione el tipo de paciente');
                $this->_view->renderizar('add');
                exit;
            }

            $paciente = Paciente::select('id')->where('nombre', $this->getSql('nombre'))->where('cliente_id', $this->filtrarInt($cliente))->first();

            if ($paciente) {
                $this->_view->assign('_error','El paciente ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            /*
            * tamanio:
            * 1 => pequeño;
            * 2 => mediano;
            * 3 => grande;
            */

            $paciente = new Paciente;
            $paciente->nombre = $this->getSql('nombre');
            $paciente->codigo_chip = $this->getPostParam('codigo_chip');
            $paciente->edad = $this->getInt('edad');
            $paciente->tamanio = $this->getInt('tamanio');
            $paciente->peso = $this->getFloat('peso');
            $paciente->paciente_tipo_id = $this->getInt('tipo');
            $paciente->cliente_id = $this->filtrarInt($cliente);
            $paciente->save();

            Session::set('msg_success','El paciente se ha registrado correctamente');

            $this->redireccionar('clientes/view/' . $this->filtrarInt($cliente));
        }

        $this->_view->renderizar('add');
    }

    ####################################################
    private function verificarPaciente($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('pacientes');
        }

        $paciente = Paciente::select('id')->find($this->filtrarInt($id));

        if (!$paciente) {
            $this->redireccionar('pacientes');
        }
    }

    private function verificarCliente($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('pacientes');
        }

        $cliente = Cliente::select('id')->find($this->filtrarInt($id));

        if (!$cliente) {
            $this->redireccionar('pacientes');
        }
    }
}
