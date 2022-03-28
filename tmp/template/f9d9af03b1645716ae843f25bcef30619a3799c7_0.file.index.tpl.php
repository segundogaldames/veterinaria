<?php
/* Smarty version 4.0.0-rc.0, created on 2022-03-28 15:01:57
  from '/var/www/html/veterinaria/views/roles/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6241f815cb84b9_16031613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9d9af03b1645716ae843f25bcef30619a3799c7' => 
    array (
      0 => '/var/www/html/veterinaria/views/roles/index.tpl',
      1 => 1643134953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_6241f815cb84b9_16031613 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
roles/add" class="btn btn-outline-success btn-sm">Crear Rol</a>
                </h3>

                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php if ((isset($_smarty_tpl->tpl_vars['roles']->value)) && count($_smarty_tpl->tpl_vars['roles']->value)) {?>
                    <table class="table table-hover">
                        <tr>
                            <th>Rol</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'rol');
$_smarty_tpl->tpl_vars['rol']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rol']->value) {
$_smarty_tpl->tpl_vars['rol']->do_else = false;
?>
                            <tr>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
roles/view/<?php echo $_smarty_tpl->tpl_vars['rol']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['rol']->value['nombre'];?>
</a>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                <?php } else { ?>
                    <p class="text-info">No hay roles registrados</p>
                <?php }?>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
