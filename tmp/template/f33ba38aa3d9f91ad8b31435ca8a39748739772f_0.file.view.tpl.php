<?php
/* Smarty version 4.0.0-rc.0, created on 2021-11-15 19:46:08
  from '/var/www/html/veterinaria/views/comunas/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6192f140db2814_80013341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f33ba38aa3d9f91ad8b31435ca8a39748739772f' => 
    array (
      0 => '/var/www/html/veterinaria/views/comunas/view.tpl',
      1 => 1637019958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_6192f140db2814_80013341 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                </h3>

                <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <table class="table table-hover">
                    <tr>
                        <th>Comuna:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['comuna']->value['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Región:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['comuna']->value['region'];?>
</td>
                    </tr>
                </table>
                <p>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
comunas/edit/<?php echo $_smarty_tpl->tpl_vars['comuna']->value['id'];?>
"
                        class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
comunas/" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
