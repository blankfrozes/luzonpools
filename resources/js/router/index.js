import { createRouter, createWebHistory} from 'vue-router';
import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Contact from '../pages/Contact.vue';
import PageNotFound from '../pages/404.vue';
// import About from '../pages/About.vue';
const routes = [
    {
        path: "/",
        name: "home",
        component: Home
    },
    {
        path: "/about-us",
        name: "about-us",
        component: About
    },
    {
        path: "/contact-us",
        name: "contact-us",
        component: Contact
    },
    {
        path: "/:pathMatch(.*)*",
        name: "not found",
        component: PageNotFound
    },
];

const router = createRouter({
    history: createWebHistory("/"),
    routes
});

export default router;
