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
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section -->