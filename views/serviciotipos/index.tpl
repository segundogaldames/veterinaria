<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                    <a href="{$_layoutParams.root}serviciotipos/add" class="btn btn-outline-success btn-sm">Crear Servicio Tipo</a>
                </h3>

                {include file="../partials/_mensajes.tpl"}

                {if isset($tipos) && count($tipos)}
                    <table class="table table-hover">
                        <tr>
                            <th>Tipo Servicio</th>
                            <th>Precio</th>
                        </tr>
                        {foreach from=$tipos item=tipo}
                            <tr>
                                <td>
                                    <a href="{$_layoutParams.root}serviciotipos/view/{$tipo.id}">{$tipo.nombre}</a>
                                </td>
                                <td>$ {$tipo.precio|number_format:0:",":"."}</td>
                            </tr>
                        {/foreach}
                    </table>
                {else}
                    <p class="text-info">No hay tipos de servicio registrados</p>
                {/if}
            </div>
        </div>
    </div>
</section> <!-- .section -->