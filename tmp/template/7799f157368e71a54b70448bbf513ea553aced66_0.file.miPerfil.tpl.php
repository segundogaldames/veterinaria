<?php
/* Smarty version 4.0.0-rc.0, created on 2022-03-28 18:09:26
  from '/var/www/html/veterinaria/views/funcionarios/miPerfil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_624224064125d9_18180958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7799f157368e71a54b70448bbf513ea553aced66' => 
    array (
      0 => '/var/www/html/veterinaria/views/funcionarios/miPerfil.tpl',
      1 => 1648501763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_624224064125d9_18180958 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/veterinaria/libs/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-5 ftco-animate">
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
                            <th>Roles:</th>
                            <td>
                                <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'rol');
$_smarty_tpl->tpl_vars['rol']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rol']->value) {
$_smarty_tpl->tpl_vars['rol']->do_else = false;
?>
                                        <li><?php echo $_smarty_tpl->tpl_vars['rol']->value['rol']['nombre'];?>
</li>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Teléfonos:</th>
                            <td>
                                <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['telefonos']->value, 'telefono');
$_smarty_tpl->tpl_vars['telefono']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['telefono']->value) {
$_smarty_tpl->tpl_vars['telefono']->do_else = false;
?>
                                        <li><?php echo $_smarty_tpl->tpl_vars['telefono']->value['numero'];?>
</li>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
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
usuarios/editPassword/<?php echo $_smarty_tpl->tpl_vars['funcionario']->value['id'];?>
"
                            class="btn btn-outline-success">Cambiar Password</a>


                    </p>
                </div>
            </div>
                        <div class="col-md-7 ftco-animate">
                                <div class="sidebar-box ftco-animate">
                    <form class="form-inline" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
reservas/horariosReserva" method="post">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="date" name="fecha" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['fecha']->value['fecha'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control"
                                id="inputPassword2" placeholder="Fecha">
                        </div>
                        <input type="hidden" name="enviar" value="<?php echo $_smarty_tpl->tpl_vars['enviar']->value;?>
">
                        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                    </form>
                    <h3>Reservas</h3>
                    <?php if ((isset($_smarty_tpl->tpl_vars['reservas']->value)) && count($_smarty_tpl->tpl_vars['reservas']->value)) {?>
                        <table class="table table-hover">
                            <tr>
                                <th>Fecha</th>
                                <th>Horario</th>
                                <th>Tipo de Servicio</th>
                                <th>Tipo de Paciente</th>
                                <th>Veterinario</th>
                                <th>Status</th>
                                <th>Reservado por</th>
                            </tr>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reservas']->value, 'reserva');
$_smarty_tpl->tpl_vars['reserva']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reserva']->value) {
$_smarty_tpl->tpl_vars['reserva']->do_else = false;
?>
                                <tr>
                                    <td>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
reservas/view/<?php echo $_smarty_tpl->tpl_vars['reserva']->value['id'];?>
">
                                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reserva']->value['fecha'],"%d-%m-%Y");?>

                                        </a>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['horario']['rango_hora'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['servicioTipo']['nombre'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['pacienteTipo']['nombre'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['funcionario']['nombre'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['reservaStatus']['nombre'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['reserva']->value['usuario']['funcionario']['nombre'];?>
</td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </table>
                    <?php } else { ?>
                        <p class="text-info">No hay reservas registradas</p>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
