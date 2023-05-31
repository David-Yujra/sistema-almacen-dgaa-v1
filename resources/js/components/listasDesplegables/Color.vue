<template>
    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="px-2">OPCIONES LISTA COLOR</div>
                        <button class="icon icon-box-success" v-on:click="AbrirModalColor">
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
                                <tr v-for="(colorItem, id) in listasColor" :key="id">
                                    <td>{{ id + 1 }}</td>
                                    <td>{{ colorItem.nombre }}</td>
                                    <td>{{ colorItem.descripcion }}</td>
                                    <template v-if="colorItem.estado == 1">
                                        <td>Activo</td>
                                    </template>
                                    <template v-else>
                                        <td>Inactivo</td>
                                    </template>
                                    <td class="d-flex">
                                        <button class="icon btn btn-success mx-2" v-on:click="AbrirModalColorEditar(colorItem.id)">
                                            <i class="mdi mdi-table-edit icon-item"></i>
                                        </button>
                                        <button v-if="colorItem.estado == 1" class="icon btn btn-danger mx-2"
                                            v-on:click="CambiarEstado(colorItem.estado, colorItem.id)">
                                            <i class="mdi mdi-delete-forever icon-item"></i>
                                        </button>
                                        <button v-else class="icon btn btn-warning mx-2"
                                            v-on:click="CambiarEstado(colorItem.estado, colorItem.id)"><i
                                                class="mdi mdi-checkbox-marked-outline icon-item"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL LISTA DE COLOR ITEM -->
        <div class="modal" tabindex="-1" id="colorItem">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Color</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NOMBRE:</label>
                            <input class="form-control" v-model="nombreColor"
                                :class="{ 'is-invalid': $v.nombreColor.$error, 'is-valid': !$v.nombreColor.$invalid }">
                            <div class="invalid-feedback">
                                <span v-if="!$v.nombreColor.required">Este campo es Requerido</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="GuardarListaColor">GUARDAR</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE COLOR EDITAR-->
        <div class="modal" tabindex="-1" id="colorEditar">
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
                            <input class="form-control" v-model="nombreColorEditar">
                        </div>
                        <div class="form-group">
                            <label>DESCRIPCIÓN:</label>
                            <input class="form-control" v-model="descripcionColorEditar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="button" class="btn btn-primary" v-on:click="EditarColorDato">GUARDAR CAMBIO</button>
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
            listasColor: [],
            nombreColor: '',
            nombreColorEditar:'',
            descripcionColorEditar:'',
            idE:''
        }
    },
    validations: {
        nombreColor: { required }
    },
    mounted() {
        this.ListarColor();
    },
    methods: {
        AbrirModalColor() {
            $('#colorItem').modal('show');
            this.nombreColor = '';
        },
        ListarColor() {
            let me = this;
            axios
                .get('/MostrarColor')
                .then(function (response) {
                    //Respuesta de la peticion
                    me.listasColor = response.data;
                    console.log(me.listasColor);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        GuardarListaColor() {
            this.$v.$reset()
            if (!this.$v.$invalid) {
                let me = this;
                axios
                    .post("/GuardarColor", {
                        nombre: me.nombreColor,
                    })
                    .then(function (response) {
                        //Respuesta de la peticion
                        console.log(me.nombreColor)
                        console.log(response)
                        $('#colorItem').modal('hide');
                        me.ListarColor();// para que se actualice los datos al momento de guardar
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
        AbrirModalColorEditar(id) {
            console.log(id);
            let me = this;
            me.idE = id;
            axios
                .post('/mostrarDatoColor', {
                    id: id
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    //me.listas=response.data;
                    //console.log(me.listas)
                    console.log(response);
                    me.nombreColorEditar = response.data.nombre;
                    me.descripcionColorEditar = response.data.descripcion;
                    $('#colorEditar').modal('show');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        EditarColorDato() {
            let me = this;
            axios
                .post("/editarColor", {
                    nombre: me.nombreColorEditar,
                    descripcion: me.descripcionColorEditar,
                    id: me.idE
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    console.log(response)
                    $('#colorEditar').modal('hide');
                    me.ListarColor();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
        CambiarEstado(estado, id) {
            let me = this;
            axios
                .post('/CambiarEstadoColor', {
                    estado: estado,
                    id: id
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    me.ListarColor();
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