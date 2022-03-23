<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            {* contenedor izquierdo lista de reservas *}
            <div class="col-md-8 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3>
                        {$title}
                    </h3>

                    {include file="../partials/_mensajes.tpl"}

                    {if isset($reservas) && count($reservas)}
                        <table class="table table-hover">
                            <tr>
                                <th>Fecha</th>
                                <th>Horario</th>
                                <th>Tipo de Servicio</th>
                                <th>Tipo de Paciente</th>
                                <th>Veterinario</th>
                                <th>Status</th>
                            </tr>
                            {foreach from=$reservas item=reserva}
                                <tr>
                                    <td>
                                        <a href="{$_layoutParams.root}reservas/view/{$reserva.id}">
                                            {$reserva.fecha|date_format:"%d-%m-%Y"}
                                        </a>
                                    </td>
                                    <td>{$reserva.horario.rango_hora}</td>
                                    <td>{$reserva.servicioTipo.nombre}</td>
                                    <td>{$reserva.pacienteTipo.nombre}</td>
                                    <td>{$reserva.funcionario.nombre}</td>
                                    <td>{$reserva.reservaStatus.nombre}</td>
                                </tr>
                            {/foreach}
                        </table>
                    {else}
                        <p class="text-info">No hay reservas registradas</p>
                    {/if}
                </div>
            </div>

            {* contenedor derecho lista de horarios *}
            <div class="col-md-4 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3>
                        {$title_horario}
                    </h3>

                    {include file="../partials/_mensajes.tpl"}

                    <form class="form-inline" action="{$_layoutParams.root}reservas/horariosReserva" method="post">
                         <div class="form-group mx-sm-3 mb-2">
                             <input type="date" name="fecha" class="form-control" id="inputPassword2"
                                 placeholder="Fecha">
                         </div>
                         <input type="hidden" name="enviar" value="{$enviar}">
                         <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section -->