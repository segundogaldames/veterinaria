<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                    {if isset(Session::get('autenticado'))}
                        {foreach from=Session::get('usuario_roles')->funcionarioRol item=funcionarioRol}
                            {if $funcionarioRol.rol.nombre == 'Administrador(a)'}
                                <a href="{$_layoutParams.root}videos/add" class="btn btn-outline-success btn-sm">Crear Video</a>
                            {/if}
                        {/foreach}

                    {/if}
                </h3>

                {include file="../partials/_mensajes.tpl"}

                {if isset($videos) && count($videos)}
                    <table class="table table-hover">
                        <tr>
                            <th>Título</th>
                            <th>Fecha Creación</th>
                        </tr>
                        {foreach from=$videos item=video}
                            <tr>
                                <td>
                                    <a href="{$_layoutParams.root}videos/view/{$video.id}">{$video.titulo}</a>
                                </td>
                                <td>
                                    {$video.created_at|date_format:"%d-%m-%Y"}
                                </td>
                            </tr>
                        {/foreach}
                    </table>
                {else}
                    <p class="text-info">No hay videos registrados</p>
                {/if}
            </div>
        </div>
    </div>
</section> <!-- .section -->