<template>
    <div>
        <b-navbar toggleable="sm" type="dark" variant="light" class="navbar">
            <b-navbar-toggle target="nav-text-collapse"></b-navbar-toggle>

            <b-navbar-brand href="/" class="font-weight-bold">
                <p class="mt-3">Phrasis</p>
            </b-navbar-brand>
        </b-navbar>
    </div>
</template>

<script>
export default {
    name: "Header",
};
</script>

<style scoped>
.navbar {
    background-color: #042c24 !important;
}
</style>
