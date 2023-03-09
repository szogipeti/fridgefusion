<template>
    <div class="col-12 col-md-6">
        <router-link :to="{ name: 'recipe', params: { id: this.id }}">
            <div class="card">
                <img v-bind:src="this.imgSrc" alt="...">
                <div class="card-body">
                    <h6 class="card-subtitle">{{this.publisher.username}}</h6>
                    <h5 class="card-title">{{name}}</h5>
                    <div v-if="canBeEdited" class="d-flex align-items-center justify-content-between mt-2">
                        <router-link :to="{ name: 'edit', params: { id: this.id } }">
                            <font-awesome-icon icon="fa-regular fa-pen-to-square" />
                        </router-link>
                        <font-awesome-icon @click="deleteRecipe" icon="fa-solid fa-trash" />
                    </div>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
import {RouterLink} from 'vue-router'
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {http} from "../utils/http";
export default {
    name: "RecipeCard",
    components:{
        FontAwesomeIcon,
        RouterLink
    },
    data(){
        return{
            publisher: {}
        }
    },
    props:{
        id: Number,
        name: String,
        image: String,
        publisherId: Number,
        canBeEdited: {
            type: Boolean,
            default: false
        }
    },
    computed:{
        imgSrc(){
            return `/img/${this.image}`
        },
    },
    methods:{
        async getPublisher(){
            console.log(this.publisherId)
            const resp = (await http.get('users/' + this.publisherId)).data.data
            console.log(resp)
            this.publisher = resp;
        },
        deleteRecipe(){

        }
    },
    mounted() {
        console.log(this.publisherId)
        this.getPublisher();
    }
}
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
    margin: 30px 10px;
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
}

</style>
