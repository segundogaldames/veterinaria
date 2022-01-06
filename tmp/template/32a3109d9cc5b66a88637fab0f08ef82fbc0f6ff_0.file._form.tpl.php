<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-05 23:01:58
  from '/var/www/html/veterinaria/views/pacientetipos/_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61d64d96de6b25_69245780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32a3109d9cc5b66a88637fab0f08ef82fbc0f6ff' => 
    array (
      0 => '/var/www/html/veterinaria/views/pacientetipos/_form.tpl',
      1 => 1641434478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61d64d96de6b25_69245780 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post">
    <div class="mb-3">
        <label for="name" class="label text-success" style="font-weight: bold; font-size: 14px;">Nombre <span
                class="text-danger">*</span></label>
        <input type="text" name="nombre" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['tipo']->value['nombre'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id="" aria-describedby=""
            placeholder="Nombre del paciente tipo">
    </div>
    <div class="mb-3">
        <label for="exotico" class="label text-success" style="font-weight: bold; font-size: 14px;">Exótico <span
                class="text-danger">*</span></label>
        <select name="exotico" class="form-control">
            <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Editar') {?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['exotico'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['tipo']->value['exotico'] == 1) {?>
                        Si
                    <?php } else { ?>
                        No
                    <?php }?>
                </option>
            <?php }?>

            <option value="">Seleccione...</option>
            <option value="1">Si</option>
            <option value="2">No</option>
        </select>
    </div>

    <input type="hidden" name="enviar" value="<?php echo $_smarty_tpl->tpl_vars['enviar']->value;?>
">
    <button type="submit" class="btn btn-outline-success"><?php echo $_smarty_tpl->tpl_vars['button']->value;?>
</button>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];
echo $_smarty_tpl->tpl_vars['ruta']->value;?>
" class="btn btn-outline-primary">Volver</a>
</form><?php }
}
