<template>
    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="px-2">OPCIONES LISTA MARCA</div>
                        <button class="icon icon-box-success" v-on:click="AbrirModalMarca">
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
                                <tr v-for="(marca, id) in listasMarca" :key="id">
                                    <td>{{ id + 1 }}</td>
                                    <td>{{ marca.nombre }}</td>
                                    <td>{{ marca.descripcion }}</td>
                                    <template v-if="marca.estado == 1">
                                        <td>Activo</td>
                                    </template>
                                    <template v-else>
                                        <td>Inactivo</td>
                                    </template>
                                    <td class="d-flex">
                                        <button class="icon btn btn-success mx-2" v-on:click="AbrirModalMarcaEditar(marca.id)">
                                            <i class="mdi mdi-table-edit icon-item"></i>
                                        </button>
                                        <button v-if="marca.estado == 1" class="icon btn btn-danger mx-2"
                                            v-on:click="CambiarEstado(marca.estado, marca.id)">
                                            <i class="mdi mdi-delete-forever icon-item"></i>
                                        </button>
                                        <button v-else class="icon btn btn-warning mx-2"
                                            v-on:click="CambiarEstado(marca.estado, marca.id)"><i
                                                class="mdi mdi-checkbox-marked-outline icon-item"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL DE MARCA -->
        <div class="modal" tabindex="-1" id="marca">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Marca</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NOMBRE:</label>
                            <input class="form-control" v-model="nombreMarca" :class="{ 'is-invalid' : $v.nombreMarca.$error, 'is-valid':!$v.nombreMarca.$invalid }">
                            <div class="invalid-feedback">
                                <span v-if="!$v.nombreMarca.required">Este campo es Requerido</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                            <button type="submit" class="btn btn-primary" v-on:click="GuardarListaMarca">GUARDAR</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE MARCA EDITAR-->
        <div class="modal" tabindex="-1" id="marcaEditar">
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
                            <input class="form-control" v-model="nombreMarcaEditar">
                        </div>
                        <div class="form-group">
                            <label>DESCRIPCIÓN:</label>
                            <input class="form-control" v-model="descripcionMarcaEditar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="button" class="btn btn-primary" v-on:click="EditarMarcaDato">GUARDAR CAMBIO</button>
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
            listasMarca: [],
            nombreMarca: '',
            nombreMarcaEditar:'',
            descripcionMarcaEditar:'',
            idE:''
        }
    },
    validations:{
        nombreMarca : { required }
    },
    mounted() {
        this.ListarMarca();
    },
    methods: {
        AbrirModalMarca() {
            $('#marca').modal('show');
            this.nombreMarca = ''
        },
        ListarMarca() {
            let me = this;
            axios
                .get('/MostrarMarca')
                .then(function (response) {
                    //Respuesta de la peticion
                    me.listasMarca = response.data;
                    console.log(me.listasMarca);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        GuardarListaMarca() {
            this.$v.$reset()
            if (!this.$v.$invalid) {
                let me = this;
                axios
                    .post('/GuardarMarca', {
                        nombre: me.nombreMarca,
                    })
                    .then(function (response) {
                        //Respuesta de la peticion
                        console.log(me.nombreMarca)
                        console.log(response)
                        $('#marca').modal('hide');
                        me.ListarMarca();
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
        AbrirModalMarcaEditar(id) {
            console.log(id);
            let me = this;
            me.idE = id;
            axios
                .post('/mostrarDatoMarca', {
                    id: id
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    //me.listas=response.data;
                    //console.log(me.listas)
                    console.log(response);
                    me.nombreMarcaEditar = response.data.nombre;
                    me.descripcionMarcaEditar = response.data.descripcion;
                    $('#marcaEditar').modal('show');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        EditarMarcaDato() {
            let me = this;
            axios
                .post("/editarMarca", {
                    nombre: me.nombreMarcaEditar,
                    descripcion: me.descripcionMarcaEditar,
                    id: me.idE
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    console.log(response)
                    $('#marcaEditar').modal('hide');
                    me.ListarMarca();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
        CambiarEstado(estado, id) {
            let me = this;
            axios
                .post('/CambiarEstadoMarca', {
                    estado: estado,
                    id: id
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    me.ListarMarca();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        }
    }
}

</script>

<style scoped></style>