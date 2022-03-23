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
                        <th>Fecha:</th>
                        <td>{$reserva.fecha|date_format:"%d-%m-%Y"}</td>
                    </tr>
                    <tr>
                        <th>Hora:</th>
                        <td>{$reserva.horario.rango_hora}</td>
                    </tr>
                    <tr>
                        <th>Paciente:</th>
                        <td>{$reserva.nombre_paciente}</td>
                    </tr>
                    <tr>
                        <th>Tipo Paciente:</th>
                        <td>{$reserva.pacienteTipo.nombre}</td>
                    </tr>
                    <tr>
                        <th>Cliente:</th>
                        <td>{$reserva.nombre_cliente}</td>
                    </tr>
                    <tr>
                        <th>Tipo de Servicio:</th>
                        <td>{$reserva.servicioTipo.nombre}</td>
                    </tr>
                    <tr>
                        <th>Veterinario(a):</th>
                        <td>{$reserva.funcionario.nombre}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>{$reserva.reservaStatus.nombre}</td>
                    </tr>
                    <tr>
                        <th>Reservado Por:</th>
                        <td>{$reserva.usuario.funcionario.nombre}</td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{$reserva.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td>{$reserva.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    <a href="{$_layoutParams.root}reservas/edit/{$reserva.id}"
                        class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="{$_layoutParams.root}reservas/" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section -->