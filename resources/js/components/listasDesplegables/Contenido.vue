<template>
    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="px-2">OPCIONES LISTA CONTENIDO</div>
                        <button class="icon icon-box-success" v-on:click="AbrirModalContenido">
                            <span class="mdi mdi-library-plus icon-item"></span>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>NOMBRE</th>
                                    <th class="col">DESCRIPCIÓN</th>
                                    <th>ESTADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(contenido, id) in listasContenido" :key="id">
                                    <td>{{ id + 1 }}</td>
                                    <td>{{ contenido.nombre }}</td>
                                    <td>{{ contenido.descripcion }}</td>
                                    <template v-if="contenido.estado == 1">
                                        <td>Activo</td>
                                    </template>
                                    <template v-else>
                                        <td>Inactivo</td>
                                    </template>
                                    <td class="d-flex">
                                        <button class="icon btn btn-success mx-2" v-on:click="AbrirModalContenidoEditar(contenido.id)">
                                            <i class="mdi mdi-table-edit icon-item"></i>
                                        </button>
                                        <button v-if="contenido.estado == 1" class="icon btn btn-danger mx-2"
                                            v-on:click="CambiarEstado(contenido.estado, contenido.id)">
                                            <i class="mdi mdi-delete-forever icon-item"></i>
                                        </button>
                                        <button v-else class="icon btn btn-warning mx-2"
                                            v-on:click="CambiarEstado(contenido.estado, contenido.id)"><i
                                                class="mdi mdi-checkbox-marked-outline icon-item"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE CONTENIDO -->
        <div class="modal" tabindex="-1" id="contenido">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Contenido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NOMBRE:</label>
                            <input class="form-control" v-model="nombreContenido"
                                :class="{ 'is-invalid': $v.nombreContenido.$error, 'is-valid': !$v.nombreContenido.$invalid }">
                            <div class="invalid-feedback">
                                <span v-if="!$v.nombreContenido.required">Este campo es Requerido</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="GuardarListaContenido">GUARDAR</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE CONTENIDO EDITAR-->
        <div class="modal" tabindex="-1" id="contenidoEditar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">EDITAR</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NOMBRE:</label>
                            <input class="form-control" v-model="nombreContenidoEditar">
                        </div>
                        <div class="form-group">
                            <label>DESCRIPCIÓN:</label>
                            <input class="form-control" v-model="descripcionContenidoEditar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="button" class="btn btn-primary" v-on:click="EditarContenidoDato">GUARDAR CAMBIO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { required, maxLength, between } from 'vuelidate/lib/validators'
export default {
    data() {
        return {
            listasContenido: [],
            nombreContenido: '',
            nombreContenidoEditar:'',
            descripcionContenidoEditar:'',
            idE:''
        }
    },
    validations: {
        nombreContenido: { required }
    },
    mounted() {
        this.ListarContenido();
    },
    methods: {
        AbrirModalContenido() {
            $('#contenido').modal('show');
            this.nombreContenido = '';
        },
        ListarContenido() {
            let me = this;
            axios
                .get('/MostrarContenido')
                .then(function (response) {
                    //Respuesta de la peticion
                    me.listasContenido = response.data;
                    console.log(me.listasContenido);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        GuardarListaContenido() {
            this.$v.$reset()
            if (!this.$v.$invalid) {
                let me = this;
                axios
                    .post("/GuardarContenido", {
                        nombre: me.nombreContenido,
                    })
                    .then(function (response) {
                        //Respuesta de la peticion
                        console.log(me.nombreContenido)
                        console.log(response)
                        $('#contenido').modal('hide');
                        me.ListarContenido();
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
            } else {
                this.$v.$touch();
                console.log('error');
            }
        },
        AbrirModalContenidoEditar(id) {
            console.log(id);
            let me = this;
            me.idE = id;
            axios
                .post('/mostrarDatoContenido', {
                    id: id
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    //me.listas=response.data;
                    //console.log(me.listas)
                    console.log(response);
                    me.nombreContenidoEditar = response.data.nombre;
                    me.descripcionContenidoEditar = response.data.descripcion;
                    $('#contenidoEditar').modal('show');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        EditarContenidoDato() {
            let me = this;
            axios
                .post("/editarContenido", {
                    nombre: me.nombreContenidoEditar,
                    descripcion: me.descripcionContenidoEditar,
                    id: me.idE
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    console.log(response)
                    $('#contenidoEditar').modal('hide');
                    me.ListarContenido();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
        CambiarEstado(estado, id) {
            let me = this;
            axios
                .post('/CambiarEstadoContenido', {
                    estado: estado,
                    id: id
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    me.ListarContenido();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        }
    }

}
</script>

<style></style>