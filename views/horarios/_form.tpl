<form action="" method="post">
    <div class="mb-3">
        <label for="rango_hora" class="label text-success" style="font-weight: bold; font-size: 14px;">Rango Horario <span
                class="text-danger">*</span></label>
        <input type="text" name="rango_hora" value="{$horario.rango_hora|default:""}" class="form-control" id="" aria-describedby=""
            placeholder="Rango horario">
    </div>
    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}{$ruta}" class="btn btn-outline-primary">Volver</a>
</form>