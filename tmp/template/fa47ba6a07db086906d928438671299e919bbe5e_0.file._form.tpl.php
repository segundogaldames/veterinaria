<?php
/* Smarty version 4.0.0-rc.0, created on 2022-04-16 13:27:21
  from '/var/www/html/veterinaria/views/serviciotipos/_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_625afc799f42f5_54541187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa47ba6a07db086906d928438671299e919bbe5e' => 
    array (
      0 => '/var/www/html/veterinaria/views/serviciotipos/_form.tpl',
      1 => 1650129861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_625afc799f42f5_54541187 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post">
    <div class="mb-3">
        <label for="nombre" class="label text-success" style="font-weight: bold; font-size: 14px;">Nombre <span
                class="text-danger">*</span></label>
        <input type="text" name="nombre" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['tipo']->value['nombre'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id="" aria-describedby=""
            placeholder="Nombre del tipo de servicio">
    </div>
    <div class="mb-3">
        <label for="precio" class="label text-success" style="font-weight: bold; font-size: 14px;">Precio (CLP) <span
                class="text-danger">*</span></label>
        <input type="number" name="precio" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['tipo']->value['precio'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id=""
            aria-describedby="" placeholder="Precio del tipo de servicio">
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
