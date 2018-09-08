<template>
    <div class="trackings">
        <tracking-component v-for="tracking in trackings"
                            v-bind="tracking"
                            v-bind:projects="projects"
                            :key="tracking.id"
                            @delete="del"
                            @stop="stop"
                            @updateProject="updateProject"
                            @update="update"></tracking-component>
        <div class="add-button">
            <input type="text" name="tracking_name" id="tracking_name" v-model="tracking_name"/>
            <button @click="create()">Start Working</button>
        </div>
    </div>
</template>

<script>
    function Tracking({id, name, project_id, start_datetime, end_datetime, duration}) {
        this.id = id;
        this.name = name;
        this.project = project_id;
        this.startDatetime = start_datetime;
        this.endDatetime = end_datetime;
        this.duration = duration;
    }

    function Project({id, name}) {
        this.id = id;
        this.name = name;
    }

    import TrackingComponent from './TrackingComponent';

    export default {
        data() {
            return {
                trackings: [],
                projects: [],
                tracking_name: ''
            }
        },
        methods: {
            read() {
                window.axios.get('/api/trackings').then(({data}) => {
                    data.forEach(fetchedTracking => {
                        this.trackings.push(new Tracking(fetchedTracking));
                    });
                });

                window.axios.get('/api/projects').then(({data}) => {
                    data.forEach(fetchedProject => {
                        this.projects.push(new Project(fetchedProject));
                    });
                });
            },
            create() {
                window.axios.post(
                    '/api/trackings',
                    {
                        name: this.tracking_name,
                        project_id: 7 //@TODO replace with dynamic value
                    }).then(({data}) => {
                    this.trackings.push(new Tracking(data));
                });
                this.tracking_name = '';
            },
            update(id, name) {
                window.axios.put(`/api/trackings/${id}`, {name}).then(() => {
                    //TODO success message
                });
            },
            updateProject(id, projectId) {
                window.axios.put(`/api/trackings/${id}`, {project_id: projectId}).then(() => {
                    //TODO success message
                });
            },
            del(id) {
                window.axios.delete(`/api/trackings/${id}`).then(() => {
                    let index = this.trackings.findIndex(tracking => tracking.id === id);
                    this.trackings.splice(index, 1);
                });
            },
            stop(id) {
                window.axios.put(`/api/trackings/${id}`, {stop: true}).then((data) => {
                    let index = this.trackings.findIndex(tracking => tracking.id === id);
                    this.trackings[index].endDatetime = data.data.end_datetime;
                    this.trackings[index].duration = data.data.duration;
                });
            },
        },
        components: {
            TrackingComponent
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
