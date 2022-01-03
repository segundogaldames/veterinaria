<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                </h3>

                {include file="../partials/_mensajes.tpl"}

                <table class="table table-hover">
                    <tr>
                        <th>Título:</th>
                        <td>{$video.titulo}</td>
                    </tr>
                    <tr>
                        <th>Autor:</th>
                        <td>{$video.usuario.funcionario.nombre}</td>
                    </tr>
                    <tr>
                        <th>Video:</th>
                        <td>{$video.link}</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{$video.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td>{$video.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    <a href="{$_layoutParams.root}videos/edit/{$video.id}"
                        class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="{$_layoutParams.root}videos/" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
                <form name="form" action="{$_layoutParams.root}videos/delete/{$video.id}" method="post">
                    <input type="hidden" name="enviar" value="{$enviar}">
                    <button type="button" onclick="eliminar('video','videos');"
                        class="btn btn-outline-warning">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</section> <!-- .section -->