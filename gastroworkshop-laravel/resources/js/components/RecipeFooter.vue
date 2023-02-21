<template>
    <footer>
        <div class="container">
            <div class="row my-3">
                <div class="col">
                    <h5 class="mb-2">About us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur imperdiet placerat erat eu
                        feugiat. Integer porta, quam ac dignissim venenatis, diam metus pulvinar augue, eu interdum
                        mauris ante sit amet massa. Curabitur sagittis dolor id neque tincidunt mattis. Curabitur quis
                        nulla tempus, vehicula massa ut, convallis purus. Mauris pulvinar ac sem sit amet semper. Class
                        aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin in
                        mattis neque, efficitur pellentesque velit.</p>
                </div>
            </div>
            <div class="row quick-links-container w-75 mx-auto my-3">
                <div class="col">
                    <h5 class="mb-2">Quick links</h5>
                    <div class="row">
                        <div class="col">
                            <ul>
                                <li><a href="">Lorem ipsum</a></li>
                                <li><a href="">Nam vehicula</a></li>
                                <li><a href="">Pellentesque</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <li><a href="">Lorem ipsum</a></li>
                            <li><a href="">Nam vehicula</a></li>
                            <li><a href="">Pellentesque</a></li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row social-media my-3">
                <div class="col">
                    <ul class="d-flex justify-content-between align-items-center mx-auto">
                        <li><a href="">
                            <font-awesome-icon class="fa-inverse" icon="fa-brands fa-facebook-f"/>
                        </a></li>
                        <li><a href="">
                            <font-awesome-icon class="fa-inverse" icon="fa-brands fa-twitter"/>
                        </a></li>
                        <li><a href="">
                            <font-awesome-icon class="fa-inverse" icon="fa-brands fa-linkedin"/>
                        </a></li>
                        <li><a href="">
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
