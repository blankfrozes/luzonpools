import { createRouter, createWebHistory} from 'vue-router';
import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Contact from '../pages/Contact.vue';
import Detail from '../pages/Detail.vue';
import Result from '../pages/Result.vue';
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
        path: "/detail/:id",
        name: "detail",
        component: Detail
    },
    {
        path: "/result/:day",
        name: "result",
        component: Result
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
