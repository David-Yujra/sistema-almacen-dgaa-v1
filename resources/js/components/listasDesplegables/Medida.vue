<template>
    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="px-2">OPCIONES LISTA MEDIDA</div>
                        <button class="icon icon-box-success" v-on:click="AbrirMddalMedida">
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
                                <tr v-for="(medida, id) in listasMedida" :key="id">
                                    <td>{{ id + 1 }}</td>
                                    <td>{{ medida.nombre }}</td>
                                    <td>{{ medida.descripcion }}</td>
                                    <template v-if="medida.estado == 1">
                                        <td>Activo</td>
                                    </template>
                                    <template v-else>
                                        <td>Inactivo</td>
                                    </template>
                                    <td class="d-flex">
                                        <button class="icon btn btn-success mx-2" v-on:click="AbrirModalMedidaEditar(medida.id)">
                                            <i class="mdi mdi-table-edit icon-item"></i>
                                        </button>
                                        <button v-if="medida.estado == 1" class="icon btn btn-danger mx-2" v-on:click="CambiarEstado(medida.estado, medida.id)">
                                            <i class="mdi mdi-delete-forever icon-item"></i>
                                        </button>
                                        <button v-else class="icon btn btn-warning mx-2" v-on:click="CambiarEstado(medida.estado, medida.id)"><i
                                                class="mdi mdi-checkbox-marked-outline icon-item"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL DE PESO -->
        <div class="modal" tabindex="-1" id="medida">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Medida</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NOMBRE:</label>
                            <input class="form-control" v-model="nombreMedida" :class="{ 'is-invalid': $v.nombreMedida.$error, 'is-valid': !$v.nombreMedida.$invalid }">
                            <div class="invalid-feedback">
                                <span v-if="!$v.nombreMedida.required">Este campo es Requerido</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="GuardarListaMedida">GUARDAR</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE MEDIDA EDITAR-->
        <div class="modal" tabindex="-1" id="medidaEditar">
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
                            <input class="form-control" v-model="nombreMedidaEditar">
                        </div>
                        <div class="form-group">
                            <label>DESCRIPCIÓN:</label>
                            <input class="form-control" v-model="descripcionMedidaEditar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="button" class="btn btn-primary" v-on:click="EditarMedidaDato">GUARDAR CAMBIO</button>
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
            listasMedida: [],
            nombreMedida: '',
            nombreMedidaEditar:'',
            descripcionMedidaEditar:'',
            idE:''
        }

    },
    validations: {
        nombreMedida: { required }
    },
    mounted() {
        this.ListarMedida();

    },
    methods: {
        AbrirMddalMedida() {
            $('#medida').modal('show');
            this.nombreMedida = '';
        },
        ListarMedida() {
            let me = this;
            axios
                .get('/MostrarMedida')
                .then(function (response) {
                    //Respuesta de la peticion
                    me.listasMedida = response.data;
                    console.log(me.listasMedida);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        GuardarListaMedida() {
            this.$v.$reset()
            if (!this.$v.$invalid) {
            let me = this;
            axios
                .post("/GuardarMedida", {
                    nombre: me.nombreMedida,
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    console.log(me.nombreMedida)
                    console.log('se agrego' + response)
                    $('#medida').modal('hide');
                    me.ListarMedida();// para que se actualice los datos al momento de guardar
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
        AbrirModalMedidaEditar(id) {
            console.log(id);
            let me = this;
            me.idE = id;
            axios
                .post('/mostrarDatoMedida', {
                    id: id
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    //me.listas=response.data;
                    //console.log(me.listas)
                    console.log(response);
                    me.nombreMedidaEditar = response.data.nombre;
                    me.descripcionMedidaEditar = response.data.descripcion;
                    $('#medidaEditar').modal('show');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        EditarMedidaDato() {
            let me = this;
            axios
                .post("/editarMedida", {
                    nombre: me.nombreMedidaEditar,
                    descripcion: me.descripcionMedidaEditar,
                    id: me.idE
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    console.log(response)
                    $('#medidaEditar').modal('hide');
                    me.ListarMedida();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
        CambiarEstado(estado, id) {
            let me = this;
            axios
                .post('/CambiarEstadoMedida', {
                    estado: estado,
                    id: id
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    me.ListarMedida();
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