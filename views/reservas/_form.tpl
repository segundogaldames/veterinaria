<form action="" method="post">
    {if $button == 'Guardar'}
        <div class="mb-3">
            <label for="nombre_paciente" class="label text-success" style="font-weight: bold; font-size: 14px;">Nombre del Paciente <span
                    class="text-danger">*</span></label>
            <input type="text" name="nombre_paciente" value="{$reserva.nombre_paciente|default:""}" class="form-control" id=""
                aria-describedby="" placeholder="Nombre del paciente">
        </div>
        <div class="mb-3">
            <label for="paciente_tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo Paciente <span class="text-danger">*</span></label>
            <select name="paciente_tipo" class="form-control">
                <option value="">Seleccione...</option>
                {foreach from=$pacienteTipos item=pacienteTipo}
                    <option value="{$pacienteTipo.id}">{$pacienteTipo.nombre}</option>
                {/foreach}
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre_cliente" class="label text-success" style="font-weight: bold; font-size: 14px;">Nombre del
                Cliente <span class="text-danger">*</span></label>
            <input type="text" name="nombre_cliente" value="{$reserva.nombre_cliente|default:""}" class="form-control"
                id="" aria-describedby="" placeholder="Nombre del cliente">
        </div>
        <div class="mb-3">
            <label for="servicio_tipo" class="label text-success" style="font-weight: bold; font-size: 14px;">Tipo Servicio
                <span class="text-danger">*</span></label>
            <select name="servicio_tipo" class="form-control">
                <option value="">Seleccione...</option>
                {foreach from=$servicioTipos item=servicioTipo}
                    <option value="{$servicioTipo.id}">{$servicioTipo.nombre}</option>
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
    {/if}
    {if $button == 'Editar'}
        <div class="mb-3">
            <label for="status" class="label text-success" style="font-weight: bold; font-size: 14px;">Status
                <span class="text-danger">*</span></label>
            <select name="status" class="form-control">
                <option value="{$reserva.reserva_status_id}">{$reserva.reservaStatus.nombre}</option>

                <option value="">Seleccione...</option>
                {foreach from=$statuses item=status}
                    <option value="{$status.id}">{$status.nombre}</option>
                {/foreach}
            </select>
        </div>
    {/if}
    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}{$ruta}" class="btn btn-outline-primary">Volver</a>
</form>