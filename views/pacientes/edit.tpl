<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                </h3>
                {include file="../partials/_mensajes.tpl"}
                <h4>Cliente: {$paciente.cliente.nombre}</h4>

                <p class="text-danger">Campos obligatorios *</p>
                {include file="../pacientes/_form.tpl"}
            </div>
        </div>
    </div>
</section> <!-- .section -->