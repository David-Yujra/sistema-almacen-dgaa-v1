<template>
    <div class="col grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="px-2">AÑADIR PROVEEDOR</div>
                    <button class="icon icon-box-success" v-on:click="AbrirModalProveedor">
                        <span class="mdi mdi-library-plus icon-item"></span>
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>EMPRESA</th>
                                <th>PROVEEDOR</th>
                                <th>RECURSOS DE:</th>
                                <th>CELULAR</th>
                                <th>UBICACIÓN</th>
                                <th>CORREO</th>
                                <th>
                                    <center>ACCIONES</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(provee, id) in listasProveedor" :key="id">
                                <td>{{ id+1 }}</td>
                                <td>{{ provee.nombre_empresa }}</td>
                                <td class="px-1 text-wrap" style="width: 6rem;">{{ provee.nombre_proveedor }}</td>
                                <td class="px-1 text-wrap" style="width: 6rem;">{{ provee.recursos }}</td>
                                <td>{{ provee.celular }}</td>
                                <td class="px-1 text-wrap" style="width: 8rem;">{{ provee.ubicacion }}</td>
                                <td class="px-1">{{ provee.correo }}</td>
                                <td class="d-flex">
                                    <button class="icon btn btn-success mx-1 btn-sm px-1" v-on:click="AbrirModalProveedorEditar(provee.id)">
                                        <i class="mdi mdi-table-edit icon-item"></i>
                                    </button>
                                    <button class="icon btn btn-primary mx-1 px-1" v-on:click="AbrirModalProveedorDetalle"> DETALLE </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- MODAL DE PROVEEDOR -->
        <div class="modal" tabindex="-1" id="proveedor">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Proveedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>EMPRESA:</label>
                            <input class="form-control" v-model="nombreEmpresa">
                        </div>
                        <div class="form-group">
                            <label>NOMBRE PROVEEDOR:</label>
                            <input class="form-control" v-model="nombreProveedor">
                        </div>
                        <div class="form-group">
                            <label>RECURSOS OTORGADOS POR:</label>
                            <input class="form-control" v-model="recursosOtorgados">
                        </div>
                        <div class="form-group">
                            <label>CELULAR:</label>
                            <input class="form-control" v-model="celularProveedor">
                        </div>
                        <div class="form-group">
                            <label>UBICACION:</label>
                            <input class="form-control" v-model="ubicacionProveedor">
                        </div>
                        <div class="form-group">
                            <label>CORREO:</label>
                            <input class="form-control" v-model="correoProveedor">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="GuardarProveedor">GUARDAR</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE PROVEEDOR EDITAR -->
        <div class="modal" tabindex="-1" id="proveedorEditar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Proveedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>EMPRESA:</label>
                            <input class="form-control" v-model="nombreEmpresaEditar">
                        </div>
                        <div class="form-group">
                            <label>NOMBRE PROVEEDOR:</label>
                            <input class="form-control" v-model="nombreProveedorEditar">
                        </div>
                        <div class="form-group">
                            <label>RECURSOS OTORGADOS POR:</label>
                            <input class="form-control" v-model="recursosOtorgadosEditar">
                        </div>
                        <div class="form-group">
                            <label>CELULAR:</label>
                            <input class="form-control" v-model="celularProveedorEditar">
                        </div>
                        <div class="form-group">
                            <label>UBICACION:</label>
                            <input class="form-control" v-model="ubicacionProveedorEditar">
                        </div>
                        <div class="form-group">
                            <label>CORREO:</label>
                            <input class="form-control" v-model="correoProveedorEditar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" v-on:click="GuardarProveedorEditado">GUARDAR CAMBIOS</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL DE PROVEEDOR DETALLE-->
        <div class="modal" tabindex="-1" id="proveedorDetalle">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">MOSTRAR ITEM DE LOS PROVEEDORES</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>DESCRIPCION ITEM</label>
                            <input class="form-control" value="Se vendio 3 paquetes de hojas">
                        </div>
                        <div class="form-group">
                            <label>FECHA</label>
                            <input class="form-control" value="EL  31-05-23">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            nombreEmpresa:'',
            nombreProveedor:'',            
            recursosOtorgados:'',
            celularProveedor:'',
            ubicacionProveedor:'',
            correoProveedor:'',
            nombreEmpresaEditar:'',
            nombreProveedorEditar:'',            
            recursosOtorgadosEditar:'',
            celularProveedorEditar:'',
            ubicacionProveedorEditar:'',
            correoProveedorEditar:'',
            idE:'',
            listasProveedor:[]

        }
    },
    mounted() {
        this.ListarProveedor()
    },
    methods:{
        AbrirModalProveedor() {
            $('#proveedor').modal('show');
            this.nombreEmpresa = '';
            this.nombreProveedor = '';
            this.recursosOtorgados = '';
            this.celularProveedor = '';
            this.ubicacionProveedor = '';
            this.correoProveedor = '';
        },
        ListarProveedor() {
            let me = this;
            axios
                .get('/listarProveedor')
                .then(function (response) {
                    //Respuesta de la peticion
                    me.listasProveedor = response.data;
                    console.log(me.listasProveedor);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        GuardarProveedor() {
            let me = this;
            axios
                .post("/guardarProveedor", {
                    empresa: me.nombreEmpresa,
                    nombre: me.nombreProveedor,                    
                    recursos: me.recursosOtorgados,
                    celular: me.celularProveedor,
                    ubicacion: me.ubicacionProveedor,
                    correo: me.correoProveedor
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    console.log(me.nombreProveedor)
                    console.log(response)
                    $('#proveedor').modal('hide');
                    me.ListarProveedor();// para que se actualice los datos al momento de guardar
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
        AbrirModalProveedorEditar(id) {
            console.log(id);
            let me = this;
            me.idE = id;
            axios
                .post('/mostrarProveedor', {
                    id: id
                })
                .then(function (response) {
                    console.log(response);
                    me.nombreEmpresaEditar = response.data.nombre_empresa;
                    me.nombreProveedorEditar = response.data.nombre_proveedor;
                    me.recursosOtorgadosEditar = response.data.recursos;
                    me.celularProveedorEditar = response.data.celular;
                    me.ubicacionProveedorEditar = response.data.ubicacion;
                    me.correoProveedorEditar = response.data.correo;
                    $('#proveedorEditar').modal('show');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
        GuardarProveedorEditado(){
            let me = this;
            axios
                .post("/editarProveedor", {
                    nombreEmpresa:me.nombreEmpresaEditar,
                    nombreProveedor: me.nombreProveedorEditar,
                    recursosOtorgados: me.recursosOtorgadosEditar,
                    celularProveedor: me.celularProveedorEditar,
                    ubicacionProveedor: me.ubicacionProveedorEditar,
                    correoProveedor: me.correoProveedorEditar,
                    id: me.idE
                })
                .then(function (response) {
                    //Respuesta de la peticion
                    console.log(response)
                    $('#proveedorEditar').modal('hide');
                    me.ListarProveedor();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })

        },
        AbrirModalProveedorDetalle(){
            $('#proveedorDetalle').modal('show');
        }
    }


}
</script>

<style scoped></style>