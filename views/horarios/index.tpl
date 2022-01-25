<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                    <a href="{$_layoutParams.root}horarios/add" class="btn btn-outline-success btn-sm">Crear Horario</a>
                </h3>

                {include file="../partials/_mensajes.tpl"}

                {if isset($horarios) && count($horarios)}
                    <table class="table table-hover">
                        <tr>
                            <th>Rango Horario</th>
                        </tr>
                        {foreach from=$horarios item=horario}
                            <tr>
                                <td>
                                    <a href="{$_layoutParams.root}horarios/view/{$horario.id}">{$horario.rango_hora}</a>
                                </td>
                            </tr>
                        {/foreach}
                    </table>
                {else}
                    <p class="text-info">No hay horarios registrados</p>
                {/if}
            </div>
        </div>
    </div>
</section> <!-- .section -->