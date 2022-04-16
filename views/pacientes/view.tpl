<section class="ftco-section ftco-degree-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3>
                        {$title}
                    </h3>

                    {include file="../partials/_mensajes.tpl"}

                    <table class="table table-hover">
                        <tr>
                            <th>Nombre:</th>
                            <td>{$paciente.nombre}</td>
                        </tr>
                        <tr>
                            <th>Código Chip:</th>
                            <td>{$paciente.codigo_chip}</td>
                        </tr>
                        <tr>
                            <th>Edad:</th>
                            <td>{$paciente.edad} año(s)</td>
                        </tr>
                        <tr>
                            <th>Tamaño:</th>
                            <td>
                                {if $paciente.tamanio == 1}
                                    Pequeño
                                {elseif $paciente.tamanio == 2}
                                    Mediano
                                {else}
                                    Grande
                                {/if}
                            </td>
                        </tr>
                        <tr>
                            <th>Peso:</th>
                            <td>{$paciente.peso|number_format:3} Kg.</td>
                        </tr>
                        <tr>
                            <th>Paciente Tipo:</th>
                            <td>{$paciente.pacienteTipo.nombre}</td>
                        </tr>
                        <tr>
                            <th>Cliente:</th>
                            <td>{$paciente.cliente.nombre}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{$paciente.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{$paciente.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{$_layoutParams.root}pacientes/edit/{$paciente.id}"
                            class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="{$_layoutParams.root}clientes/view/{$paciente.cliente_id}" class="btn btn-outline-primary btn-sm">Volver</a>

                        {if Helper::getRolAdminSuper()}
                            <a href="{$_layoutParams.root}servicios/add/{$paciente.id}"
                                class="btn btn-outline-success btn-sm">Agregar Servicio</a>
                        {/if}
                    </p>
                </div>
            </div>
            {* sidebar derecho *}
            <div class="col-md-7 ftco-animate">
                {* lista de servicios *}
                <div class="sidebar-box ftco-animate">
                <h3>Servicios</h3>
                {if isset($paciente.servicios) && count($paciente.servicios)}
                    <table class="table table-hover table-responsive">
                        <tr>
                            <th>Tipo de Servicio</th>
                            <th>Precio</th>
                            <th>Urgencia</th>
                            <th>Status</th>
                            <th>Horario</th>
                            <th>Fecha</th>
                        </tr>
                        {foreach from=$paciente.servicios item=servicio}
                            <tr>
                                <td>
                                    {$servicio.servicioTipo.nombre}
                                </td>
                                <td>
                                    $ {$servicio.servicioTipo.precio|number_format:0:",":"."}
                                </td>
                                <td>
                                    {if $servicio.urgencia == 1}
                                        Si
                                    {else}
                                        No
                                    {/if}
                                </td>
                                <td>
                                    {if $servicio.status == 1}
                                        Pendiente
                                    {else}
                                        Realizado
                                    {/if}
                                </td>
                                <td>{$servicio.horario.rango_hora}</td>
                                <td>
                                    <a href="{$_layoutParams.root}servicios/view/{$servicio.id}">{$servicio.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</a>
                                </td>
                            </tr>
                        {/foreach}

                    </table>
                {else}
                    <p class="text-info">No hay servicios asociados</p>
                {/if}
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section -->