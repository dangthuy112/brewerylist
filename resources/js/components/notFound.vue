<template>
    <div class="main">
        <div class="container mt-4 mb-4 pr-4 pl-4">
            <h1 class="text-center">
                404 | NOT FOUND
            </h1>
        </div>

        <div class="text-center p-3 fixed-bottom" style="background-color: #b1b1b1;">
            Made by
            <a class="text-reset fw-bold" href="http://github.com/dangthuy112">Dang Thuy Vo</a>
        </div>

    </div>
</template>

<script>
export default {
    mounted() {
        console.log("index Component mounted.");
    }
};
</script>

<style scoped>
.main {
    padding-bottom: 70px;
}
</style>