<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-10 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                    <a href="{$_layoutParams.root}productos/add" class="btn btn-outline-success btn-sm">Crear
                        Producto</a>
                </h3>

                {include file="../partials/_mensajes.tpl"}

                {if isset($productos) && count($productos)}
                    <table class="table table-hover">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Tipo Producto</th>
                            <th>Tipo Paciente</th>
                            <th>Precio Venta</th>
                            <th>Status</th>
                        </tr>
                        {foreach from=$productos item=producto}
                            <tr>
                                <td>
                                    <a href="{$_layoutParams.root}productos/view/{$producto.id}">{$producto.codigo}</a>
                                </td>
                                <td>{$producto.nombre}</td>
                                <td>{$producto.productoTipo.nombre}</td>
                                <td>{$producto.pacienteTipo.nombre}</td>
                                <td>$ {$producto.precio_venta|number_format:0:",":"."}</td>
                                <td>
                                    {if $producto.status == 1}
                                        Activo
                                    {else}
                                        Inactivo
                                    {/if}
                                </td>
                            </tr>
                        {/foreach}
                    </table>
                {else}
                    <p class="text-info">No hay productos registrados</p>
                {/if}
            </div>
        </div>
    </div>
</section> <!-- .section -->