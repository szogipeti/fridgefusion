<template>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fridge Fusion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Seasonal recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Weekly recipes</a>
                    </li>
                </ul>
                <a class="nav-link d-flex align-items-center" href="#">
                    <p class="mx-1 my-auto">Your profile</p>
                    <img class="mx-1" src="/img/profile-icon.png" alt="">
                </a>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "NavBar"
}
</script>

<style scoped>

</style>
