<template>
    <div class="container-fluid">
        <Form>
            <label for="name">name:</label>
            <Field type="text" name="name" class="form-control"/>
            <label for="method">method: (please put between every step a ';',The page will automatically put the text into ordered list, please Do not write number before the steps.))</label>
            <Field type="text" name="method" class="form-control"/>
            <label for="category">Category</label>
            <Field type="text" name="category" class="form-control"/> <!--Dropdwonlist kéne -->
            <label for="image">name:</label>
            <Field type="text" name="image" class="form-control"/>   <!--ezt kéne  beállítani hogy nem muszáj-->
            <div id ="app">
                <h1>{{counter}}</h1>
                <button @click='inc()'>+</button> <!-- Szerintem jól is kinézhet ha a total timenál és a Servingnél is egy ilyen pörgethető számláló van, mondjuk a total timenal nembaj ha bele is tudsz írni -->
                <button @click='dec()'>-</button>
            </div>
            <div id ="app">
                <h1>{{counter}}</h1>
            <button @click='inc()'>+</button>
            <button @click='dec()'>-</button>
            </div>
        </Form>
    </div>
</template>



<script setup>
import {createApp, onMounted} from 'vue'

const  AppObject ={
    data(){
        return{
            counter: 0
        }
    },
    methods:{
        inc(){
            this.counter++;
        },
        dec(){
            this.counter--;
        }
    }
}
const appInstance= createApp(AppObject);
appInstance.mount("#app");
</script>
