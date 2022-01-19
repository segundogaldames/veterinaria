<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-19 00:01:45
  from '/var/www/html/veterinaria/views/serviciotipos/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61e77f19aefc35_33626967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2975d4dd85faecb3548f8b1f8c460d5722b6fd76' => 
    array (
      0 => '/var/www/html/veterinaria/views/serviciotipos/index.tpl',
      1 => 1642561302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_61e77f19aefc35_33626967 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
serviciotipos/add" class="btn btn-outline-success btn-sm">Crear Servicio Tipo</a>
                </h3>

                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php if ((isset($_smarty_tpl->tpl_vars['tipos']->value)) && count($_smarty_tpl->tpl_vars['tipos']->value)) {?>
                    <table class="table table-hover">
                        <tr>
                            <th>Tipo Servicio</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos']->value, 'tipo');
$_smarty_tpl->tpl_vars['tipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->do_else = false;
?>
                            <tr>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
serviciotipos/view/<?php echo $_smarty_tpl->tpl_vars['tipo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipo']->value['nombre'];?>
</a>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                <?php } else { ?>
                    <p class="text-info">No hay tipos de servicio registrados</p>
                <?php }?>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
