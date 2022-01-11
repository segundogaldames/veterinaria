<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-8 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                </h3>

                {include file="../partials/_mensajes.tpl"}

                {if isset($pacientes) && count($pacientes)}
                    <table class="table table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Cliente</th>
                            <th>Fecha de Registro</th>
                        </tr>
                        {foreach from=$pacientes item=paciente}
                            <tr>
                                <td>
                                    <a href="{$_layoutParams.root}pacientes/view/{$paciente.id}">{$paciente.nombre}</a>
                                </td>
                                <td>{$paciente.pacienteTipo.nombre}</td>
                                <td>{$paciente.cliente.nombre}</td>
                                <td>{$paciente.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                            </tr>
                        {/foreach}
                    </table>
                {else}
                    <p class="text-info">No hay pacientes registrados</p>
                {/if}
            </div>
        </div>
    </div>
</section> <!-- .section -->