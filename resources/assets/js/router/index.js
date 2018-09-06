import Vue from 'vue';
import VueRouter from 'vue-router';
import ProjectsComponent from '../components/ProjectsComponent';
import TrackingsComponent from '../components/TrackingsComponent';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/projects',
            name: 'Projects',
            component: ProjectsComponent
        },
        {
            path: '/trackings',
            name: 'Trackings',
            component: TrackingsComponent
        },
    ]
})
