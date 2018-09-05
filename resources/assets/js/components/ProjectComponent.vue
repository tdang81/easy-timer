<template>
    <div class="project">
        <div class="">
            <h3>{{ name | properCase }}</h3>
            <button @click="del">Delete</button>
        </div>
    </div>
</template>
<script>
    export default {
        methods: {
            del() {
                this.$emit('delete', this.id);
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
