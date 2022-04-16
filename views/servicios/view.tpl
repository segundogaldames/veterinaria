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
                        <th>Descripción:</th>
                        <td>{$servicio.descripcion}</td>
                    </tr>
                    <tr>
                        <th>Urgencia:</th>
                        <td>
                            {if $servicio.urgencia == 1}
                                Si
                            {else}
                                No
                            {/if}
                        </td>
                    </tr>
                     <tr>
                         <th>Status:</th>
                         <td>
                             {if $servicio.status == 1}
                                 Pendiente
                             {else}
                                 Realizado
                             {/if}
                         </td>
                    </tr>
                    <tr>
                        <th>Paciente:</th>
                        <td>{$servicio.paciente.nombre}</td>
                    </tr>
                    <tr>
                        <th>Asignado A:</th>
                        <td>{$servicio.funcionario.nombre}</td>
                    </tr>
                    <tr>
                        <th>Tipo de Servicio:</th>
                        <td>{$servicio.servicioTipo.nombre}</td>
                    </tr>
                    <tr>
                        <th>Horario:</th>
                        <td>{$servicio.horario.rango_hora}</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{$servicio.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td>{$servicio.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    {if Helper::getRolAdminVeterinario()}
                        <a href="{$_layoutParams.root}servicios/edit/{$servicio.id}" class="btn btn-outline-primary btn-sm">Editar</a>
                    {/if}

                    <a href="{$_layoutParams.root}pacientes/view/{$servicio.paciente_id}" class="btn btn-outline-primary btn-sm">Volver</a>
                     <a href="{$_layoutParams.root}servicios"
                        class="btn btn-outline-primary btn-sm">Servicios</a>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section -->