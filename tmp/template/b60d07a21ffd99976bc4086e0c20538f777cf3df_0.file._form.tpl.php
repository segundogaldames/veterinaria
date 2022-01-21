<?php
/* Smarty version 4.0.0-rc.0, created on 2022-01-21 18:43:16
  from '/var/www/html/veterinaria/views/servicios/_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_61eb28f4612dd7_82286420',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b60d07a21ffd99976bc4086e0c20538f777cf3df' => 
    array (
      0 => '/var/www/html/veterinaria/views/servicios/_form.tpl',
      1 => 1642801392,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61eb28f4612dd7_82286420 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post">
    <div class="mb-3">
        <label for="descripcion" class="label text-success" style="font-weight: bold; font-size: 14px;">Descripción <span
                class="text-danger">*</span></label>
        <textarea name="descripcion" class="form-control" rows="10" placeholder="Descripción del servicio" style="resize: none;">
            <?php echo (($tmp = $_smarty_tpl->tpl_vars['servicio']->value['descripcion'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

        </textarea>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Guardar') {?>
        <div class="mb-3">
            <label for="precio" class="label text-success" style="font-weight: bold; font-size: 14px;">Precio (CLP)</span></label>
            <input type="number" name="precio" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['servicio']->value['precio'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" id=""
                aria-describedby="" placeholder="Precio del servicio">
        </div>

        <div class="mb-3">
            <label for="urgencia" class="label text-success" style="font-weight: bold; font-size: 14px;">Urgencia <span
                    class="text-danger">*</span></label>
            <select name="urgencia" class="form-control">

                <option value="">Seleccione...</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
    <?php }?>

    <div class="mb-3">
        <label for="tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo Servicio <span
                class="text-danger">*</span></label>
        <select name="tipo" class="form-control">
            <?php if ($_smarty_tpl->tpl_vars['button']->value == 'Editar') {?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['servicio']->value['servicio_tipo_id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['servicio']->value['servicioTipo']['nombre'];?>

                </option>
            <?php }?>

            <option value="">Seleccione...</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos']->value, 'tipo');
$_smarty_tpl->tpl_vars['tipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipo']->value['nombre'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
