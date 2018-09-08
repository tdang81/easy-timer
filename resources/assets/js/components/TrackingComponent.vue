<template>
    <div class="tracking">
        <h3 v-on:dblclick="edit=true" v-show="edit === false">{{ name | properCase }}</h3>
        <input @keyup="updateName" v-show="edit === true" v-bind:value="name" />
        <button @click="update" v-show="edit === true">Save</button>
        <h3>{{ project }}</h3>
        <h3>{{ startDatetime }}</h3>
        <h3>{{ endDatetime }}</h3>
        <h3 v-show="endDatetime !== null">{{ duration.d }} days {{ duration.h }} hours {{ duration.i }} minutes</h3>
        <projects-selection-component v-bind:currentProjectId="project" @updateProject="updateProject" v-bind:projects="projects"></projects-selection-component>
        <button v-show="endDatetime === null" @click="stop">Stop</button>
        <button v-show="edit === false" @click="del">Delete</button>
    </div>
</template>
<script>
    import ProjectsSelectionComponent from './ProjectsSelectionComponent';

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
                this.edit = false;
            },
            updateProject (value) {
                this.$emit('updateProject', this.id, value)
            },
            updateName(event) {
                this.name = event.target.value;
            },
            stop () {
                this.$emit('stop', this.id)
            },
        },
        props: ['id', 'name', 'project', 'startDatetime', 'endDatetime', 'duration', 'projects'],
        filters: {
            properCase(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        },
        components: {
            ProjectsSelectionComponent
        }
    }
</script>
<style>
    .tracking {
        margin: 20px 0 0 0;
    }
</style>
