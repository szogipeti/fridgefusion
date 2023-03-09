<template>
    <div class="col-12 col-md-6">
            <div class="card">
                <router-link :to="{ name: 'recipe', params: { id: props.id }}">
                    <img v-bind:src="imgSrc" alt="...">
                    <div class="card-body">
                        <h6 class="card-subtitle">{{publisher.username}}</h6>
                        <h5 class="card-title">{{props.name}}</h5>
                    </div>
                </router-link>
                <div v-if="canBeEdited" class="d-flex align-items-center justify-content-between mt-2">
                    <router-link :to="{ name: 'edit', params: { id: props.id } }">
                        <font-awesome-icon icon="fa-regular fa-pen-to-square" />
                    </router-link>
                    <font-awesome-icon @click="deleteRecipe" icon="fa-solid fa-trash" />
                </div>
            </div>
    </div>
</template>

<script setup>
import {RouterLink} from 'vue-router'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {http} from "../utils/http";
import {useRouter} from 'vue-router';
import {computed, onMounted, reactive} from "vue";

const router = useRouter();

const publisher = reactive({});

const props = defineProps({
    id: Number,
    name: String,
    image: String,
    publisherId: Number,
    canBeEdited: {
        type: Boolean,
        default: false
    }
})

const imgSrc = computed(() =>{
    return `/img/${props.image}`
})

const getPublisher = async function (){
    const resp = (await http.get('users/' + props.publisherId)).data.data
    publisher.id = resp.id;
    publisher.username = resp.username;
}

const deleteRecipe = function(){
    http.delete('recipes/' + props.id, { headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') } })
    router.go();
}

onMounted(() => {
    getPublisher();
})
</script>

<style scoped>
a, a:link, a:visited, a:active{
    text-decoration: none;
    color: black;
}

a:hover .card-subtitle{
    text-decoration: none;
}

a:hover .card-title{
    color: black;
    text-decoration: underline #117972 from-font;
    text-underline-offset: 7px;
}

.card{
    height: 250px;
    margin: 20px 10px 50px 10px;
    display: flex;
    justify-content: space-around;
    border: none;
    border-radius: 0;
}

.card h5{
    font-weight: bold;
}

img{
    height: 200px;
    object-fit: cover;
    object-position: center;
    border-radius: 0;
    width: 100%;
}

.fa-trash{
    cursor: pointer;
}

</style>
