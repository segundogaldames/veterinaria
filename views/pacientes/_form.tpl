<form action="" method="post">
    <div class="mb-3">
        <label for="name" class="label text-success" style="font-weight: bold; font-size: 14px;">Nombre <span
                class="text-danger">*</span></label>
        <input type="text" name="nombre" value="{$paciente.nombre|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Nombre del paciente">
    </div>
    <div class="mb-3">
        <label for="codigo_chip" class="label text-success" style="font-weight: bold; font-size: 14px;">Chip (opcional)</span></label>
        <input type="text" name="codigo_chip" value="{$paciente.codigo_chip|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Código chip del paciente">
    </div>
    <div class="mb-3">
        <label for="edad" class="label text-success" style="font-weight: bold; font-size: 14px;">Edad (años) <span
                class="text-danger">*</span></label>
        <input type="number" name="edad" value="{$paciente.edad|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Edad del paciente (en años)">
    </div>

    <div class="mb-3">
        <label for="tamanio" class="label text-success" style="font-weight: bold; font-size: 14px;">Tamaño <span
                class="text-danger">*</span></label>
        <select name="tamanio" class="form-control">
            {if $button == 'Editar'}
                <option value="{$paciente.tamanio}">
                    {if $paciente.tamanio == 1}
                        Pequeño
                    {elseif $paciente.tamanio == 2}
                        Mediano
                    {else}
                        Grande
                    {/if}
                </option>
            {/if}

            <option value="">Seleccione...</option>
            <option value="1">Pequeño</option>
            <option value="2">Mediano</option>
            <option value="3">Grande</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="peso" class="label text-success" style="font-weight: bold; font-size: 14px;">Peso (kg) <span
                class="text-danger">*</span></label>
        <input type="text" name="peso" value="{$paciente.peso|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Peso del paciente (en kilogramos)">
    </div>

    <div class="mb-3">
        <label for="tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo Paciente <span
                class="text-danger">*</span></label>
        <select name="tipo" class="form-control">
            {if $button == 'Editar'}
                <option value="{$paciente.paciente_tipo_id}">
                    {$paciente.pacienteTipo.nombre}
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