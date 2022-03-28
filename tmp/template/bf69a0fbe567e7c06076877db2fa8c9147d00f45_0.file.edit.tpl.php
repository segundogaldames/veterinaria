<?php
/* Smarty version 4.0.0-rc.0, created on 2022-03-23 15:13:58
  from '/var/www/html/veterinaria/views/reservas/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_623b63666bc129_27641021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf69a0fbe567e7c06076877db2fa8c9147d00f45' => 
    array (
      0 => '/var/www/html/veterinaria/views/reservas/edit.tpl',
      1 => 1648058674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
    'file:../reservas/_form.tpl' => 1,
  ),
),false)) {
function content_623b63666bc129_27641021 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                </h3>
                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <p class="text-danger">Campos obligatorios *</p>
                <?php $_smarty_tpl->_subTemplateRender("file:../reservas/_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
