<form action="" method="post">
    {if $button == 'Editar'}
        <div class="mb-3">
            <label for="descripcion" class="label text-success" style="font-weight: bold; font-size: 14px;">Descripción <span
                    class="text-danger">*</span></label>
            <textarea name="descripcion" class="form-control" rows="10" placeholder="Descripción del servicio" style="resize: none;">
                {$servicio.descripcion|default:""}
            </textarea>
        </div>
    {/if}
    {if $button == 'Guardar'}
        <div class="mb-3">
            <label for="urgencia" class="label text-success" style="font-weight: bold; font-size: 14px;">Urgencia <span
                    class="text-danger">*</span></label>
            <select name="urgencia" class="form-control">

                <option value="">Seleccione...</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo Servicio <span
                    class="text-danger">*</span></label>
            <select name="tipo" class="form-control">

                <option value="">Seleccione...</option>
                {foreach from=$tipos item=tipo}
                    <option value="{$tipo.id}">{$tipo.nombre}</option>
                {/foreach}
            </select>
        </div>

        <div class="mb-3">
            <label for="funcionario" class="label text-success" style="font-weight: bold; font-size: 14px;">Veterinario
                <span class="text-danger">*</span></label>
            <select name="funcionario" class="form-control">
                <option value="">Seleccione...</option>
                {foreach from=$funcionarios item=funcionario}
                    <option value="{$funcionario.funcionario.id}">{$funcionario.funcionario.nombre}</option>
                {/foreach}
            </select>
        </div>
        <div class="mb-3">
            <label for="horario" class="label text-success" style="font-weight: bold; font-size: 14px;">Horario
                <span class="text-danger">*</span></label>
            <select name="horario" class="form-control">
                <option value="">Seleccione...</option>
                {foreach from=$horarios item=horario}
                    <option value="{$horario.id}">{$horario.rango_hora}</option>
                {/foreach}
            </select>
        </div>
    {/if}

    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}{$ruta}" class="btn btn-outline-primary">Volver</a>
</form>