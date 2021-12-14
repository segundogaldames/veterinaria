<?php
/* Smarty version 4.0.0-rc.0, created on 2021-12-13 22:23:33
  from '/var/www/html/veterinaria/views/funcionarios/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61b7f215cda2d5_32680451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18b8628ec338e2ef45bb505e463c6ffa021ba082' => 
    array (
      0 => '/var/www/html/veterinaria/views/funcionarios/view.tpl',
      1 => 1639445010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_61b7f215cda2d5_32680451 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/veterinaria/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">

            <div class="col-md-6 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3>
                        <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

                    </h3>

                    <?php $_smarty_tpl->_subTemplateRender("file:../partials/_mensajes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


                    <table class="table table-hover">
                        <tr>
                            <th>RUN:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['funcionario']->value['rut'];?>
</td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['funcionario']->value['nombre'];?>
</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['funcionario']->value['email'];?>
</td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['funcionario']->value['direccion'];?>
</td>
                        </tr>
                        <tr>
                            <th>Comuna:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['funcionario']->value['comuna']['nombre'];?>
</td>
                        </tr>
                        <tr>
                            <th>Región:</th>
                            <td><?php echo $_smarty_tpl->tpl_vars['funcionario']->value['comuna']['region']['nombre'];?>
</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['funcionario']->value['created_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['funcionario']->value['updated_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                        </tr>
                        <tr>
                            <th>Activo:</th>
                            <?php if ((isset($_smarty_tpl->tpl_vars['funcionario']->value['usuario']))) {?>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['funcionario']->value['usuario']['activo'] == 1) {?>
                                        Si
                                    <?php } else { ?>
                                        No
                                    <?php }?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/edit/<?php echo $_smarty_tpl->tpl_vars['funcionario']->value['usuario']['id'];?>
">Cambiar Estado</a>
                                </td>
                            <?php } else { ?>
                                <td>
                                    No tiene una cuenta asociada
                                </td>
                            <?php }?>
                        </tr>
                    </table>
                    <p>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
funcionarios/edit/<?php echo $_smarty_tpl->tpl_vars['funcionario']->value['id'];?>
"
                            class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
funcionarios/" class="btn btn-outline-primary btn-sm">Volver</a>

                        <?php if (!(isset($_smarty_tpl->tpl_vars['funcionario']->value['usuario']['id']))) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/add/<?php echo $_smarty_tpl->tpl_vars['funcionario']->value['id'];?>
" class="btn btn-outline-success">Crear Cuenta</a>
                        <?php } else { ?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/editPassword/<?php echo $_smarty_tpl->tpl_vars['funcionario']->value['usuario']['id'];?>
"
                                class="btn btn-outline-success">Cambiar Password</a>
                        <?php }?>

                    </p>
                </div>
            </div>
                        <div class="col-md-6 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3>Roles</h3>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
funcionarioroles/add/<?php echo $_smarty_tpl->tpl_vars['funcionario']->value['id'];?>
" class="btn btn-outline-success btn-sm">Agregar Rol</a>

                    <?php if ((isset($_smarty_tpl->tpl_vars['roles']->value)) && count($_smarty_tpl->tpl_vars['roles']->value)) {?>
                        <div class="list-group mt-3">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'rol');
$_smarty_tpl->tpl_vars['rol']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rol']->value) {
$_smarty_tpl->tpl_vars['rol']->do_else = false;
?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
funcionarioroles/view/<?php echo $_smarty_tpl->tpl_vars['rol']->value['id'];?>
" class="list-group-item list-group-item-action"><?php echo $_smarty_tpl->tpl_vars['rol']->value['rol']['nombre'];?>
</a>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </div>
                    <?php } else { ?>
                        <p class="text-info">No hay roles asociados</p>
                    <?php }?>
                </div>
                                <div class="sidebar-box ftco-animate">
                    <h3>Teléfonos</h3>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
telefonos/add/<?php echo $_smarty_tpl->tpl_vars['funcionario']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"
                        class="btn btn-outline-success btn-sm">Agregar Teléfono</a>

                    <?php if ((isset($_smarty_tpl->tpl_vars['telefonos']->value)) && count($_smarty_tpl->tpl_vars['telefonos']->value)) {?>
                        <table class="table table-hover table-responsive">
                            <tr>
                                <th>Número</th>
                                <th>Móvil</th>
                            </tr>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['telefonos']->value, 'telefono');
$_smarty_tpl->tpl_vars['telefono']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['telefono']->value) {
$_smarty_tpl->tpl_vars['telefono']->do_else = false;
?>
                                <tr>
                                    <td>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
telefonos/view/<?php echo $_smarty_tpl->tpl_vars['telefono']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['telefono']->value['numero'];?>
</a>
                                    </td>
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['telefono']->value['movil'] == 1) {?>
                                            Si
                                        <?php } else { ?>
                                            No
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </table>
                    <?php } else { ?>
                        <p class="text-info">No hay teléfonos asociados</p>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
