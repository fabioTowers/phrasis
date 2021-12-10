<template>
    <div>
        <b-navbar toggleable="sm" type="dark" variant="light" class="navbar">
            <b-navbar-toggle target="nav-text-collapse"></b-navbar-toggle>

            <b-navbar-brand href="/" class="mx-auto text-center">
                <h3 class="mt-3 font-weight-bold">Phrasis</h3>
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

h3 {
    font-size: 2.5rem;
}
</style>
