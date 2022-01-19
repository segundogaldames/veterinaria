<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-19 00:03:57
  from '/var/www/html/veterinaria/views/serviciotipos/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61e77f9d354d36_35687655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '741d4515a8e999bad01ecb81a783ff1e8f34f891' => 
    array (
      0 => '/var/www/html/veterinaria/views/serviciotipos/view.tpl',
      1 => 1642561421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_61e77f9d354d36_35687655 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <th>Tipo de Servicio:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['tipo']->value['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['tipo']->value['created_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['tipo']->value['updated_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                </table>
                <p>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
serviciotipos/edit/<?php echo $_smarty_tpl->tpl_vars['tipo']->value['id'];?>
"
                        class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
serviciotipos/" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
