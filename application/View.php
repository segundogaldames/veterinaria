<?php
//llamada al archivo de generacion de plantillas Smarty
require_once ROOT . 'libs' . DS . 'smarty' . DS . 'libs' . DS . 'Smarty.class.php';

class View extends Smarty
{
	private $_controlador;
	private $_js;
	private $_acl;

	public function __construct(Request $peticion){
		parent::__construct();
		$this->_controlador = $peticion->getControlador();
		$this->_js = array();
	}

	public function renderizar($vista, $item = false)
	{
		//configuracion de los directorios de la libreria Smarty
		$this->template_dir = ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS;
		$this->config_dir = ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'configs' .DS;
		$this->cache_dir = ROOT . 'tmp' . DS . 'cache' . DS;
		$this->compile_dir = ROOT . 'tmp' . DS . 'template' . DS;

		//configuracion de los menus de los templates o vistas
		$menu = array(
			array(
			),
			array(

				)
			);

		//activacion de vista inicio y cierre de sesiones
		/*if(Session::get('autenticado')):
			$menu[] = array(
				'id' => 'login',
				'titulo' => 'Cerrar Sesion',
				'enlace' => BASE_URL . 'login/cerrar'
				);
		else:
			$menu[] = array(
				'id' => 'login',
				'titulo' => 'Iniciar Sesion',
				'enlace' => BASE_URL . 'login'
				);
			$menu[] = array(
				'id' => 'registro',
				'titulo' => 'Registrar',
				'enlace' => BASE_URL . 'registro'
				);
		endif;*/

		$js = array();

		if(count($this->_js)):
			$js = $this->_js;
		endif;

		//configuracion de rutas de css, js e img para las vistas
		$_params = array(
			'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
			'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
			'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
			'menu' => $menu,
			'item' => $item,
			'js' => $js,
			'root' => BASE_URL,
			'configs' => array(

				)
			);

		$rutaWiev = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.tpl';

		if(is_readable($rutaWiev)):
			$this->assign('_contenido', $rutaWiev);
		else:
			throw new Exception("Error de vista");

		endif;

		$this->assign('_acl', $this->_acl);
		$this->assign('_layoutParams', $_params);
		$this->display('template.tpl');
	}

	public function setJs(array $js)
	{
		if(is_array($js) && count($js)):
			for($i = 0;$i < count($js);$i++ ):
				$this->_js[] = BASE_URL . 'views/' . $this->_controlador . '/js/' . $js[$i] . '.js';
			endfor;
		else:
			throw new Exception("Error de js");

		endif;
	}
}