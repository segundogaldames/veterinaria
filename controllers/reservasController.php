<?php
use models\Reserva;
use models\Horario;
use models\ServicioTipo;
use models\PacienteTipo;
use models\Funcionario;
use models\FuncionarioRol;

class reservasController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->verificarSession();
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

    public function add($horario = null)
    {
        $this->verificarHorario($horario);

        $this->_view->assign('titulo','Reservar Hora');
        $this->_view->assign('title','Reservar Hora');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','reservas');
        $this->_view->assign('servicioTipos', ServicioTipo::select('id','nombre')->orderBy('nombre')->get());
        $this->_view->assign('pacienteTipos', PacienteTipo::select('id','nombre')->orderBy('nombre')->get());
        $this->_view->assign('funcionarios', FuncionarioRol::with('funcionario')->where('rol_id', 3)->get());
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('reserva', $_POST);

            $hoy = getdate();

            if (!$this->getSql('fecha') || $this->getSql('fecha') < $hoy) {
                $this->_view->assign('_error','Seleccione una fecha igual o posterior a la actual');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getSql('nombre_paciente')) {
                $this->_view->assign('_error','Ingrese el nombre del paciente');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getSql('nombre_cliente')) {
                $this->_view->assign('_error','Ingrese el nombre del cliente');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('servicio_tipo')) {
                $this->_view->assign('_error','Seleccione el tipo de servicio');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('paciente_tipo')) {
                $this->_view->assign('_error','Seleccione el tipo de paciente');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('funcionario')) {
                $this->_view->assign('_error','Seleccione el funcionario');
                $this->_view->renderizar('add');
                exit;
            }

            $reserva = Reserva::select('id')->where('fecha', $this->getSql('fecha'))->where('horario_id', $this->filtrarInt($horario))->first();

            if ($reserva) {
                $this->_view->assign('_error','La reserva ingresada ya existe... cambie la fecha y la hora para continuar');
                $this->_view->renderizar('add');
                exit;
            }

            /*
            * 1 => pendiente (esta reservada pero no confirmada)
            * 2 => confirmada
            * 3 => efectuada
            */

            $reserva = new Reserva;
            $reserva->fecha = $this->getSql('fecha');
            $reserva->nombre_paciente = $this->getSql('nombre_paciente');
            $reserva->nombre_cliente = $this->getSql('nombre_cliente');
            $reserva->status = 1;
            $reserva->horario_id = $this->filtrarInt($horario);
            $reserva->servicio_tipo_id = $this->getInt('servicio_tipo');
            $reserva->paciente_tipo_id = $this->getInt('paciente_tipo');
            $reserva->usuario_id = Session::get('usuario_id');
            $reserva->funcionario_id = $this->getInt('funcionario');
            $reserva->save();

            Session::set('msg_success','La reserva se ha registrado correctamente');

            $this->redireccionar('reservas');
        }

        $this->_view->renderizar('add');
    }

    ################################################
    private function verificarReserva($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('reservas');
        }

        $reserva = Reserva::select('id')->find($this->filtrarInt($id));

        if (!$reserva) {
            $this->redireccionar('reservas');
        }
    }

    private function verificarHorario($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('reservas');
        }

        $horario = Horario::select('id')->find($this->filtrarInt($id));

        if (!$horario) {
            $this->redireccionar('reservas');
        }
    }
}
