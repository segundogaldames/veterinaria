<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                    <a href="{$_layoutParams.root}pacientetipos/add" class="btn btn-outline-success btn-sm">Crear Tipo Paciente</a>
                </h3>

                {include file="../partials/_mensajes.tpl"}

                {if isset($tipos) && count($tipos)}
                    <table class="table table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Exótico</th>
                        </tr>
                        {foreach from=$tipos item=tipo}
                            <tr>
                                <td>
                                    <a href="{$_layoutParams.root}pacientetipos/view/{$tipo.id}">{$tipo.nombre}</a>
                                </td>
                                <td>
                                    {if $tipo.exotico == 1}
                                        Si
                                    {else}
                                        No
                                    {/if}
                                </td>
                            </tr>
                        {/foreach}
                    </table>
                {else}
                    <p class="text-info">No hay paciente tipos registrados</p>
                {/if}
            </div>
        </div>
    </div>
</section> <!-- .section -->