<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-21 16:59:55
  from '/var/www/html/veterinaria/views/servicios/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61eb10bbba96a9_84859227',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a362392910b0daf6164434fe355dabf6f486c9a' => 
    array (
      0 => '/var/www/html/veterinaria/views/servicios/add.tpl',
      1 => 1642795123,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
    'file:../servicios/_form.tpl' => 1,
  ),
),false)) {
function content_61eb10bbba96a9_84859227 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                </h3>
                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <h4>Cliente: <?php echo $_smarty_tpl->tpl_vars['paciente']->value['cliente']['nombre'];?>
</h4>
                <h5>Paciente: <?php echo $_smarty_tpl->tpl_vars['paciente']->value['nombre'];?>
</h5>

                <p class="text-danger">Campos obligatorios *</p>
                <?php $_smarty_tpl->_subTemplateRender("file:../servicios/_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
