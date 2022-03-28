<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="col-md-6 ftco-animate">
            <div class="sidebar-box ftco-animate">
                <h3>
                    {$title}
                </h3>
                {include file="../partials/_mensajes.tpl"}

                <p class="text-danger">Campos obligatorios *</p>
                <p>Fecha: {$reserva.fecha|date_format:"%d-%m-%Y"}</p>
                <p>Horario: {$reserva.horario.rango_hora}</p>
                {include file="../reservas/_form.tpl"}
            </div>
        </div>
    </div>
</section> <!-- .section -->