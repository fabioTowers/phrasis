<template>
    <div>
        <a href="/"> <span>Voltar</span></a>
        <h1 class="mt-1">
            {{ pageAction === "add" ? "Nova" : "Editar" }} frase
        </h1>
        <b-form @submit="onSubmit" class="mt-5">
            <b-form-group
                id="input-group-1"
                label="Frase/citação:"
                label-for="input-1"
            >
                <b-form-textarea
                    id="input-1"
                    v-model="form.content"
                    placeholder="Todos estes que estão aí atravancando meu caminho..."
                    required
                    rows="5"
                ></b-form-textarea>
            </b-form-group>

            <b-form-group
                id="input-group-2"
                label="Autoria:"
                label-for="input-2"
            >
                <b-form-input
                    id="input-2"
                    v-model="form.author"
                    placeholder="Mario Quintana"
                    required
                ></b-form-input>
            </b-form-group>

            <b-button class="w-100" type="submit" variant="primary">
                {{ pageAction === "add" ? "Adicionar" : "Editar" }}
            </b-button>
        </b-form>
    </div>
</template>

<script>
export default {
    name: "PhraseForm",
    props: ["phrase"],
    data() {
        return {
            pageAction: "add",
            form: {
                content: "",
                author: "",
            },
        };
    },
    watch: {
        phrase: {
            handler(val) {
                if (val) {
                    this.pageAction = "edit";
                    this.form = {
                        content: this.phrase.content,
                        author: this.phrase.author,
                    };
                }
            },
            immediate: true,
        },
    },
    methods: {
        async onSubmit(e) {
            e.preventDefault();
            try {
                if (this.pageAction === "add") {
                    await axios.post("/store", this.form);
                } else {
                    await axios.put(`/update/${this.phrase.id}`, this.form);
                }

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
};
</script>

<style></style>
