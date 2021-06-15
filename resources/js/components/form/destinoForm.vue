<template>
    <div class="col-auto form-search checkbox">
        <input type="checkbox" v-bind:value="destinoForm.destinosSeleccionadosForm" v-bind:id="destinoForm.value"  @change="onchangedestino">
        <label class="font-weight-bold w-100 d-block"  v-bind:for="destinoForm.value">{{ destinoForm.nombre }}</label>
    </div>

</template>

<script>
    export default {
        props: ['destinoForm'],
        methods: {
            onchangedestino: function (ev) {
                // console.log(ev);
                this.$emit('checked', this.destinoForm.nombre, ev.target.checked)

            }
        },
    }
</script>
