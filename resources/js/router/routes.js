import { createRouter, createWebHistory } from 'vue-router'

import PointsIndex from '@/components/points/Index.vue'

const routes = [
    {
        path: '/points',
        name: 'points.index',
        component: PointsIndex
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})
