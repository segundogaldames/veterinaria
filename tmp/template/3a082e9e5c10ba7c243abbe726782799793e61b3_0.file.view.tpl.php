<?php
/* Smarty version 4.0.0-rc.0, created on 2021-12-13 22:44:25
  from '/var/www/html/veterinaria/views/telefonos/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61b7f6f9e18238_12222849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a082e9e5c10ba7c243abbe726782799793e61b3' => 
    array (
      0 => '/var/www/html/veterinaria/views/telefonos/view.tpl',
      1 => 1639446213,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_61b7f6f9e18238_12222849 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/veterinaria/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<section class="ftco-section ftco-degree-bg">
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
                        <th>Teléfono:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['telefono']->value['numero'];?>
</td>
                    </tr>
                    <tr>
                        <th>Tipo:</th>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['telefono']->value['movil'] == 1) {?>
                                Móvil
                            <?php } else { ?>
                                Fijo
                            <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <th>Usuario:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Modelo:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['telefono']->value['telefonoable_type'];?>
</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['telefono']->value['created_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['telefono']->value['updated_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                </table>
                <p>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
telefonos/edit/<?php echo $_smarty_tpl->tpl_vars['telefono']->value['id'];?>
"
                        class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];
echo $_smarty_tpl->tpl_vars['ruta']->value;?>
" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
