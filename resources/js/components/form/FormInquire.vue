<template>

    <form @submit.prevent="agregar">

        <div v-if="formshow">
        <div v-show="tap_form_show">

            <div class="row mt-5">
                <div class="col text-center">
                    <h6 class="font-weight-bold">CALIDAD DEL HOTEL</h6>
                    <p class="font-weight-bold">(<span class="text-primary">Opcional:</span> Puede seleccionar más de una categoria de hotel.)</p>
                </div>
            </div>

            <div class="row align-items-center no-gutters border">
                <div class="col-2 text-center rounded-left bg-secondary">
                    <div class="py-4 text-white">
                        <i class="fas fa-home"></i>
                    </div>
                </div>
                <div class="col px-3">
                    <div class="row mt-2">
                        <template v-for="categoriaForm in category_hotel">
                            <categoria-form v-bind:categoriaForm="categoriaForm" v-bind:categoriasSeleccionadosForm="categoriasSeleccionadosForm" v-on:checked="selectCategoryForm"></categoria-form>
                        </template>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col text-center">
                    <h5 class="font-weight-bold">DESTINOS EN PERÚ</h5>
                </div>
            </div>

            <div class="row align-items-center no-gutters border">
                <div class="col-2 text-center rounded-left bg-secondary">
                    <div class="py-5 text-white">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                </div>
                <div class="col px-3">
                    <div class="row mt-2">
                        <template v-for="destinoForm in destinations_form">
                            <destino-form v-bind:destinoForm="destinoForm" v-bind:destinosSeleccionadosForm="destinosSeleccionadosForm" v-on:checked="selectDestino"></destino-form>
                        </template>
                        <div class="col-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control font-weight-bold" placeholder="Otros">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col text-center">
                    <h5 class="font-weight-bold">NUMERO DE PASAJEROS</h5>
                </div>
            </div>

            <div class="row align-items-center no-gutters border">
                <div class="col-2 text-center rounded-left bg-secondary">
                    <div class="py-4 text-white">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="col px-3">
                    <div class="row mt-2 no-gutters">

                        <template v-for="numeroPasajerosForm in travellers_form">
                            <numero-pasajeros-form v-bind:numeroPasajerosForm="numeroPasajerosForm" v-bind:pasajerosSeleccionadosForm="pasajerosSeleccionadosForm" v-on:checked="selectNumeroPasajerosForm"></numero-pasajeros-form>
                        </template>


                        <div class="col-2">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control font-weight-bold" placeholder="Especifica">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col text-center">
                    <h5 class="font-weight-bold">DURACIÓN DE VIAJE</h5>
                </div>
            </div>

            <div class="row align-items-center no-gutters border">
                <div class="col-2 text-center rounded-left bg-secondary">
                    <div class="py-4 text-white">
                        <i class="far fa-clock"></i>
                    </div>
                </div>
                <div class="col px-3">
                    <div class="row mt-2 no-gutters">

                        <template v-for="duracionForm in durations_form">
                            <duracion-form v-bind:duracionForm="duracionForm" v-bind:duracionSeleccionadosForm="duracionSeleccionadosForm" v-on:checked="selectDuracionForm"></duracion-form>
                        </template>

                        <div class="col-2">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control font-weight-bold" placeholder="Especifica">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <transition name="fade">
            <div v-show="!tap_form_show">
                <div class="container">
                <div class="row mb-3 align-items-center">
                    <div class="col-2 col-md-1 text-center rounded bg-secondary">
                        <div class="py-4 text-white">
                            <i class="far fa-user"></i>
                        </div>
                    </div>
                    <div class="col px-3">
                        <el-input
                            placeholder="Nombre Completo"
                            v-model="el_nombre"
                            clearable>
                        </el-input>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-2 col-md-1 text-center rounded bg-secondary">
                        <div class="py-4 text-white">
                            <i class="far fa-envelope"></i>
                        </div>
                    </div>
                    <div class="col px-3">
                        <el-input
                            placeholder="Email"
                            v-model="el_email"
                            clearable>
                        </el-input>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-2 col-md-1 text-center rounded bg-secondary">
                        <div class="py-4 text-white">
                            <i class="far fa-calendar"></i>
                        </div>
                    </div>
                    <div class="col px-3">
                            <el-date-picker
                                v-model="el_fecha"
                                type="date"
                                placeholder="Fecha de viaje">
                            </el-date-picker>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-2 col-md-1 text-center rounded bg-secondary">
                        <div class="py-4 text-white">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                    </div>
                    <div class="col px-3">
                        <vue-tel-input v-model="el_telefono"></vue-tel-input>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-2 col-md-1 text-center rounded bg-secondary">
                        <div class="py-4 text-white">
                            <i class="far fa-edit"></i>
                        </div>
                    </div>
                    <div class="col px-3">
                            <el-input
                                type="textarea"
                                :autosize="{ minRows: 2, maxRows: 4}"
                                placeholder="¿Tienes alguna duda o pregunta?"
                                v-model="el_textarea">
                            </el-input>

                    </div>
                </div>
                </div>
            </div>
        </transition>

        <div class="row mt-5">
            <div class="col text-right">
                <button type="button" class="btn btn-g-yellow btn-lg text-white font-weight-bold" v-on:click="tap_form_show = !tap_form_show" v-if="tap_form_show === true">
                    Siguiente >>
                </button>
                <button type="button" class="btn btn-secondary btn mx-3 text-white font-weight-normal" v-on:click="tap_form_show = !tap_form_show" v-else>
                    < Atrás
                </button>
                <button type="submit" class="btn btn-success btn-lg text-white font-weight-bold" v-if="tap_form_show === false" v-show="btnviewdesign">
                    Enviar
                </button>
                <transition name="fade">
                    <button type="submit" class="btn btn-dark btn-lg text-white font-weight-bold" v-show="loadingdesign">
                        <i class="fas fa-circle-notch fa-spin"></i>
                    </button>
                </transition>

            </div>
        </div>
        </div>
        <div class="row">
            <div class="col text-right">
                <a href="mailto:info@gotoperu.com.mx" class="btn btn-link font-weight-bold py-2 px-0">info@gotoperu.co</a>
            </div>
        </div>
        <div class="row mt-4" v-if="!formshow">
            <div class="col">
                <div class="alert alert-success">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <hr>
                        </div>
                        <div class="col text-center">
                            <h4 class="font-weight-bold">Gracias por contactar con nosotros</h4>
                            <p class="font-weight-nomal">Un representante de GOTOPERU se comunicará con usted a la brevedad.</p>
                            <button type="button" class="btn btn-primary" @click="updateComponent">Enviar Nuevo <i data-feather="rotate-ccw" class="text-white" stroke-width="1"></i></button>
                        </div>
                        <div class="col-3">
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</template>

