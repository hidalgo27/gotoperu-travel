<template>
    <div class="col-auto form-search radio">
        <input type="radio" name="duration" v-bind:value="tiempo.tiemposSeleccionados" v-bind:id="tiempo.value"  @change="onchangeduration">
        <label class="font-weight-bold"  v-bind:for="tiempo.value">{{ tiempo.nombre }}</label>
    </div>
</template>

<script>
    export default {
        props: ['tiempo'],
        methods: {
            onchangeduration: function (ev) {
                // console.log(ev);
                this.$emit('checked', this.tiempo.value, ev.target.checked)
            }
        },
    }
</script>
