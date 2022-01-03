<form action="" method="post">
    <div class="mb-3">
        <label for="name" class="label text-success" style="font-weight: bold; font-size: 14px;">Título <span
                class="text-danger">*</span></label>
        <input type="text" name="titulo" value="{$video.titulo|default:""}" class="form-control" id=""
            aria-describedby="" placeholder="Título del video">
    </div>
    <div class="mb-3">
        <label for="name" class="label text-success" style="font-weight: bold; font-size: 14px;">Link <span
                class="text-danger">*</span></label>
        <textarea name="link" class="form-control" id="" rows="4" style="resize: none;" aria-describedby="" placeholder="Link del video">{$video.link|default:""}</textarea>
    </div>
    <input type="hidden" name="enviar" value="{$enviar}">
    <button type="submit" class="btn btn-outline-success">{$button}</button>
    <a href="{$_layoutParams.root}{$ruta}" class="btn btn-outline-primary">Volver</a>
</form>