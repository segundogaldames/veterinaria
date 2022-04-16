<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-10 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                </h3>

                {include file="../partials/_mensajes.tpl"}

                {if isset($servicios) && count($servicios)}
                    <table class="table table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Tipo de Servicio</th>
                            <th>Paciente</th>
                            <th>RUT Cliente</th>
                            <th>Asignado A</th>
                            <th>Fecha - Horario</th>
                            <th>Status</th>
                        </tr>
                        {foreach from=$servicios item=servicio}
                            <tr>
                                <td>
                                    <a href="{$_layoutParams.root}servicios/view/{$servicio.id}">{$servicio.id}</a>
                                </td>
                                <td>{$servicio.servicioTipo.nombre}</td>
                                <td>
                                    <a href="{$_layoutParams.root}pacientes/view/{$servicio.paciente.id}" title="Ver Paciente">
                                        {$servicio.paciente.nombre}
                                    </a>
                                </td>
                                <td>
                                    <a href="{$_layoutParams.root}clientes/view/{$servicio.paciente.cliente.id}" title="Ver Cliente">
                                        {$servicio.paciente.cliente.rut}
                                    </a>
                                </td>
                                <td>{$servicio.funcionario.nombre}</td>
                                <td>{$servicio.created_at|date_format:"%d-%m-%Y"} - {$servicio.horario.rango_hora}</td>
                                <td>
                                    {if $servicio.status == 1}
                                        Pendiente
                                    {else}
                                        Realizado
                                    {/if}
                                </td>
                            </tr>
                        {/foreach}
                    </table>
                {else}
                    <p class="text-info">No hay servicios registrados</p>
                {/if}
            </div>
        </div>
    </div>
</section> <!-- .section -->