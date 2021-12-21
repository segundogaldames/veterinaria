<?php
/* Smarty version 4.0.0-rc.0, created on 2021-12-20 21:50:11
  from '/var/www/html/veterinaria/views/funcionarioroles/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61c124c3e84040_39281424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd86fa6c8821923b26b3f4fd971943480a22e4c56' => 
    array (
      0 => '/var/www/html/veterinaria/views/funcionarioroles/view.tpl',
      1 => 1640047791,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_61c124c3e84040_39281424 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <th>Funcionario:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['funcionarioRol']->value['funcionario']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Rol:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['funcionarioRol']->value['rol']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['funcionarioRol']->value['created_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['funcionarioRol']->value['updated_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                </table>
                <p>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
funcionarioroles/edit/<?php echo $_smarty_tpl->tpl_vars['funcionarioRol']->value['id'];?>
"
                        class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
funcionarios/view/<?php echo $_smarty_tpl->tpl_vars['funcionarioRol']->value['funcionario_id'];?>
" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
                <form name="form" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
funcionarioroles/delete/<?php echo $_smarty_tpl->tpl_vars['funcionarioRol']->value['id'];?>
" method="post">
                    <input type="hidden" name="enviar" value="<?php echo $_smarty_tpl->tpl_vars['enviar']->value;?>
">
                    <button type="button" onclick="eliminar('rol');" class="btn btn-outline-warning">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
