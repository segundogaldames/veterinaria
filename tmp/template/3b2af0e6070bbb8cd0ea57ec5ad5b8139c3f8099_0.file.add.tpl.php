<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-18 23:54:41
  from '/var/www/html/veterinaria/views/serviciotipos/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61e77d71f05093_10250580',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b2af0e6070bbb8cd0ea57ec5ad5b8139c3f8099' => 
    array (
      0 => '/var/www/html/veterinaria/views/serviciotipos/add.tpl',
      1 => 1642560879,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
    'file:../serviciotipos/_form.tpl' => 1,
  ),
),false)) {
function content_61e77d71f05093_10250580 (Smarty_Internal_Template $_smarty_tpl) {
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
                <?php $_smarty_tpl->_subTemplateRender("file:../serviciotipos/_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
