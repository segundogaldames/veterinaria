<?php

use models\Video;

class videosController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->verificarMensajes();

        $this->_view->assign('titulo','Videos');
        $this->_view->assign('title','Video Tutoriales');
        $this->_view->assign('videos', Video::with('usuario')->orderBy('id', 'DESC')->get());
        $this->_view->renderizar('index');
    }

    public function view($id = null)
    {
        $this->verificarMensajes();
        $this->verificarVideo($id);

        $this->_view->assign('titulo','Video');
        $this->_view->assign('title','Video Tutorial');
        $this->_view->assign('video', Video::with('usuario')->find($this->filtrarInt($id)));
        $this->_view->renderizar('view');
    }

    public function edit($id = null)
    {
        $this->verificarSession();
        $this->verificarRolAdmin();
        $this->verificarVideo($id);

        $this->_view->assign('titulo','Editar Video');
        $this->_view->assign('title','Editar Video');
        $this->_view->assign('button','Editar');
        $this->_view->assign('ruta','videos/view/' , $this->filtrarInt($id));
        $this->_view->assign('video', Video::with('usuario')->find($this->filtrarInt($id)));
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {

            $titulo = $this->getSql('titulo');
            $link = $this->getPostParam('link');

        if (!$titulo) {
            $this->_view->assign('_error','Ingrese el título del video');
            $this->_view->renderizar('edit');
            exit;
        }

        if (!$link) {
            $this->_view->assign('_error','Ingrese el link del video');
            $this->_view->renderizar('edit');
            exit;
        }

        $video = Video::select('id')->where('titulo', $titulo)->where('link', $link)->first();

        if ($video) {
            $this->_view->assign('_error','El video ingresado ya existe... modifique algunos de los datos para continuar');
            $this->_view->renderizar('edit');
            exit;
        }

        $video = Video::find($this->filtrarInt($id));
        $video->titulo = $titulo;
        $video->link = $link;
        $video->save();

        Session::set('msg_success','El video se ha modificado correctamente');

        $this->redireccionar('videos/view/' . $this->filtrarInt($id));
        }

        $this->_view->renderizar('edit');
    }

    public function add()
    {
        $this->verificarSession();
        $this->verificarRolAdmin();

        $this->_view->assign('titulo','Nuevo Video');
        $this->_view->assign('title','Nuevo Video');
        $this->_view->assign('button','Guardar');
        $this->_view->assign('ruta','videos');
        $this->_view->assign('enviar', CTRL);

        if ($this->getAlphaNum('enviar') == CTRL) {
            $this->_view->assign('video', $_POST);

            $titulo = $this->getSql('titulo');
            $link = $this->getPostParam('link');

            if (!$titulo) {
                $this->_view->assign('_error','Ingrese el título del video');
                $this->_view->renderizar('add');
                exit;
            }

            if (!$link) {
                $this->_view->assign('_error','Ingrese el link del video');
                $this->_view->renderizar('add');
                exit;
            }

            $video = Video::select('id')->where('link', $link)->first();

            if ($video) {
                $this->_view->assign('_error','El video ingresado ya existe... intente con otro');
                $this->_view->renderizar('add');
                exit;
            }

            $video = new Video;
            $video->titulo = $titulo;
            $video->link = $link;
            $video->usuario_id = Session::get('usuario_id');
            $video->save();

            Session::set('msg_success','El video se ha registrado correctamente');

            $this->redireccionar('videos');
        }

        $this->_view->renderizar('add');
    }

    public function delete($id = null)
    {
        $this->verificarSession();
        $this->verificarRolAdmin();
        $this->filtrarInt($id);
        $this->verificarVideo($id);

        $video = Video::find($id);

        if ($video) {
            $video->delete();
            Session::set('msg_success', 'El video se ha eliminado correctamente');
        }else {
            Session::set('msg_success', 'El video no se ha eliminado... intente mas tarde');
        }

        $this->redireccionar('videos');
    }

    ################################################
    private function verificarVideo($id)
    {
        $id = $this->filtrarInt($id);

        if (!$id) {
            $this->redireccionar('videos');
        }

        $video = Video::select('id')->find($id);

        if (!$video) {
            $this->redireccionar('videos');
        }
    }
}
