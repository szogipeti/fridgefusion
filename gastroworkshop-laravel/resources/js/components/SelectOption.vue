<template>
<div class="option" @click="$emit('setSelected', this.label, this.id)">
    <input type="radio" v-bind:name="category" v-bind:id="id">
    <label v-bind:for="id">{{label}}</label>
</div>
</template>

<script>
export default {
    name: "SelectOption",
    props:{
        id: String,
        label: String,
        category: String
    },
    emits:[
        'setSelected'
    ]
}
</script>

<style scoped>
input{
    display: none;
}
label{
    cursor: pointer;
}
.option{
    position: relative;
    display: block;
}

.select-box .option{
    padding: 12px 24px;
    cursor: pointer;
}

.select-box .option:hover{
    background: #414b57;
}

</style>
