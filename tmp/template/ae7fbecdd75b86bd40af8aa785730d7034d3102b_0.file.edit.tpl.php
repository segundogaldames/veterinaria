<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-10 23:38:33
  from '/var/www/html/veterinaria/views/pacientes/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61dceda9b0f8f5_34457254',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae7fbecdd75b86bd40af8aa785730d7034d3102b' => 
    array (
      0 => '/var/www/html/veterinaria/views/pacientes/edit.tpl',
      1 => 1641868674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
    'file:../pacientes/_form.tpl' => 1,
  ),
),false)) {
function content_61dceda9b0f8f5_34457254 (Smarty_Internal_Template $_smarty_tpl) {
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

                <p class="text-danger">Campos obligatorios *</p>
                <?php $_smarty_tpl->_subTemplateRender("file:../pacientes/_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
