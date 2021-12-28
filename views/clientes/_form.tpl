<form action="" method="post">
    {if $button == 'Guardar'}
        <div class="mb-3">
            <label for="rut" class="label text-success" style="font-weight: bold; font-size: 14px;">RUT <span
                    class="text-danger">*</span></label>
            <input type="text" name="rut" value="{$cliente.rut|default:""}" class="form-control" id=""
                aria-describedby="" placeholder="Rut del cliente">
        </div>
    {/if}
    <div class="mb-3">
        <label for="nombre" class="label text-success" style="font-weight: bold; font-size: 14px;">Nombre <span
                class="text-danger">*</span></label>
        <input type="text" name="nombre" value="{$cliente.nombre|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Nombre del Cliente">
    </div>

    <div class="mb-3">
        <label for="email" class="label text-success" style="font-weight: bold; font-size: 14px;">Email <span
            class="text-danger">*</span></label>
        <input type="email" name="email" value="{$cliente.email|default:""}" class="form-control" id=""
                aria-describedby="" placeholder="Email del cliente">
    </div>

    <div class="mb-3">
        <label for="direccion" class="label text-success" style="font-weight: bold; font-size: 14px;">Dirección <span
                class="text-danger">*</span></label>
        <input type="text" name="direccion" value="{$cliente.direccion|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Dirección del cliente">
    </div>
    <div class="mb-3">
        <label for="comuna" class="label text-success" style="font-weight: bold; font-size: 14px;">Comuna <span
                class="text-danger">*</span></label>
        <select name="comuna" class="form-control" id="">
            {if $button == 'Editar'}
                <option value="{$cliente.comuna_id}">{$cliente.comuna.nombre}</option>
            {/if}

            <option value="">Seleccione...</option>
            {foreach from=$comunas item=comuna}
                <option value="{$comuna.id}">{$comuna.nombre}</option>
            {/foreach}
        </select>
    </div>
    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}{$ruta}" class="btn btn-outline-primary">Volver</a>
</form>