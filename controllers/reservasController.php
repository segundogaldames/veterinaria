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
        $this->verificarMensajes();

        $this->_view->assign('titulo','Reservas');
        $this->_view->assign('title','Reservas');
        $this->_view->assign('title_horario','Horarios');
        $this->_view->assign('reservas',Reserva::with(['servicioTipo','pacienteTipo','reservaStatus','horario','funcionario'])->orderBy('fecha','DESC')->orderBy('horario_id','DESC')->take(10)->get());
        $this->_view->assign('enviar', CTRL);
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarReserva($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Reserva');
        $this->_view->assign('title','Reserva');
        $this->_view->assign('reserva',Reserva::with(['servicioTipo','pacienteTipo','reservaStatus','horario','funcionario'])->find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        # code...
    }

    public function horariosReserva()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Reservas');
        $this->_view->assign('title','Reservas');
        $this->_view->assign('title_horario','Horarios');
        $this->_view->assign('enviar', CTRL);
        $this->_view->assign('reservas',Reserva::with(['servicioTipo','pacienteTipo','reservaStatus','horario','funcionario'])->whereDate('fecha',
        $this->getSql('fecha'))->orderBy('horario_id', 'DESC')->get());

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('fecha', $_POST);

            $hoy = getdate();
            $day = ($hoy['mday'] < 10) ? 0 .$hoy['mday'] : $hoy['mday'];
            $month=($hoy['mon'] < 10) ? 0 .$hoy['mon'] : $hoy['mon'];
            $year = $hoy['year'];
            $hoy = $year . '-' . $month . '-' . $day;

            if (!$this->getSql('fecha') || $this->getSql('fecha') < $hoy) {
                $this->_view->assign('_error', 'Ingrese una fecha válida');
                $this->_view->renderizar('horariosReserva');
                exit;
            }

            $reservas = Reserva::where('fecha', $this->getSql('fecha'))->get();
            $horarios = Horario::all();

            //print_r($reservas);exit;
            if (count($reservas) > 0) {
                # code...
                for($i=0; $i < count($horarios); $i++){
                    $horarios[$i]['disponible'] = 'Si';

                    for($j = 0; $j < count($reservas);$j++) {
                        if ($reservas[$j]['horario_id'] == $horarios[$i]['id']) {
                            $horarios[$i]['disponible'] = 'No';
                            continue;
                        }
                    }
                }
            }else{
                foreach ($horarios as $horario) {
                    $horario->disponible = 'Si';
                }
            }


            $this->_view->assign('horarios', $horarios);

        }

        $this->_view->renderizar('horariosReserva');
    }

    public function add($horario = null, $fecha = null)
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
            $day = ($hoy['mday'] < 10) ? 0 .$hoy['mday'] : $hoy['mday'];
            $month = ($hoy['mon'] < 10) ? 0 .$hoy['mon'] : $hoy['mon'];
            $year = $hoy['year'];

            $hoy = $year . '-' . $month . '-' . $day;

            //print_r($hoy);exit;

            if ($fecha < $hoy) {
                $this->_view->assign('_error','Seleccione una fecha igual o posterior a la actual');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getSql('nombre_paciente')) {
                $this->_view->assign('_error','Ingrese el nombre del paciente');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$this->getInt('paciente_tipo')) {
                $this->_view->assign('_error','Seleccione el tipo de paciente');
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


            if (!$this->getInt('funcionario')) {
                $this->_view->assign('_error','Seleccione el funcionario');
                $this->_view->renderizar('add');
                exit;
            }

            $reserva = Reserva::select('id')->whereDate('fecha', $fecha)->where('horario_id', $this->filtrarInt($horario))->first();

            if ($reserva) {
                $this->_view->assign('_error','La reserva ingresada ya existe... cambie la fecha y/o la hora para continuar');
                $this->_view->renderizar('add');
                exit;
            }

            /*
            * 1 => pendiente (esta reservada pero no confirmada)
            * 2 => confirmada
            * 3 => efectuada
            * 4 => anulada
            */

            $reserva = new Reserva;
            $reserva->fecha = $fecha;
            $reserva->nombre_paciente = $this->getSql('nombre_paciente');
            $reserva->nombre_cliente = $this->getSql('nombre_cliente');
            $reserva->reserva_status_id = 1;
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
            Session::set('msg_error','El horario no existe');
            $this->redireccionar('reservas');
        }
    }
}