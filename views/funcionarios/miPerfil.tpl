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
                            <th>RUN:</th>
                            <td>{$funcionario.rut}</td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>{$funcionario.nombre}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{$funcionario.email}</td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td>{$funcionario.direccion}</td>
                        </tr>
                        <tr>
                            <th>Comuna:</th>
                            <td>{$funcionario.comuna.nombre}</td>
                        </tr>
                        <tr>
                            <th>Región:</th>
                            <td>{$funcionario.comuna.region.nombre}</td>
                        </tr>
                        <tr>
                            <th>Roles:</th>
                            <td>
                                <ul>
                                    {foreach from=$roles item=$rol}
                                        <li>{$rol.rol.nombre}</li>
                                    {/foreach}
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Teléfonos:</th>
                            <td>
                                <ul>
                                    {foreach from=$telefonos item=$telefono}
                                        <li>{$telefono.numero}</li>
                                    {/foreach}
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{$funcionario.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{$funcionario.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                        </tr>
                        <tr>
                            <th>Activo:</th>
                            {if isset($funcionario.usuario)}
                                <td>
                                    {if $funcionario.usuario.activo == 1}
                                        Si
                                    {else}
                                        No
                                    {/if}
                                </td>
                            {else}
                                <td>
                                    No tiene una cuenta asociada
                                </td>
                            {/if}
                        </tr>
                    </table>
                    <p>

                        <a href="{$_layoutParams.root}usuarios/editPassword/{$funcionario.id}"
                            class="btn btn-outline-success">Cambiar Password</a>


                    </p>
                </div>
            </div>
            {* sidebar derecho *}
            <div class="col-md-7 ftco-animate">
                {* reservas *}
                <div class="sidebar-box ftco-animate">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-inline" action="{$_layoutParams.root}servicios/serviciosFecha" method="post">
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="date" name="fecha" value="{$fecha.fecha|default:""}" class="form-control"
                                        id="inputPassword2" placeholder="Fecha">
                                </div>
                                <input type="hidden" name="enviar" value="{$enviar}">
                                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{$_layoutParams.root}servicios" class="btn btn-outline-primary">Ver Servicios</a>
                        </div>
                    </div>
                    <h3>Servicios</h3>
                    {if isset($servicios) && count($servicios)}
                        <table class="table table-hover">
                            <tr>
                                <th>Fecha</th>
                                <th>Horario</th>
                                <th>Paciente</th>
                                <th>Tipo de Servicio</th>
                                <th>Tipo de Paciente</th>
                                <th>Status</th>
                            </tr>
                            {foreach from=$servicios item=servicio}
                                <tr>
                                    <td>
                                        <a href="{$_layoutParams.root}servicios/view/{$servicio.id}">
                                            {$servicio.created_at|date_format:"%d-%m-%Y"}
                                        </a>
                                    </td>
                                    <td>{$servicio.horario.rango_hora}</td>
                                    <td>
                                        {$servicio.paciente.nombre}
                                    </td>
                                    <td>{$servicio.servicioTipo.nombre}</td>
                                    <td>{$servicio.paciente.pacienteTipo.nombre}</td>
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
                        <p class="text-info">No hay servicios disponibles</p>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</section> <!-- .section -->