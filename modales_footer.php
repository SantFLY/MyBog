
<div class="modal fade" id="modalPoliticaPrivacidad" tabindex="-1" role="dialog"
    aria-labelledby="modalPoliticaPrivacidadLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPoliticaPrivacidadLabel">Política de Privacidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Política de Privacidad de MyBog</h4>
                <p>
                    En MyBog, valoramos y respetamos tu privacidad. Esta política de privacidad describe cómo
                    recopilamos, utilizamos y protegemos tu información personal cuando utilizas nuestro
                    servicio.
                </p>
                <p>
                    <strong>Información Personal:</strong> Recopilamos información personal como tu nombre y
                    dirección de correo electrónico cuando te registras en MyBog.
                </p>
                <p>
                    <strong>Uso de la Información:</strong> Utilizamos tu información personal para
                    proporcionarte un mejor servicio y personalizar tu experiencia en MyBog.
                </p>
                <p>
                    <strong>Seguridad:</strong> Protegemos tu información personal y no la compartimos con
                    terceros sin tu consentimiento.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Términos y Condiciones -->
<div class="modal fade" id="modalTerminosCondiciones" tabindex="-1" role="dialog"
    aria-labelledby="modalTerminosCondicionesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTerminosCondicionesLabel">Términos y Condiciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Términos y Condiciones de MyBog</h4>
                <p>
                    Al utilizar el servicio de MyBog, aceptas cumplir con nuestros términos y condiciones. Por
                    favor, léelos cuidadosamente antes de usar nuestro servicio.
                </p>
                <p>
                    <strong>Uso del Servicio:</strong> Está prohibido el uso inapropiado o ilegal de nuestro
                    servicio. No toleramos el spam ni la conducta abusiva.
                </p>
                <p>
                    <strong>Contenido del Usuario:</strong> Al publicar contenido en MyBog, garantizas que
                    tienes los derechos necesarios sobre ese contenido.
                </p>
                <p>
                    <strong>Cancelación de Cuenta:</strong> Puedes cancelar tu cuenta en cualquier momento si ya
                    no deseas utilizar nuestro servicio.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal de Contacto -->
<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modalContactoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContactoLabel">Contacto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de Contacto -->
                <form id="formularioContacto" action="php/guardar_contacto.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" autofocus required
                            maxlength="20" pattern="[a-zA-Z\s]+"
                            title="Solo se permiten letras y espacios. Máximo 20 caracteres.">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required
                            maxlength="50" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                            title="Ingresa un correo electrónico válido. Máximo 50 caracteres.">
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" maxlength="250"
                                    title="Ingresa la descripción que quieres darle a tu lugar (max 250 carácteres)"
                                    required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                </form>
                <!-- Fin del Formulario de Contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

