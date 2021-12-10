<template>
    <div>
        <div class="d-flex justify-content-between align-items-center">
            <h1>Frases</h1>
            <b-button variant="primary" @click="goToNewPhrasePage">
                Nova frase</b-button
            >
        </div>
        <div class="mt-3" v-if="phrases.length > 0">
            <b-card v-for="phrase in phrases" :key="phrase.id" class="mb-3">
                <blockquote class="blockquote mb-0">
                    <p>{{ phrase.content }}</p>
                    <footer class="blockquote-footer">
                        {{ phrase.author }}
                    </footer>
                </blockquote>

                <div class="mt-3">
                    <b-button
                        @click="() => goToEditPage(phrase.id)"
                        variant="link"
                        >Editar</b-button
                    >
                    <b-button
                        @click="
                            () => {
                                phraseToBeRemoved = phrase;
                                isModalOpen = true;
                            }
                        "
                        variant="link"
                        class="text-danger"
                        >Remover</b-button
                    >
                </div>

                <template #footer>
                    <small class="text-muted"
                        >Criado em {{ phrase.created_at | dateFormat }}</small
                    >
                </template>
            </b-card>
        </div>
        <div class="text-center no-phrases-wrapper" v-else>
            <h2>Nenhuma frase foi criada ainda, seja o primeiro!</h2>
            <b-button
                variant="primary"
                @click="goToNewPhrasePage"
                class="no-phrases-wrapper__button"
            >
                Nova frase</b-button
            >
        </div>
        <b-modal v-model="isModalOpen" hide-footer title="Atenção">
            <div class="d-block text-center">
                <h3>Remover frase</h3>
                <p>Você tem certeza que deseja remover esta frase?</p>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <b-button
                    variant="link"
                    class="text-muted"
                    @click="isModalOpen = false"
                    >Cancelar</b-button
                >
                <b-button variant="outline-danger ml-2" @click="removePhrase"
                    >Sim, remover</b-button
                >
            </div>
        </b-modal>
    </div>
</template>
<script>
import moment from "moment";
export default {
    props: {
        phrases: {
            type: Array,
        },
    },
    name: "PhrasesList",
    data() {
        return {
            isModalOpen: false,
            phraseToBeRemoved: null,
        };
    },
    methods: {
        goToNewPhrasePage() {
            const currentLocation = window.location.href;
            window.location.href = currentLocation + "create";
        },

        goToEditPage(id) {
            const currentLocation = window.location.href;
            window.location.href = currentLocation + `edit/${id}`;
        },
        async removePhrase() {
            try {
                await axios.delete(`/delete/${this.phraseToBeRemoved.id}`);
                this.isModalOpen = false;
                window.location.href = "/";
            } catch (error) {
                this.$bvToast.toast("Um erro inesperado ocorreu", {
                    title: "Ops...",
                    variant: "danger",
                    solid: true,
                    toaster: "b-toaster-top-center",
                });
            }
        },
    },
    filters: {
        dateFormat(val) {
            return moment(val).format("DD/MM/yyyy");
        },
    },
};
</script>

<style scoped>
.no-phrases-wrapper {
    margin-top: 25%;
}

.no-phrases-wrapper__button {
    width: 200px;
}
</style>
