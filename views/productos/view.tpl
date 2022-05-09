<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-10 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                </h3>

                {include file="../partials/_mensajes.tpl"}

                <table class="table table-hover">
                    <tr>
                        <th>Código:</th>
                        <td>{$producto.codigo}</td>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <td>{$producto.nombre}</td>
                    </tr>
                    <tr>
                        <th>Descripción:</th>
                        <td>{$producto.descripcion}</td>
                    </tr>
                    <tr>
                        <th>Precio de venta:</th>
                        <td>$ {$producto.precio_venta|number_format:0:",":"."}</td>
                    </tr>
                    <tr>
                        <th>Tipo de producto:</th>
                        <td>{$producto.productoTipo.nombre}</td>
                    </tr>
                    <tr>
                        <th>Tipo de mascota:</th>
                        <td>{$producto.pacienteTipo.nombre}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            {if $producto.status == 1}
                                Activo
                            {else}
                                Inactivo
                            {/if}
                        </td>
                    </tr>
                    <tr>
                        <th>Creado:</th>
                        <td>{$producto.created_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                    <tr>
                        <th>Modificado:</th>
                        <td>{$producto.updated_at|date_format:"%d-%m-%Y %H:%M:%S"}</td>
                    </tr>
                </table>
                <p>
                    <a href="{$_layoutParams.root}productos/edit/{$producto.id}"
                        class="btn btn-outline-primary btn-sm">Editar</a>
                    <a href="{$_layoutParams.root}productos/" class="btn btn-outline-primary btn-sm">Volver</a>
                </p>
            </div>
        </div>
    </div>
</section> <!-- .section -->