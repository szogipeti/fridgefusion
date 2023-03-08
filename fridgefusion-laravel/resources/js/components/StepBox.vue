<template>
    <div class="d-flex flex-column justify-content-around m-3">
        <div class="step-container">
            <div v-for="(step, k) in steps" :key="k" class="step">
                <input :placeholder="'Step ' + k + 1" class="form-control" type="text" :id="'step-' + k + 1" v-model="step.name">
                <font-awesome-icon class="icon-btn" @click="deleteStep(k)" icon="fa-solid fa-x"/>
            </div>
        </div>
        <button class="btn" @click="addStep">Add step</button>
    </div>
</template>

<script>
export default {
    name: "StepBox",
    props:{
        steps: Array
    },
    methods:{
        addStep(){
            this.steps.push({ name: ''})
        },
        deleteStep(index){
            this.steps.splice(index, 1)
        }
    },
    emits:[
        'addStep',
        'deleteStep'
    ]
}
</script>

<style scoped>

.step-container{
    width: 100%;
}

.step{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin-top: 10px;
    margin-bottom: 10px;
}

.fa-x{
    padding-left: 10px;
    padding-right: 10px;
    margin-left: 10px;
    margin-right: 10px;
}

input{
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
