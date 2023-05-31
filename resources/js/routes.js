import Vue from 'vue'
import VueRouter from 'vue-router'

// DE FORMA GLOBAL SE VA USAR EN TODO VUE CON VUE.USE()
Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history', // que habia mas antes nos dice el history
    linkActiveClass: 'active',
    routes: [{
            path: '*',
            name: 'ErrorPage',
            component: require('./components/ErrorComponent.vue').default
        },
        {
            path: '/',
            name: 'Home',
            component: require('./components/Home.vue').default
        },
        {
            path: '/productos',
            name: 'ProductoMostrar',
            component: require('./components/productos/ItemTerminado.vue').default

        },
        {
            path: '/proveedores',
            name: 'ProveedorMostrar',
            component: require('./components/proveedores/Proveedor.vue').default

        },

        // RUTAS PARA LISTAS DESPLEGABLES DESDE VUE

        {
            path: '/listas-desplegables/marca',
            name: 'AgregarListaDesplegableMarca',
            component: require('./components/listasDesplegables/Marca.vue').default
        },
        {
            path: '/listas-desplegables/color',
            name: 'AgregarListaDesplegableColor',
            component: require('./components/listasDesplegables/Color.vue').default
        },
        {
            path: '/listas-desplegables/contenido',
            name: 'AgregarListaDesplegableContenido',
            component: require('./components/listasDesplegables/Contenido.vue').default
        },
        {
            path: '/listas-desplegables/medida',
            name: 'AgregarListaDesplegableMedida',
            component: require('./components/listasDesplegables/Medida.vue').default
        },
        {
            path: '/listas-desplegables/tipoItem',
            name: 'AgregarListaDesplegableTipoItem',
            component: require('./components/listasDesplegables/TipoItem.vue').default
        },

        // MODULO AREPORTES

        {
            path: '/reportes/uno',
            name: 'ReportesAlmacenUno',
            component: require('./components/reportes/ReporteUno.vue').default
        },
        {
            path: '/reportes/dos',
            name: 'ReportesAlmacenDos',
            component: require('./components/reportes/ReporteDos.vue').default
        },
        {
            path: '/reportes/tres',
            name: 'ReportesAlmacenTres',
            component: require('./components/reportes/ReporteTres.vue').default
        },
        {
            path: '/reportes/cuatro',
            name: 'ReportesAlmacenCuatro',
            component: require('./components/reportes/ReporteCuatro.vue').default
        }
    ]
})