<template>
    <div class="main">
        <!-- navigation bar -->
        <nav class="navbar navbar-expand-lg border-bottom navbar-light bg-light p-3 ms-auto">
            <div class="container-fluid">
                <span class="navbar-brand ps-5 fw-bold">BreweryList</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <router-link class="nav-link active" :to="{ name: 'breweryList' }">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link active" :to="{ name: 'add_brewery' }">Add Brewery</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- content -->
        <div class="container mt-4 mb-4 pr-4 pl-4">
            <router-view />
        </div>

        <!-- footer -->
        <div class="text-center p-3 fixed-bottom" style="background-color: #b1b1b1;">
            Made by
            <a class="text-reset fw-bold" href="http://github.com/dangthuy112">Dang Thuy Vo</a>
        </div>
    </div>
</template>

<script>
import AddBrewery from '../../brewery/AddBrewery.vue';

export default {
    components() {
        AddBrewery
    },
};
</script>

<style scoped>
.main {
    padding-bottom: 70px;
}
</style>