<?php
use models\Paciente;
use models\Cliente;
use models\PacienteTipo;

class pacientesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        # code...
    }

    public function view($id = null)
    {
    # code...
    }

    public function edit($id = null)
    {
    # code...
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

            if (!$this->getSql('peso')) {
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
            $paciente->peso = $this->getSql('peso');
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
