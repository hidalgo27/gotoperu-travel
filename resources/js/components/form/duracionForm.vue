<template>
<!--    <div class="col-auto text-center pr-1 form-search checkbox">-->
<!--        <input type="checkbox" v-bind:value="numeroPasajerosForm.duracionSeleccionadosForm" v-bind:id="'np_'+numeroPasajerosForm.value"  @change="onchangepasajeros">-->
<!--        <label class="font-weight-bold w-100 d-block"  v-bind:for="'np_'+numeroPasajerosForm.value">-->
<!--            {{ numeroPasajerosForm.value }} <i data-feather="user" stroke-width="1"></i>-->
<!--        </label>-->
<!--    </div>-->

    <div class="col-auto text-center pr-1 form-search checkbox">
        <input type="checkbox" v-bind:value="duracionForm.duracionSeleccionadosForm" v-bind:id="'d_'+duracionForm.duration"  @change="onchangepasajeros">
        <label class="font-weight-bold w-100 d-block"  v-bind:for="'d_'+duracionForm.duration">
            {{ duracionForm.duration }}
        </label>
    </div>

</template>

<script>
    export default {
        props: ['duracionForm'],
        methods: {
            onchangepasajeros: function (ev) {
                // console.log(ev);
                this.$emit('checked', this.duracionForm.duration, ev.target.checked)

            }
        },
    }
</script>
