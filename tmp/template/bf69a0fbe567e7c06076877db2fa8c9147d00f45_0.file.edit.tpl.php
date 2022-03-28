<?php
/* Smarty version 4.0.0-rc.0, created on 2022-03-28 17:58:23
  from '/var/www/html/veterinaria/views/reservas/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6242216f68c527_53187335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf69a0fbe567e7c06076877db2fa8c9147d00f45' => 
    array (
      0 => '/var/www/html/veterinaria/views/reservas/edit.tpl',
      1 => 1648501099,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
    'file:../reservas/_form.tpl' => 1,
  ),
),false)) {
function content_6242216f68c527_53187335 (Smarty_Internal_Template $_smarty_tpl) {
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

                <p class="text-danger">Campos obligatorios *</p>
                <p>Fecha: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reserva']->value['fecha'],"%d-%m-%Y");?>
</p>
                <p>Horario: <?php echo $_smarty_tpl->tpl_vars['reserva']->value['horario']['rango_hora'];?>
</p>
                <?php $_smarty_tpl->_subTemplateRender("file:../reservas/_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
