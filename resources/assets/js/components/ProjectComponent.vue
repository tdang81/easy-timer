<template>
    <div class="project">
        <h3 v-on:dblclick="edit=true" v-show="edit === false">{{ name | properCase }}</h3>
        <button @click="del" v-show="edit === false">Delete</button>
        <input @keyup="updateName" v-show="edit === true" v-bind:value="name" />
        <button @click="update" v-show="edit === true">Save</button>
    </div>
</template>
<script>
    export default {
        methods: {
            del() {
                this.$emit('delete', this.id);
            },
            update() {
                this.$emit('update', this.id, this.name);
                console.log('update')
            },
            updateName(event) {
                this.name = event.target.value;
            }
        },
        data() {
            return {
                edit: false
            }
        },
        props: ['id', 'name'],
        filters: {
            properCase(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        }
    }
</script>
<style>
    .project {
        margin: 20px 0 0 0;
    }
</style>
