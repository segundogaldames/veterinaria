<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-19 00:04:46
  from '/var/www/html/veterinaria/views/serviciotipos/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61e77fcec795e3_20465342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '923b5e5a0b9f314fb6526996a6a90ef5884cd08e' => 
    array (
      0 => '/var/www/html/veterinaria/views/serviciotipos/edit.tpl',
      1 => 1642561482,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
    'file:../serviciotipos/_form.tpl' => 1,
  ),
),false)) {
function content_61e77fcec795e3_20465342 (Smarty_Internal_Template $_smarty_tpl) {
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
