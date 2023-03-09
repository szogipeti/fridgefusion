<template>
    <footer>
        <div class="container">
            <div class="row my-3">
                <div class="col">
                    <h5 class="mb-2">About us</h5>
                    <p>Welcome to FridgeFusion, the perfect solution for all your meal planning needs! Our team of three has designed a platform that allows you to search for recipes based on the ingredients you have on hand. No more endless scrolling through recipe websites or running to the grocery store for a missing ingredient - FridgeFusion is here to simplify your life..</p>
                </div>
            </div>
            <div class="row social-media my-3">
                <div class="col">
                    <ul class="d-flex justify-content-between align-items-center mx-auto">
                        <li><a target="_blank" href="https://www.facebook.com/FridgeFusion-114343821600287">
                            <font-awesome-icon class="fa-inverse" icon="fa-brands fa-facebook-f"/>
                        </a></li>
                        <li><a target="_blank" href="https://www.tiktok.com/@fridgefusion?lang=en">
                            <font-awesome-icon icon="fa-brands fa-tiktok" />
                        </a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/in/fridge-fusion-76b6a3269/">
                            <font-awesome-icon class="fa-inverse" icon="fa-brands fa-linkedin"/>
                        </a></li>
                        <li><a target="_blank" href="https://www.instagram.com/fridgefusion10/">
                            <font-awesome-icon class="fa-inverse" icon="fa-brands fa-instagram"/>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>

</script>

<style scoped>
footer {
    background-color: #C74545;
    color: white;
    font-size: 0.85rem;
    padding: 10px 0px 25px 0px;
}

li {
    list-style: none;
}

a {
    text-decoration: none;
}

.social-media a{
    font-size: 1.5rem;
}

.social-media ul{
    width: 25%;
}

a:link, a:visited, a:hover, a:active {
    color: white;
}

.quick-links-container{
    border-bottom: 1px solid white;
}
@media only screen and (max-width: 768px){
    .social-media a{
        font-size: 1rem;
    }

    .social-media ul{
        width: 50%;
    }
}
</style>
