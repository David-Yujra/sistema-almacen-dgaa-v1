<template>
    <div>
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{ listasTipoItem }}
                    <div>AAAAAAAAAAAAAAAAAAAA</div>
                    {{ listasItem }}

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            listasItem: [],
            listasTipoItem:[]
        }
    },
    mounted() {
        this.ListarTipoItem();
    },
    methods: {
        ListarTipoItem() {
            let me = this;
            axios
                .get('/MostrarNuevo')
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
        ListarItem() {
            let me = this;
            axios
                .get('/MostrarNuevoTwo')
                .then(function (response) {
                    //Respuesta de la peticion
                    me.listasItem = response.data;
                    console.log("eeeeee"+me.listasItem);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
    }

}
</script>

<style></style>