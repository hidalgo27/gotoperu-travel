<template>
    <div class="col-auto text-center pr-1 form-search checkbox">
        <input type="checkbox" v-bind:value="numeroPasajerosForm.pasajerosSeleccionadosForm" v-bind:id="'np_'+numeroPasajerosForm.value"  @change="onchangepasajeros">
        <label class="font-weight-bold w-100 d-block"  v-bind:for="'np_'+numeroPasajerosForm.value">
            {{ numeroPasajerosForm.value }} <i data-feather="user" stroke-width="1"></i>
        </label>
    </div>

</template>

<script>
    export default {
        props: ['numeroPasajerosForm'],
        methods: {
            onchangepasajeros: function (ev) {
                // console.log(ev);
                this.$emit('checked', this.numeroPasajerosForm.value, ev.target.checked)

            }
        },
    }
</script>
