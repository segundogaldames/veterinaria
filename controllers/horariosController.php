<?php
use models\Horario;

class horariosController extends Controller
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

        $this->_view->assign('titulo','Horarios');
        $this->_view->assign('title','Horarios');
        $this->_view->assign('horarios', Horario::select('id','rango_hora')->orderBy('rango_hora')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarHorario($id);
        $this->verificarMensajes();

        $this->_view->assign('titulo','Horario');
        $this->_view->assign('title','Horario');
        $this->_view->assign('horario', Horario::find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarHorario($id);

        $this->_view->assign('titulo','Editar Horario');
        $this->_view->assign('title','Editar Horario');
        $this->_view->assign('button','Editar');
        $this->_view->assign('ruta','horarios/view/' . $this->filtrarInt($id));
        $this->_view->assign('horario', Horario::find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            if (!$this->getSql('rango_hora')) {
                $this->_view->assign('_error','Ingrese el rango del horario');
                $this->_view->renderizar('edit');
                exit;
            }

            $horario = Horario::select('id')->where('rango_hora', $this->getSql('rango_hora'))->first();

            if ($horario) {
                $this->_view->assign('_error','El horario ingresado ya existe... intente con otro rango');
                $this->_view->renderizar('edit');
                exit;
            }

            $horario = Horario::find($this->filtrarInt($id));
            $horario->rango_hora = $this->getSql('rango_hora');
            $horario->save();

            Session::set('msg_success','El horario se ha modificado correctamente');

            $this->redireccionar('horarios/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        $this->_view->assign('titulo','Nuevo Horario');
        $this->_view->assign('title','Nuevo Horario');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','horarios');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('horario', $_POST);

            if (!$this->getSql('rango_hora')) {
                $this->_view->assign('_error','Ingrese el rango del horario');
                $this->_view->renderizar('add');
                exit;
            }

            $horario = Horario::select('id')->where('rango_hora', $this->getSql('rango_hora'))->first();

            if ($horario) {
                $this->_view->assign('_error','El horario ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $horario = new Horario;
            $horario->rango_hora = $this->getSql('rango_hora');
            $horario->save();

            Session::set('msg_success','El horario se ha registrado correctamente');

            $this->redireccionar('horarios');
        }

        $this->_view->renderizar('add');
    }

    #########################################
    /*
    * consulta por id
    * redirecciona a ruta raiz
    */

    private function verificarHorario($id)
    {
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('horarios');
        }

        $horario = Horario::select('id')->find($this->filtrarInt($id));

        if (!$horario) {
            $this->redireccionar('horarios');
        }
    }
}
