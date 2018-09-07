<template>
    <div class="tracking">
        <h3 v-on:dblclick="edit=true" v-show="edit === false">{{ name | properCase }}</h3>
        <h3>{{ project }}</h3>
        <button v-show="edit === false" @click="del">Delete</button>
        <input @keyup="updateName" v-show="edit === true" v-bind:value="name" />
        <button @click="update" v-show="edit === true">Save</button>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                edit: false
            }
        },
        methods: {
            del() {
                this.$emit('delete', this.id);
            },
            update () {
                this.$emit('update', this.id, this.name)
            },
            updateName(event) {
                this.name = event.target.value;
            }
        },
        props: ['id', 'name', 'project'],
        filters: {
            properCase(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        }
    }
</script>
<style>
    .tracking {
        margin: 20px 0 0 0;
    }
</style>
