<form action="" method="post">
    <div class="mb-3">
        <label for="codigo" class="label text-success" style="font-weight: bold; font-size: 14px;">Código<span
                class="text-danger">*</span></label>
        <input type="text" name="codigo" value="{$producto.codigo|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Código del producto">
    </div>
    <div class="mb-3">
        <label for="nombre" class="label text-success" style="font-weight: bold; font-size: 14px;">Nombre<span
                class="text-danger">*</span></label>
        <input type="text" name="nombre" value="{$producto.nombre|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Nombre del producto">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="label text-success"
            style="font-weight: bold; font-size: 14px;">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="4" placeholder="'Descripción del producto">
            {$producto.descripcion|default:""}
        </textarea>
    </div>
    <div class="mb-3">
        <label for="precio_venta" class="label text-success" style="font-weight: bold; font-size: 14px;">Precio de
            venta</label>
        <input type="number" name="precio_venta" value="{$producto.precio_venta|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Precio de venta del producto">
    </div>
    <div class="mb-3">
        <label for="tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo de producto<span
                class="text-danger">*</span></label>
        <select name="tipo" class="form-control">
            {if $button == 'Editar'}
                <option value="{$producto.producto_tipo_id}">
                    {$producto.productoTipo.nombre}
                </option>
            {/if}
            <option value="">Seleccione...</option>
            {foreach from=$tipos item=tipo}
                <option value="{$tipo.id}">{$tipo.nombre}</option>
            {/foreach}
        </select>
    </div>
    <div class="mb-3">
        <label for="pacienteTipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo de
            paciente<span class="text-danger">*</span></label>
        <select name="pacienteTipo" class="form-control">
            {if $button == 'Editar'}
                <option value="{$producto.paciente_tipo_id}">
                    {$producto.pacienteTipo.nombre}
                </option>
            {/if}
            <option value="">Seleccione...</option>
            {foreach from=$pacienteTipos item=pacienteTipo}
                <option value="{$pacienteTipo.id}">{$pacienteTipo.nombre}</option>
            {/foreach}
        </select>
    </div>
    {if $button == 'Editar'}
        <div class="mb-3">
            <label for="status" class="label text-success" style="font-weight: bold; font-size: 14px;">Status<span
                    class="text-danger">*</span></label>
            <select name="status" class="form-control">

                {if $producto.status == 1}
                    <option value="{$producto.status}">Activo</option>
                    <option value="2">Desactivar</option>
                {else}
                    <option value="{$producto.status}">Inactivo</option>
                    <option value="1">Activar</option>
                {/if}

            </select>
        </div>
    {/if}
    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}{$ruta}" class="btn btn-outline-primary">Volver</a>
</form>