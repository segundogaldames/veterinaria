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
                        <th>Nombre:</th>
                        <td>{$tipo.nombre}</td>
                    </tr>
                    <tr>
                        <th>Exótico:</th>
                        <td>
                            {if $tipo.exotico == 1}
                                Si
                            {else}
                                No
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{$tipo.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td>{$tipo.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    <a href="{$_layoutParams.root}pacientetipos/edit/{$tipo.id}"
                        class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="{$_layoutParams.root}pacientetipos/" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section -->