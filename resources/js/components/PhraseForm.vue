<template>
    <div>
        <a href="/"> <span>Voltar</span></a>
        <h1 class="mt-1">Nova frase</h1>
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

            <b-button class="w-100" type="submit" variant="primary"
                >Adicionar!</b-button
            >
        </b-form>
    </div>
</template>

<script>
export default {
    name: "PhraseForm",
    data() {
        return {
            form: {
                content: "",
                author: "",
            },
        };
    },
    methods: {
        async onSubmit() {
            try {
                await axios.post("/store", this.form);
            } catch (error) {
                console.log(error);
            }
        },
    },
};
</script>

<style></style>
