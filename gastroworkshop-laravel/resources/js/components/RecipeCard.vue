<template>
    <div class="col-12 col-md-6">
        <a href="">
            <div class="card">
                <img v-bind:src="'/img/' + image" alt="...">
                <div class="card-body">
                    <h6 class="card-subtitle">{{publisher}}</h6>
                    <h5 class="card-title">{{name}}</h5>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    name: "RecipeCard",
    props:{
        name: String,
        image: String,
        publisher: String
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
    margin: 20px 10px;
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
