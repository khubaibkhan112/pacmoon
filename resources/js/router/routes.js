
import { createRouter, createWebHistory } from "vue-router";
import PointsIndex from '@/components/points/Index.vue'

const routes = [
    {
        path: "/",
        name:"Dashboard",
        component: () => import('@/Main.vue'),
        children: [
            {
                path:"/contract/:secret",
                component: () => import('../front/pages/contracts/ViewContract.vue'),
            },
        ]
    },
    {
        path: "/",
        name:"Points",
        component: () => import('@/components/points/Index.vue'),
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})
