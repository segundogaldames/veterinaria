<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-10 23:23:42
  from '/var/www/html/veterinaria/views/pacientes/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61dcea2e1c95e0_74622967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19de008d57e15f37d4620f57f97c0cefb3f099ad' => 
    array (
      0 => '/var/www/html/veterinaria/views/pacientes/view.tpl',
      1 => 1641867817,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../partials/_mensajes.tpl' => 1,
  ),
),false)) {
function content_61dcea2e1c95e0_74622967 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <th>Nombre:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['paciente']->value['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Código Chip:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['paciente']->value['codigo_chip'];?>
</td>
                    </tr>
                    <tr>
                        <th>Edad:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['paciente']->value['edad'];?>
 año(s)</td>
                    </tr>
                    <tr>
                        <th>Tamaño:</th>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['paciente']->value['tamanio'] == 1) {?>
                                Pequeño
                            <?php } elseif ($_smarty_tpl->tpl_vars['paciente']->value['tamanio'] == 2) {?>
                                Mediano
                            <?php } else { ?>
                                Grande
                            <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <th>Peso:</th>
                        <td><?php echo number_format($_smarty_tpl->tpl_vars['paciente']->value['peso'],3);?>
 Kg.</td>
                    </tr>
                    <tr>
                        <th>Paciente Tipo:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['paciente']->value['pacienteTipo']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Cliente:</th>
                        <td><?php echo $_smarty_tpl->tpl_vars['paciente']->value['cliente']['nombre'];?>
</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['paciente']->value['created_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['paciente']->value['updated_at'],"%d-%m-%Y %H:%M:%S");?>
</td>
                    </tr>
                </table>
                <p>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pacientes/edit/<?php echo $_smarty_tpl->tpl_vars['paciente']->value['id'];?>
"
                        class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
clientes/view/<?php echo $_smarty_tpl->tpl_vars['paciente']->value['cliente_id'];?>
" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section --><?php }
}