<script>

    export default {
        data() {
            return {
                datos: [],
                category_hotel:[
                    {
                        nombre: 'Economico', estrellas: '2', value: '1'
                    },
                    {
                        nombre: 'Turista', estrellas: '3', value: '2'
                    },
                    {
                        nombre: 'Superior', estrellas: '4', value: '3'
                    },
                    {
                        nombre: 'Lujo', estrellas: '5', value: '4'
                    }
                ],
                destinations_form:[
                    {
                        nombre: 'Machu Picchu', value: '1'
                    },
                    {
                        nombre: 'Cusco', value: '2'
                    },
                    {
                        nombre: 'Lima', value: '3'
                    },
                    {
                        nombre: 'Montaña 7 colores', value: '4'
                    },
                    {
                        nombre: 'Lago Titicaca', value: '5'
                    },
                    {
                        nombre: 'Camino inca', value: '6'
                    }
                ],
                travellers_form:[
                    {
                        nombre: 'Machu Picchu', value: '1'
                    },
                    {
                        nombre: 'Cusco', value: '2'
                    },
                    {
                        nombre: 'Lima', value: '3'
                    },
                    {
                        nombre: 'Montaña 7 colores', value: '4'
                    },
                    {
                        nombre: 'Lago Titicaca', value: '5'
                    }
                ],
                durations_form:[
                    {
                        duration: '3-5'
                    },
                    {
                        duration: '6-8'
                    },
                    {
                        duration: '9-11'
                    },
                    {
                        duration: '12-15'
                    },
                    {
                        duration: '16+'
                    }
                ],
                tap_form_show: true,

                el_nombre:'',
                el_email:'',
                el_fecha:'',
                el_telefono: '',
                el_textarea: '',

                pickerOptions: {
                    disabledDate(time) {
                        return time.getTime() > Date.now();
                    },
                    shortcuts: [{
                        text: 'Today',
                        onClick(picker) {
                            picker.$emit('pick', new Date());
                        }
                    }, {
                        text: 'Yesterday',
                        onClick(picker) {
                            const date = new Date();
                            date.setTime(date.getTime() - 3600 * 1000 * 24);
                            picker.$emit('pick', date);
                        }
                    }, {
                        text: 'A week ago',
                        onClick(picker) {
                            const date = new Date();
                            date.setTime(date.getTime() - 3600 * 1000 * 24 * 7);
                            picker.$emit('pick', date);
                        }
                    }]
                },

                categoriasSeleccionadosForm: [],
                destinosSeleccionadosForm: [],
                pasajerosSeleccionadosForm: [],
                duracionSeleccionadosForm: [],

                loadingdesign: false,
                btnviewdesign: true,
                formshow: true
            }
        },
        methods: {
            selectDestino: function (destinoForm, checked) {
                if (checked){
                    this.destinosSeleccionadosForm.push(destinoForm);
                    console.log(destinoForm);
                }else{
                    let index = this.destinosSeleccionadosForm.indexOf(destinoForm);
                    this.$delete(this.destinosSeleccionadosForm, index);
                    console.log(index);
                }
            },
            selectCategoryForm: function (categoriaForm, checked) {
                if (checked){
                    this.categoriasSeleccionadosForm.push(categoriaForm);
                    console.log(categoriaForm);
                }else{
                    let index = this.categoriasSeleccionadosForm.indexOf(categoriaForm);
                    this.$delete(this.categoriasSeleccionadosForm, index);
                    console.log(index);
                }
                // console.log(this.categoriasSeleccionadosForm);
            },
            selectNumeroPasajerosForm: function (pasajerosForm, checked) {
                if (checked){
                    this.pasajerosSeleccionadosForm.push(pasajerosForm);
                    console.log(pasajerosForm);
                }else{
                    let index = this.pasajerosSeleccionadosForm.indexOf(pasajerosForm);
                    this.$delete(this.pasajerosSeleccionadosForm, index);
                    console.log(index);
                }
            },
            selectDuracionForm: function (duracionForm, checked) {
                if (checked){
                    this.duracionSeleccionadosForm.push(duracionForm);
                    console.log(duracionForm);
                }else{
                    let index = this.duracionSeleccionadosForm.indexOf(duracionForm);
                    this.$delete(this.duracionSeleccionadosForm, index);
                    console.log(index);
                }
                // console.log(this.duracionSeleccionadosForm);
            },

            agregar(){
                if(this.el_nombre.trim() === '' || this.el_email.trim() === ''){
                    alert('Por favor complete "Nombre" o "Email"');
                    return;
                }

                let obj = {
                    category_d: this.categoriasSeleccionadosForm,
                    destino_d: this.destinosSeleccionadosForm,
                    pasajeros_d: this.pasajerosSeleccionadosForm,
                    duracion_d: this.duracionSeleccionadosForm,
                    tap_form_show: this.tap_form_show,

                    el_nombre: this.el_nombre,
                    el_email: this.el_email,
                    el_fecha: this.el_fecha,
                    el_telefono: this.el_telefono,
                    el_textarea: this.el_textarea,
                };
                const self = this;
                this.loadingdesign = true;
                this.btnviewdesign = false;
                this.tap_form_show = false;
                this.formshow = true;
                axios.post('/formulario-diseno', obj)
                    .then((res) =>{
                        self.loadingdesign = false;
                        this.btnviewdesign = true;
                        this.tap_form_show = true;
                        this.formshow = false;
                        const datoServidor = res.data;
                        this.datos.push(datoServidor);
                        console.log(datoServidor);
                        // this.$forceUpdate();
                        // console.log(this.categoriasSeleccionadosForm);

                    })
            },
            updateComponent(){
                // this.$forceUpdate();
                this.formshow = true;
                this.categoriasSeleccionadosForm = [];
                this.destinosSeleccionadosForm = [];
                this.pasajerosSeleccionadosForm = [];
                this.duracionSeleccionadosForm = [];
                this.el_nombre = '';
                this.el_email = '';
                this.el_fecha = '';
                this.el_telefono = '';
                this.el_textarea = '';
                console.log(this.categoriasSeleccionadosForm);
                // console.log('test');

            }
        }

    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
    .vti__input{
        -webkit-appearance: none;
        background-color: #FFF;
        background-image: none;
        border-radius: 0 4px 4px 0 !important;
        /*border: 1px solid #DCDFE6 !important;*/
        box-sizing: border-box;
        color: #606266;
        display: inline-block;
        font-size: inherit;
        height: 40px;
        line-height: 40px;
        outline: 0;
        padding: 0 15px;
        transition: border-color .2s cubic-bezier(.645,.045,.355,1);
        width: 100%;
    }
    .vue-tel-input {
        border-radius: 4px;
        display: flex;
        border: 1px solid #DCDFE6 !important;
        text-align: left;
    }
    .vue-tel-input:focus-within {
        box-shadow: none !important;
        border-color: #66afe9 !important;
    }
</style>
