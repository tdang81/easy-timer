<template>
    <div class="tracking">
        <h3>{{ name | properCase }}</h3>
        <h3>{{ project }}</h3>
        <button @click="del">Delete</button>
    </div>
</template>
<script>
    export default {
        methods: {
            del() {
                this.$emit('delete', this.id);
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
