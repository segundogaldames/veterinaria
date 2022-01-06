<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-05 22:14:15
  from '/var/www/html/veterinaria/views/videos/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61d6426714f684_88670958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f187be7f9bf12ec57b0fd36a0eff8a46b9d86993' => 
    array (
      0 => '/var/www/html/veterinaria/views/videos/view.tpl',
      1 => 1641431651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_61d6426714f684_88670958 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/veterinaria/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                </h3>

                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <table class="table table-hover">
                    <tr>
                        <th>Título:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['video']->value['titulo'];?>
</td>
                    </tr>
                    <tr>
                        <th>Autor:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['video']->value['usuario']['funcionario']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Video:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['video']->value['link'];?>
</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['video']->value['created_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['video']->value['updated_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                </table>
                <p>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
videos/" class="btn btn-outline-primary btn-sm">Volver</a>

                    <?php if (((Session::get('autenticado') !== null ))) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Session::get('usuario_roles')->funcionarioRol, 'funcionarioRol');
$_smarty_tpl->tpl_vars['funcionarioRol']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['funcionarioRol']->value) {
$_smarty_tpl->tpl_vars['funcionarioRol']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['funcionarioRol']->value['rol']['nombre'] == 'Administrador(a)') {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
videos/edit/<?php echo $_smarty_tpl->tpl_vars['video']->value['id'];?>
"
                                    class="btn btn-outline-primary btn-sm">Editar</a>

                                <form name="form" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
videos/delete/<?php echo $_smarty_tpl->tpl_vars['video']->value['id'];?>
" method="post">
                                    <input type="hidden" name="enviar" value="<?php echo $_smarty_tpl->tpl_vars['enviar']->value;?>
">
                                    <button type="button" onclick="eliminar('video','videos');"
                                    class="btn btn-outline-warning">Eliminar</button>
                                </form>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    <?php }?>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
