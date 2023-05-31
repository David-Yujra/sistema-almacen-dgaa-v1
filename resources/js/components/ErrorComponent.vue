<template>
    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title mb-1">TIPOS DE ERRORES HTPP</h4>
                        <p class="text-muted mb-1">DETALLE</p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="preview-list">
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                            <i class="mdi mdi-file-document"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">Error 500</h6>
                                            <p class="text-muted mb-0">Significa que algo ha fallado en el sitio web. No se
                                                trata de un problema con el navegador del usuario, ni el ordenador ni la
                                                conexión a Internet, sino que es un problema con el sitio que intenta
                                                visitar.</p>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted">15 minutes ago</p>
                                            <p class="text-muted mb-0">30 tasks, 5 issues </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success">
                                            <i class="mdi mdi-cloud-download"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">Error 404</h6>
                                            <p class="text-muted mb-0">Es un mensaje de error estándar en el protocolo de
                                                transferencia de hipertexto (HTTP), que significa simplemente «no
                                                encontrado», lo que indica que el servidor web no puede localizar el recurso
                                                solicitado por un cliente, normalmente un navegador web.</p>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted">1 hour ago</p>
                                            <p class="text-muted mb-0">23 tasks, 5 issues </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-info">
                                            <i class="mdi mdi-clock"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">Error 400</h6>
                                            <p class="text-muted mb-0">La solicitud tiene una sintaxis incorrecta. Significa
                                                que las dirección de la página web que se quiere cargar (la URL) tiene un
                                                formato no válido.</p>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted">35 minutes ago</p>
                                            <p class="text-muted mb-0">15 tasks, 2 issues</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-danger">
                                            <i class="mdi mdi-email-open"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">Error 504</h6>
                                            <p class="text-muted mb-0">GATEWAY TIME-OUT: indica que el tiempo de espera para
                                                devolver la página web se ha agotado.</p>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted">55 minutes ago</p>
                                            <p class="text-muted mb-0">35 tasks, 7 issues </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-warning">
                                            <i class="mdi mdi-chart-pie"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">Error 403 </h6>
                                            <p class="text-muted mb-0">Indica que la página solicitada existe pero se ha
                                                denegado el acceso a la misma. Por ejemplo, podría tratarse de un contenido exclusivo para usuarios
                                                registrados.</p>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted">50 minutes ago</p>
                                            <p class="text-muted mb-0">27 tasks, 4 issues </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>