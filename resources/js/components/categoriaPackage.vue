<template>
    <div class="col-auto form-search checkbox">
        <input type="checkbox" v-bind:value="categoria.categoriasSeleccionados" v-bind:id="categoria.value"  @change="onchangeCategory">
        <label class="font-weight-bold"  v-bind:for="categoria.value">{{ categoria.nombre }}</label>
    </div>
</template>

<script>
    export default {
        props: ['categoria'],
        methods: {
            onchangeCategory: function (ev) {
                // console.log(ev);
                this.$emit('checked', this.categoria.value, ev.target.checked)
            }
        },
    }
</script>
