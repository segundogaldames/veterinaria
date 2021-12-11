<?php
/* Smarty version 4.0.0-rc.0, created on 2021-12-11 17:25:44
  from '/var/www/html/veterinaria/views/usuarios/editPassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61b50948e5c437_71589940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf2eae891a8f2d7c8d3efb7178d400d038b2cbbf' => 
    array (
      0 => '/var/www/html/veterinaria/views/usuarios/editPassword.tpl',
      1 => 1639254230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
    'file:../usuarios/_form.tpl' => 1,
  ),
),false)) {
function content_61b50948e5c437_71589940 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                </h3>
                <h4>Funcionario(a): <?php echo $_smarty_tpl->tpl_vars['usuario']->value['funcionario']['nombre'];?>
</h4>
                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <p class="text-danger">Campos obligatorios *</p>
                <?php $_smarty_tpl->_subTemplateRender("file:../usuarios/_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
