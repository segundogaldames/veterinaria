<section class="ftco-section ftco-degree-bg">
    <div class="container">
            <div class="col-md-6 ftco-animate">
                <div class="sidebar-box ftco-animate">
                    {if Helper::getRolAdminSuper()}
                        <h3 class="text-success">Clientes</h3>
                        <div class="list-group mb-2">
                            <a href="{$_layoutParams.root}clientes/"
                                class="list-group-item list-group-item-action">Clientes</a>
                        </div>
                    {/if}
                    {if Helper::getRolAdmin()}
                        <h3 class="text-success">Comunas</h3>
                        <div class="list-group mb-2">
                            <a href="{$_layoutParams.root}comunas/" class="list-group-item list-group-item-action">Comunas</a>
                            <a href="{$_layoutParams.root}regiones/" class="list-group-item list-group-item-action">Regiones</a>
                        </div>
                        <h3 class="text-success">Funcionarios</h3>
                        <div class="list-group mb-2">
                            <a href="{$_layoutParams.root}funcionarios/"
                                class="list-group-item list-group-item-action">Funcionarios</a>
                            <a href="{$_layoutParams.root}roles/" class="list-group-item list-group-item-action">Roles</a>
                        </div>
                    {/if}
                    {if Helper::getRolAdminSuper()}
                        <h3 class="text-success">Pacientes</h3>
                         <div class="list-group mb-2">
                             <a href="{$_layoutParams.root}pacientes/"
                                 class="list-group-item list-group-item-action">Pacientes</a>

                            {if Helper::getRolAdmin()}
                                <a href="{$_layoutParams.root}pacientetipos/" class="list-group-item list-group-item-action">Paciente Tipos</a>
                            {/if}
                        </div>
                        <h3 class="text-success">Productos</h3>
                        <div class="list-group mb-2">
                            <a href="{$_layoutParams.root}productos/"
                                class="list-group-item list-group-item-action">Productos</a>
                            <a href="{$_layoutParams.root}productotipos/"
                                class="list-group-item list-group-item-action">Producto Tipos</a>
                        </div>
                        <h3 class="text-success">Proveedores</h3>
                        <div class="list-group mb-2">
                            <a href="{$_layoutParams.root}proveedores/"
                                class="list-group-item list-group-item-action">Proveedores</a>
                        </div>
                        <h3 class="text-success">Reservas</h3>
                        <div class="list-group mb-2">
                            {if Helper::getRolAdmin()}
                                <a href="{$_layoutParams.root}horarios/"
                                    class="list-group-item list-group-item-action">Horarios</a>
                            {/if}

                            <a href="{$_layoutParams.root}reservas/" class="list-group-item list-group-item-action">Reservas</a>
                        </div>
                        <h3 class="text-success">Servicios</h3>
                        <div class="list-group mb-2">
                            <a href="{$_layoutParams.root}servicios/"
                                class="list-group-item list-group-item-action">Servicios</a>

                            {if Helper::getRolAdmin()}
                                <a href="{$_layoutParams.root}serviciotipos/"
                                    class="list-group-item list-group-item-action">Servicio Tipos</a>

                            {/if}
                        </div>
                    {/if}
                    {if Helper::getRolAdmin()}
                        <h3 class="text-success">Videos</h3>
                        <div class="list-group mb-2">
                            <a href="{$_layoutParams.root}videos/" class="list-group-item list-group-item-action">Videos</a>
                        </div>
                    {/if}
                </div>
            </div>
    </div>
</section> <!-- .section -->