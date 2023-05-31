<template>
    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="px-2">OPCIONES LISTA TIPO ITEM</div>
                        <button class="icon icon-box-success" v-on:click="AbrirModalTipoItem">
                            <span class="mdi mdi-library-plus icon-item"></span>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>NOMBRE</th>
                                    <th>MEDIDAS</th>
                                    <th class="col">DESCRIPCIÓN</th>
                                    <th>ESTADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tipoItem, id) in listasTipoItem" :key="id">
                                    <td>{{ id + 1 }}</td>
                                    <td>{{ tipoItem.nombre }}</td>
                                    <td>
                                        <ul>
                                            <li v-for="medi in tipoItem.medidas" :key="medi.id">
                                                {{ medi.nombre }}</li>
                                        </ul>
                                    </td>
                                    <td>{{ tipoItem.descripcion }}</td>
                                    <template v-if="tipoItem.estado == 1">
                                        <td>Activo</td>
                                    </template>
                                    <template v-else>
                                        <td>Inactivo</td>
                                    </template>
                                    <td class="d-flex">
                                        <button class="icon btn btn-success mx-2"
                                            v-on:click="AbrirModalTipoItemEditar(tipoItem.id)">
                                            <i class="mdi mdi-table-edit icon-item"></i>
                                        </button>
                                        <button v-if="tipoItem.estado == 1" class="icon btn btn-danger mx-2"
                                            v-on:click="CambiarEstado(tipoItem.estado, tipoItem.id)">
                                            <i class="mdi mdi-delete-forever icon-item"></i>
                                        </button>
                                        <button v-else class="icon btn btn-warning mx-2"
                                            v-on:click="CambiarEstado(tipoItem.estado, tipoItem.id)"><i
                                                class="mdi mdi-checkbox-marked-outline icon-item"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL DE TIPO ITEM -->
        <div class="modal" tabindex="-1" id="tipoItem">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Tipo Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NOMBRE:</label>
                            <input class="form-control" v-model="nombreTipoItem"
                                :class="{ 'is-invalid': $v.nombreTipoItem.$error, 'is-valid': !$v.nombreTipoItem.$invalid }">
                            <div class="invalid-feedback">
                                <span v-if="!$v.nombreTipoItem.required">Este campo es Requerido</span>
                            </div>
                        </div>
                    </div>
                    <div v-for="medida in listasMedidas" :key="medida.id" class="form-check">
                        <input class="form-check-input" type="checkbox" :value="medida.id" v-model="medidas_seleccionadas">
                        <label class="form-check-label">{{ medida.nombre }}</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="GuardarListaTipoItem">GUARDAR</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE TIPO ITEM EDITAR-->
        <div class="modal" tabindex="-1" id="tipoItemEditar">
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
                            <input class="form-control" v-model="nombreTipoItemEditar">
                        </div>
                        <div class="form-group">
                            <label>DESCRIPCIÓN:</label>
                            <input class="form-control" v-model="descripcionTipoItemEditar">
                        </div>
                    </div>
                    <div v-for="medida in listasMedidas" :key="medida.id" class="form-check">
                        <input class="form-check-input" type="checkbox" :value="medida.id" v-model="medidas_seleccionadas">
                        <label class="form-check-label">{{ medida.nombre }}</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="button" class="btn btn-primary" v-on:click="EditarTipoItemDato">GUARDAR
                            CAMBIO</button>
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
            listasTipoItem: [],
            nombreTipoItem: '',
            nombreTipoItemEditar: '',
            descripcionTipoItemEditar: '',
            idE: '',
            listasMedidas: [],
            medidas_seleccionadas: []
        }
    },
    validations: {
        nombreTipoItem: { required }
    },
    mounted() {
        this.ListarTipoItem();
        this.ListarMedida();
    },
    methods: {
        AbrirModalTipoItem() {
            $('#tipoItem').modal('show');
            this.nombreTipoItem = '';
        },
        ListarTipoItem() {
            let me = this;
            axios
                .get('/MostrarTipoItem')
                .then(function (response) {
                    //Respuesta de la peticion
                    me.listasTipoItem = response.data;
                    console.log(me.listasTipoItem);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        GuardarListaTipoItem() {
            this.$v.$reset()
            if (!this.$v.$invalid) {
                let me = this;
                axios
                    .post("/GuardarTipoItem", {
                        nombre: me.nombreTipoItem,
                        medidas: me.medidas_seleccionadas
                    })
                    .then(function (response) {
                        //Respuesta de la peticion
                        console.log(me.nombreTipoItem)
                        console.log(response)
                        $('#tipoItem').modal('hide');
                        me.ListarTipoItem();// para que se actualice los datos al momento de guardar
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
        AbrirModalTipoItemEditar(id) {
            console.log(id);
            let me = this;
            me.idE = id;
            axios
                .post('/mostrarDatoTipoItem', {
                    id: id
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    //me.listas=response.data;
                    //console.log(me.listas)
                    console.log(response);
                    me.nombreTipoItemEditar = response.data.nombre;
                    me.descripcionTipoItemEditar = response.data.descripcion;
                    me.medidas_seleccionadas = response.data.medidas.map(function (obj) {
                        return obj.id;
                    });
                    console.log("aaaaaaaaaaaaa "+me.medidas_seleccionadas)
                    $('#tipoItemEditar').modal('show');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        EditarTipoItemDato() {
            let me = this;
            axios
                .post("/editarTipoItem", {
                    nombre: me.nombreTipoItemEditar,
                    descripcion: me.descripcionTipoItemEditar,
                    id: me.idE,
                    medidas: me.medidas_seleccionadas
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    console.log(response)
                    $('#tipoItemEditar').modal('hide');
                    me.ListarTipoItem();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
        CambiarEstado(estado, id) {
            let me = this;
            axios
                .post('/cambiarEstadoTipoItem', {
                    estado: estado,
                    id: id
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    me.ListarTipoItem();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
        async ListarMedida() {
            // let me = this;
            try {
                const { data } = await axios.get('/MostrarMedida')
                this.listasMedidas = data
            } catch (error) {
                console.log(error);
            }
        },
    }
}
</script>

<style scoped></style>