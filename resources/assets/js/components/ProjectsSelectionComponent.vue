<template>
    <select @change="update">
        <option
            v-for="project in projects"
            :value="project.id"
            :key="project.id"
            :selected="project.id === currentProjectId ? 'selected' : ''"
        >{{ project.name }}
        </option>
    </select>
</template>
<script>
    export default {
        methods: {
            update(event)
            {
                this.$emit('updateProject', event.target.selectedOptions[0].value);
            }
        },
        props: [
            'projects',
            'currentProjectId'
        ]
    }
</script>
