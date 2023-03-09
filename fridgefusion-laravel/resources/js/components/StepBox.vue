<template>
    <div class="d-flex flex-column justify-content-around m-3">
        <div class="step-container">
            <div v-for="(step, k) in value" :key="k" class="step">
                <input
                    @blur="handleBlur"
                       :placeholder="'Step ' + (parseInt(k) + 1)" class="form-control" type="text" :id="'step-' + k + 1"
                       v-model="step.name">
                <font-awesome-icon class="icon-btn" @click="$emit('deleteStep', k)" icon="fa-solid fa-x"/>
            </div>
        </div>
        <button class="btn" @click="$emit('addStep')">Add step</button>
    </div>
</template>

<script setup>
import { toRef } from "vue";
import { useField } from "vee-validate";

const props = defineProps(
    {
        value: {
            type: Array,
            default: [ { name: ''} ]
        },
        name: {
            type: String,
            required: true
        }
    }
)

const name = toRef(props, 'name');

const {
    value: inputValue,
    errorMessage,
    handleBlur,
    handleChange,
    meta,
} = useField(name, undefined, {
    initialValue: props.value
})

const addStep = function(){
    value.push({name: ''})
}

defineEmits([
    'addStep',
    'deleteStep'
])
</script>

<style scoped>

.step-container {
    width: 100%;
}

.step {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin-top: 10px;
    margin-bottom: 10px;
}

.fa-x {
    padding-left: 10px;
    padding-right: 10px;
    margin-left: 10px;
    margin-right: 10px;
}

input {
    width: 100%;
    margin-right: 10px;
    padding: 5px;
}

button.btn, button.btn:link, button.btn:visited, button.btn:hover, button.btn:active {
    border-radius: 0;
    color: white;
    background: #117972;
    align-self: end;
    width: 100%;
}
</style>
