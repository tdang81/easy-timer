<template>
    <div class="projects">
        <project-component v-for="project in projects"
                           v-bind="project"
                           :key="project.id"
                            @delete="del"></project-component>
        <div class="add-button">
            <input type="text" name="project_name" id="project_name" v-model="project_name"/>
            <button @click="create()">Add</button>
        </div>
    </div>
</template>

<script>
    function Project({id, name}) {
        this.id = id;
        this.name = name;
    }

    import ProjectComponent from './ProjectComponent';

    export default {
        data() {
            return {
                projects: [],
                project_name: ''
            }
        },
        methods: {
            read() {
                window.axios.get('/api/projects').then(({data}) => {
                    data.forEach(fetchedProject => {
                        this.projects.push(new Project(fetchedProject));
                    });
                });
            },
            create() {
                window.axios.post(
                    '/api/projects',
                    {
                        name: this.project_name,
                        user_id: 16 //@TODO replace with dynamic value
                    }).then(({data}) => {
                    this.projects.push(new Project(data));
                });
                this.project_name = '';
            },
            del(id) {
                window.axios.delete(`/api/projects/${id}`).then(() => {
                    let index = this.projects.findIndex(project => project.id === id);
                    this.projects.splice(index, 1);
                });
            }
        },
        components: {
            ProjectComponent
        },
        created() {
            this.read();
        }
    }
</script>
<style>
    .add-button {
        margin: 20px 0 0 0;
    }
</style>
