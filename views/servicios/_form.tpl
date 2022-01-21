<form action="" method="post">
    <div class="mb-3">
        <label for="descripcion" class="label text-success" style="font-weight: bold; font-size: 14px;">Descripción <span
                class="text-danger">*</span></label>
        <textarea name="descripcion" class="form-control" rows="10" placeholder="Descripción del servicio" style="resize: none;">
            {$servicio.descripcion|default:""}
        </textarea>
    </div>
    {if $button == 'Guardar'}
        <div class="mb-3">
            <label for="precio" class="label text-success" style="font-weight: bold; font-size: 14px;">Precio (CLP)</span></label>
            <input type="number" name="precio" value="{$servicio.precio|default:""}" class="form-control" id=""
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
    {/if}

    <div class="mb-3">
        <label for="tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo Servicio <span
                class="text-danger">*</span></label>
        <select name="tipo" class="form-control">
            {if $button == 'Editar'}
                <option value="{$servicio.servicio_tipo_id}">
                    {$servicio.servicioTipo.nombre}
                </option>
            {/if}

            <option value="">Seleccione...</option>
            {foreach from=$tipos item=tipo}
                <option value="{$tipo.id}">{$tipo.nombre}</option>
            {/foreach}
        </select>
    </div>

    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}{$ruta}" class="btn btn-outline-primary">Volver</a>
</form>