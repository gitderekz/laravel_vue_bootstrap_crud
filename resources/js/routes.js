// import Vue from 'vue';
import { createRouter, createWebHistory } from "vue-router";
import Index from './components/Index.vue';
import CreateClient from './components/CreateClient.vue';
import EditClient from './components/EditClient.vue';

export const routes = [
    {
        name: 'home',
        path: '/all',
        component: Index
    },
    {
        name: 'create',
        path: '/create',
        component: CreateClient
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditClient
    }
];

const router = createRouter({
    history:createWebHistory(),
    routes
})

export default router