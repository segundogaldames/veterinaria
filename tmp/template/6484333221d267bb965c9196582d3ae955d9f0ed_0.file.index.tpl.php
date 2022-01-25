<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-25 17:17:18
  from '/var/www/html/veterinaria/views/horarios/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61f05ace5f6455_66002720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6484333221d267bb965c9196582d3ae955d9f0ed' => 
    array (
      0 => '/var/www/html/veterinaria/views/horarios/index.tpl',
      1 => 1643141836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_61f05ace5f6455_66002720 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
horarios/add" class="btn btn-outline-success btn-sm">Crear Horario</a>
                </h3>

                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php if ((isset($_smarty_tpl->tpl_vars['horarios']->value)) && count($_smarty_tpl->tpl_vars['horarios']->value)) {?>
                    <table class="table table-hover">
                        <tr>
                            <th>Rango Horario</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['horarios']->value, 'horario');
$_smarty_tpl->tpl_vars['horario']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['horario']->value) {
$_smarty_tpl->tpl_vars['horario']->do_else = false;
?>
                            <tr>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
horarios/view/<?php echo $_smarty_tpl->tpl_vars['horario']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['horario']->value['rango_hora'];?>
</a>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                <?php } else { ?>
                    <p class="text-info">No hay horarios registrados</p>
                <?php }?>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
