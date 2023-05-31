<template>
    <div>
        {{ listasItem }}

    </div>
</template>

<script>
export default {
    data() {
        return {
            listasItem: [],
        }
    },
    mounted() {
        this.ListarItem();

    },
    methods: {
        ListarItem() {
            let me = this;
            axios
                .get('/ListarItem')
                .then(function (response) {
                    //Respuesta de la peticion
                    me.listasItem = response.data;
                    console.log(me.listasItem);
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