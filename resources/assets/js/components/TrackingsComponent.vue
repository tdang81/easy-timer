<template>
    <div class="trackings">
        <tracking-component v-for="tracking in trackings"
                            v-bind="tracking"
                            :key="tracking.id"
                            @delete="del"
                            @update="update"></tracking-component>
        <div class="add-button">
            <input type="text" name="tracking_name" id="tracking_name" v-model="tracking_name"/>
            <button @click="create()">Add</button>
        </div>
    </div>
</template>

<script>
    function Tracking({id, name, project_id, start_datetime, duration}) {
        this.id = id;
        this.name = name;
        this.project = project_id;
        this.startDatetime = start_datetime;
        this.duration = duration;
    }

    import TrackingComponent from './TrackingComponent';

    export default {
        data() {
            return {
                trackings: [],
                tracking_name: ''
            }
        },
        methods: {
            read() {
                window.axios.get('/api/trackings').then(({data}) => {
                    data.forEach(fetchedTracking => {
                        console.log(fetchedTracking);
                        this.trackings.push(new Tracking(fetchedTracking));
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
            del(id) {
                window.axios.delete(`/api/trackings/${id}`).then(() => {
                    let index = this.trackings.findIndex(tracking => tracking.id === id);
                    this.trackings.splice(index, 1);
                });
            }
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
