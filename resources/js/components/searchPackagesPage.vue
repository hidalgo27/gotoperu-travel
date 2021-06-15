<template>
    <section>
        <div class="container">
            <form @submit.prevent="filterPackage">
            <div class="row">

                <div class="d-none d-md-block col-md-4 mb-3">

                    <div class="card sticky-top bg-secundary border-g-yellow border-right-0 shadow-sm">
                        <div class="arrow-left"></div>
                        <div class="card-header bg-g-yellow">
                            <h5 class="font-weight-bold m-0 text-white">Filtrar paquetes por:</h5>
                        </div>
                        <div class="row card-body">
                            <div class="col">

                                <h5 class="font-weight-bold">Destinos</h5>
                                        <div class="row align-items-center">
                                            <template v-for="destino in destinos">
                                                <destino-package v-bind:destino="destino" v-bind:destinosSeleccionados="destinosSeleccionados" v-on:checked="selectDestino"></destino-package>
                                            </template>
                                        </div>
                                <hr>
                                <h5 class="font-weight-bold">Duración</h5>

                                        <div class="row align-items-center">
                                            <template v-for="tiempo in tiempos">
                                                <tiempo-package v-bind:tiempo="tiempo" v-bind:tiemposSeleccionados="tiemposSeleccionados" v-on:checked="selectTiempo"></tiempo-package>
                                            </template>
                                        </div>
                                <hr>
                                <h5 class="font-weight-bold">Categoria</h5>
                                        <div class="row align-items-center">
                                            <template v-for="categoria in categorias">
                                                <categoria-package v-bind:categoria="categoria" v-bind:categoriasSeleccionados="categoriasSeleccionados" v-on:checked="selectCategory"></categoria-package>
                                            </template>
                                        </div>


                            </div>


                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block btn-g-dark position-relative font-weight-bold" v-show="btnview">
                                    Buscar
                                </button>
                                <div class="text-center fa-2x">
                                    <i class="fas fa-circle-notch fa-spin" v-show="loading"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-12 col-md-8">

                        <div class="row">
                            <template v-for="paquete in paquetes">
                                <template v-for="(paquete_p, index) in paquete.package">
                                    <template v-if="paquete_p.paquetes_destinos && !paquete_p.paquetes_categoria">
                                        <template v-if="paquete_p.paquetes_destinos.length > 0">
                                            <search-list-package-page v-bind:paquete_p="paquete_p" :paquete_destinations="paquete.destinations"></search-list-package-page>
                                        </template>
                                    </template>

                                    <template v-if="!paquete_p.paquetes_destinos && paquete_p.paquetes_categoria">
                                        <template v-if="paquete_p.paquetes_categoria.length > 0">
                                            <search-list-package-page v-bind:paquete_p="paquete_p" :paquete_category="paquete.category" :paquete_destinations="paquete.destinations"></search-list-package-page>
                                        </template>
                                    </template>

                                    <template v-if="paquete_p && !paquete_p.paquetes_destinos && !paquete_p.paquetes_categoria">
                                        <search-list-package-page v-bind:paquete_p="paquete_p" :paquete_category="paquete.category" :paquete_destinations="paquete.destinations"></search-list-package-page>
                                    </template>

                                    <template v-if="paquete_p.paquetes_destinos && paquete_p.paquetes_categoria">
                                        <template v-if="paquete_p.paquetes_categoria.length > 0">
                                            <search-list-package-page v-bind:paquete_p="paquete_p" :paquete_category="paquete.category" :paquete_destinations="paquete.destinations"></search-list-package-page>
                                        </template>
                                    </template>

                                </template>

                            </template>

                            <div class="col-12">
                                <div class="mt-4 bg-white py-3">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-8">
                                            <div class="row align-items-center">
                                                <div class="col-3">
                                                    <hr>
                                                </div>
                                                <div class="col text-center">
                                                    <h4 class="font-weight-bold">¿No encuentras lo que buscas?</h4>
                                                    <p class="font-weight-nomal">No se preocupe, nosotros diseñamos un viaje par usted.</p>
                                                </div>
                                                <div class="col-3">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col text-center">
                                                    <a :href="'#consulte'" class="btn-lg btn btn-g-yellow text-white font-weight-bold">Diseñe su viaje</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            </form>
        </div>
    </section>

