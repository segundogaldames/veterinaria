<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-10 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                    <a href="{$_layoutParams.root}clientes/add" class="btn btn-outline-success btn-sm">Agregar Cliente</a>
                </h3>
                <hr style="background-color: #5DB645; height:1px">
                {include file="../partials/_mensajes.tpl"}

                <div class="col-md-8">
                    <form class="row g-3" action="{$_layoutParams.root}clientes/clienteRut" method="post">
                        <div class="col-9">
                        <input style="border-color:#5DB645" type="text" name="rut" class="form-control-plaintext" id="staticEmail2"
                                placeholder="RUT del cliente (sin puntos y con guión">
                        </div>
                        <div class="col-auto">
                            <input type="hidden" name="enviar" value="{$enviar}">
                            <button type="submit" class="btn btn-primary btn-sm mb-3">Buscar</button>
                        </div>
                    </form>
                </div>

                {if isset($clientes) && count($clientes)}
                    <table class="table table-hover">
                        <tr>
                            <th>RUT</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Comuna</th>
                        </tr>
                        {foreach from=$clientes item=cliente}
                            <tr>
                                <td>
                                    <a href="{$_layoutParams.root}clientes/view/{$cliente.id}">{$cliente.rut}</a>
                                </td>
                                <td>
                                    <a href="{$_layoutParams.root}clientes/view/{$cliente.id}">{$cliente.nombre}</a>
                                </td>
                                <td>{$cliente.email}</td>
                                <td>{$cliente.comuna.nombre}</td>
                            </tr>
                        {/foreach}
                    </table>
                {else}
                    <p class="text-info">No hay clientes registrados</p>
                {/if}
            </div>
        </div>
    </div>
</section> <!-- .section -->