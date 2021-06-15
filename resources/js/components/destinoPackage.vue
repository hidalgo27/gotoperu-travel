<template>
    <div class="col-auto form-search checkbox">
        <input type="checkbox" v-bind:value="destino.destinosSeleccionados" v-bind:id="destino.value"  @change="onchangeproduct">
        <label class="font-weight-bold"  v-bind:for="destino.value">{{ destino.nombre }}</label>
    </div>
</template>

<script>
    export default {
        props: ['destino'],
        methods: {
            onchangeproduct: function (ev) {
                // console.log(ev);
                this.$emit('checked', this.destino.value, ev.target.checked)

            }
        },
    }
</script>
