<?php
/* Smarty version 4.0.0-rc.0, created on 2021-11-22 22:36:02
  from '/var/www/html/veterinaria/views/admin/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_619c458215b921_92426237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7b81b9bf6e86ab4f3d27fdd94aab7cdb8aee976' => 
    array (
      0 => '/var/www/html/veterinaria/views/admin/index.tpl',
      1 => 1637631348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619c458215b921_92426237 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="ftco-section ftco-degree-bg">
    <div class="container">
            <div class="col-md-6 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3 class="text-success">Comunas</h3>
                    <div class="list-group mb-2">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
comunas/" class="list-group-item list-group-item-action">Comunas</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
regiones/" class="list-group-item list-group-item-action">Regiones</a>
                    </div>
                    <h3 class="text-success">Funcionarios</h3>
                    <div class="list-group mb-2">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
funcionarios/"
                            class="list-group-item list-group-item-action">Funcionarios</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
roles/" class="list-group-item list-group-item-action">Roles</a>
                    </div>
                </div>
            </div>
    </div>
</section> <!-- .section --><?php }
}
