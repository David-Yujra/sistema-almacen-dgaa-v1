<template>
    <div>
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="px-2">AÑADIR ITEM</div>
                        <button class="icon icon-box-success" v-on:click="AbrirModalItem">
                            <span class="mdi mdi-library-plus icon-item"></span>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>TIPO ITEM</th>
                                    <th>ITEM</th>
                                    <th>MARCA</th>
                                    <th>CONTENIDO</th>
                                    <th>COLOR</th>
                                    <th>CANTIDAD</th>
                                    <th>
                                        <center>ACCIONES</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, id) in listasItem" :key="id">
                                    <td>{{ id + 1 }}</td>
                                    <td>{{ item.tipo_item?.nombre }}</td>
                                    <td class="px-0 text-wrap" style="width: 10rem;">{{ item.nombre }}</td>
                                    <td>
                                        <div v-for="mar in item.marcas" :key="mar.id">
                                            {{ mar?.nombre }}</div>
                                    </td>
                                    <td>{{ item.contenido?.nombre }}</td>
                                    <td>{{ item.color?.nombre }}</td>
                                    <td>
                                        <center>0</center>
                                    </td>
                                    <td class="d-flex">
                                        <button class="icon btn btn-success mx-2 btn-sm">
                                            <i class="mdi mdi-table-edit icon-item"></i>
                                        </button>
                                        <button class="icon btn btn-primary mx-2 px-1"> DETALLE </button>
                                        <button class="icon btn btn-danger mx-2 px-1"
                                            v-on:click="AbrirModalIngresoItem">INGRESO</button>
                                        <button class="icon btn btn-warning mx-2 px-1">SALIDA</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE ITEM -->
        <div class="modal" tabindex="-1" id="item">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col col-6">
                                <div class="form-group">
                                    <label for="nameTypeItem">TIPO ITEM</label>
                                    <select class="form-control" id="nameTypeItem" placeholder="Seleccione Tipo Item"
                                        v-model="nombreTipoItem">
                                        <option selected>Seleccione Tipo Item</option>
                                        <option :value="listTipo" v-for="(listTipo, id) in listasTipoItem" :key="id">{{
                                            listTipo.nombre }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col col-6">
                                <label for="nameItem">ITEM:</label>
                                <input type="text" id="nameItem" class="form-control" placeholder="Ingrese Item"
                                    v-model="nombreItem">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col col-6">
                                <div class="form-group">
                                    <label for="markItem">MARCA</label>
                                    <select class="form-control" id="markItem" v-model="marcaItem">
                                        <option selected>Seleccione Marca</option>
                                        <option :value="listMarca.id" v-for="(listMarca, id) in listasMarca" :key="id">{{
                                            listMarca.nombre }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col col-6">
                                <div class="form-group">
                                    <label for="containerItem">CONTENIDO</label>
                                    <select class="form-control" id="containerItem" v-model="contenidoItem">
                                        <option selected>Seleccione Contenido</option>
                                        <option :value="listContenido.id" v-for="(listContenido, id) in listasContenido"
                                            :key="id">{{
                                                listContenido.nombre }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col col-6">
                                <div class="form-group">
                                    <label for="colorItem">COLOR</label>
                                    <select class="form-control" id="colorItem" v-model="colorItem">
                                        <option selected>Seleccione Color</option>
                                        <option :value="listColor.id" v-for="(listColor, id) in listasColor" :key="id">{{
                                            listColor.nombre }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary" v-on:click="GuardarItem">GUARDAR</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL INGRESO DE ITEM -->
        <div class="modal" tabindex="-1" id="ingresoItem">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">INGRESO DE ITEM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col col-4">
                                <label>EMPRESA:</label>
                                <input class="form-control">
                            </div>
                            <div class="form-group col col-4">
                                <label>NOMBRE PROVEEDOR:</label>
                                <input class="form-control">
                            </div>
                            <div class="form-group col col-4">
                                <label>CANTIDAD PRODUCTO:</label>
                                <input class="form-control" type="number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col col-2">
                                <label>CANTIDAD</label>
                                <input class="form-control" type="number">
                            </div>
                            <div class="form-group col col-2">
                                <label>MEDIDA:</label>
                                <input class="form-control" type="number">
                            </div>
                            <div class="form-group col col-4">
                                <label>PRECIO UNITARIO:</label>
                                <input class="form-control">
                            </div>
                            <div class="form-group col col-4">
                                <label>FECHA EXPIRACIÓN:</label>
                                <input class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- <input class="form-check-input" type="checkbox">
                    <label class="form-check-label">AA</label> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <button type="button" class="btn btn-primary">REGISTRAR INGRESO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nombreTipoItem: '',
            nombreItem: '',
            marcaItem: '',
            contenidoItem: '',
            colorItem: '',
            cantidadItem: '',
            listasTipoItem: [],
            listasColor: [],
            listasContenido: [],
            listasMarca: [],

            listasItem: [],
            listas_colores: []
        }
    },
    mounted() {
        this.ListarTipoItem();
        this.ListarColor();
        this.ListarContenido();
        this.ListarMarca();
        this.ListarItem();
    },
    methods: {
        AbrirModalItem() {
            $('#item').modal('show');
            this.nombreItem = ''
        },
        AbrirModalIngresoItem() {
            $('#ingresoItem').modal('show');
        },
        ListarItem() {
            let me = this;
            axios
                .get('/mostrarItem')
                .then(function (response) {
                    //Respuesta de la peticion
                    me.listasItem = response.data;
                    console.log("äaaaaa " + me.listasItem);
                    // me.listas_colores = response.data.color.map(function (obj) {
                    //     return obj.id;
                    // });
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
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
        GuardarItem() {
            let me = this;
            axios
                .post("/guardarItem", {
                    nombre: me.nombreItem,
                    color: me.colorItem,
                    tipoItem: me.nombreTipoItem.id,
                    contenido: me.contenidoItem,
                    marca: me.marcaItem
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    console.log(me.nombreItem)
                    console.log(response)
                    $('#item').modal('hide');
                    me.ListarItem();// para que se actualice los datos al momento de guardar
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
    }
}
</script>

<style scoped></style>