</template>

<script>
    export default {
        data() {
            return {
                destinos:[
                    {
                        nombre: 'Arequipa', value: '85'
                    },
                    {
                        nombre: 'Lima', value: '84'
                    },
                    {
                        nombre: 'Cusco', value: '80'
                    },
                    {
                        nombre: 'Machu Picchu', value: '81'
                    },
                    {
                        nombre: 'Montaña 7 Colores', value: '83'
                    },
                ],
                categorias:[
                    {
                        nombre: 'Familia', value: '17', category: ''
                    },
                    {
                        nombre: 'Clásico', value: '16', category: ''
                    },
                    {
                        nombre: 'Extenso', value: '18', category: ''
                    }
                ],
                tiempos:[
                    {
                        nombre: '3-5 días', value: '3-5', duration: ''
                    },
                    {
                        nombre: '6-8 días', value: '6-8', duration: ''
                    },
                    {
                        nombre: '9-11 días', value: '9-11', duration: ''
                    },
                    {
                        nombre: '11-15 días', value: '11-15', duration: ''
                    },
                    {
                        nombre: '16+', value: '16+', duration: ''
                    },
                ],
                destinosSeleccionados: [],
                tiemposSeleccionados: [],
                categoriasSeleccionados: [],
                paquetes: [],
                destinations: [],
                loading: false,
                btnview: true
            }
        },
        created(){
            axios.get('/load/packages-all').then(res=>{
                this.paquetes = res.data;
            })
        },
        methods: {
            selectDestino: function (destino, checked) {
                if (checked){
                    this.destinosSeleccionados.push(destino);
                    console.log(destino);
                }else{
                    let index = this.destinosSeleccionados.indexOf(destino);
                    this.$delete(this.destinosSeleccionados, index);
                    console.log(index);
                }
            },
            selectCategory: function (categoria, checked) {
                if (checked){
                    this.categoriasSeleccionados.push(categoria);
                    console.log(categoria);
                }else{
                    let index = this.categoriasSeleccionados.indexOf(categoria);
                    this.$delete(this.categoriasSeleccionados, index);
                    console.log(index);
                }
            },
            selectTiempo: function (tiempo, checked) {
                if (checked){
                    this.tiemposSeleccionados = [];
                    this.tiemposSeleccionados.push(tiempo);
                    console.log(tiempo);
                }else{
                    let index = this.tiemposSeleccionados.indexOf(tiempo);
                    this.$delete(this.tiemposSeleccionados, index);
                    console.log(index);
                }
            },
            filterPackage: function () {
                // console.log('se ejecuta');
                // if(this.nota.nombre.trim() === '' || this.nota.descripcion.trim() === ''){
                //     alert('Debes completar todos los campos antes de guardar');
                //     return;
                // }
                let obj = {
                    destinoSelected: this.destinosSeleccionados,
                    categoriaSelected: this.categoriasSeleccionados,
                    tiempoSelected: this.tiemposSeleccionados
                };
                const self = this;
                this.loading = true;
                this.btnview = false;
                // const destinosNueva = this.destinosSeleccionados;
                // this.destinos = {nombre: '', descripcion: ''};
                axios.post('/agregar', obj)
                    .then((res) =>{
                        self.loading = false;
                        this.btnview = true;
                        const paquetesServidor = res.data;
                        // this.paquetes.push(destinosServidor);
                        // console.log(paquetesServidor);
                        // this.paquetes = [];
                        this.paquetes = paquetesServidor;
                        // this.paquetes.push(paquetesServidor);
                        // console.log(this.destinations);
                    });

                // console.log(this.destinosSeleccionados);
                console.log(this.categoriasSeleccionados);
                // console.log(this.tiemposSeleccionados);

            },
        },
    }
</script>
