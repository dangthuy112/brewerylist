import { createRouter, createWebHistory } from 'vue-router';
import notFound from './components/notFound.vue';
import BreweryList from '../breweries/BreweryList.vue';
import Brewery from '../brewery/Brewery.vue';
import AddBrewery from '../brewery/AddBrewery.vue';
import EditBrewery from '../brewery/EditBrewery.vue';
import ConfirmDelete from '../brewery/ConfirmDelete.vue';

const routes = [
    {
        name: 'breweryList',
        path: '/',
        component: BreweryList
    },
    {
        name: 'brewery',
        path: '/brewery/:id?',
        component: Brewery
    },
    {
        name: 'delete_confirm',
        path: '/brewery/:id?/delete_confirm',
        component: ConfirmDelete
    },
    {
        name: 'add_brewery',
        path: '/brewery/add_brewery',
        component: AddBrewery
    },
    {
        name: 'edit_brewery',
        path: '/brewery/edit_brewery/:id?',
        component: EditBrewery
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;