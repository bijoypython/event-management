import '../bootstrap';
import { createRouter, createWebHistory } from "vue-router";
import Dashboard from '../components/admin/Dashboard.vue';
import Product from '../components/admin/Product.vue';
import Contact from '../components/admin/contact/Contact.vue';
import About from '../components/admin/about/About.vue';
import Add_event from '../components/admin/about/Add_event.vue';

import Artist from '../components/admin/artist/Artist.vue';
import Add_artist from '../components/admin/artist/Add_artist.vue';
import Edit_artist from '../components/admin/artist/Edit_artist.vue';

import Event_name from '../components/admin/event/Event_name.vue';
import Event_schedule from '../components/admin/event/Event_schedule.vue';
import Add_event_name from '../components/admin/event/Add_event_name.vue';
import Add_event_schedule from '../components/admin/event/Add_event_schedule.vue';

import store from '../store';
import Login from '../components/admin/Login.vue';
import Festhome from '../components/festlive/Festhome.vue';
import Ticket from '../components/festlive/Ticket.vue';
const routes = [
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard,
        meta: {
            middleware: "auth",
            title: `Dashboard`
        }
    },
    {
        name: 'product',
        path: '/product',
        component: Product,
        
    },
    //contact--
    {
        name: 'contact',
        path: '/contact',
        component: Contact,
        meta: {
            title: `Contact`
        }
        
    },
    {
        name: 'about',
        path: '/about',
        component: About,
        meta: {
            title: `Event Info`
        }
        
    },
    {
        name: 'add_event',
        path: '/addevent',
        component: Add_event,
        meta: {
            title: `Add Event`
        }
        
    },
    {
        name: 'artist',
        path: '/artist',
        component:Artist,
        meta: {
            title: `Atist Info`
        }
        
    },
    {
        name: 'add_artist',
        path: '/addartist',
        component: Add_artist,
        meta: {
            title: `Add artist`
        }
        
    },
    {
        name: 'edit_artist',
        path: '/edit_artist/:id',
        component: Edit_artist,
        meta: {
            title: `Edit artist`
        }
        
    },
    {
        name: 'event_name',
        path: '/event-name',
        component: Event_name,
        meta: {
            title: `Event Name List`
        }
        
    },
    {
        name: 'event_schedule',
        path: '/event-schedule',
        component: Event_schedule,
        meta: {
            title: `Event Schedule List`
        }
        
    },
    {
        name: 'add_event_name',
        path: '/add-event-name',
        component: Add_event_name,
        meta: {
            title: `Add Event Name`
        }
        
    },
    {
        name: 'add_event_schedule',
        path: '/add-event-schedule',
        component: Add_event_schedule,
        meta: {
            title: `Add Event Schedule`
        }
        
    },
    {
        name: 'login',
        path: '/login',
        component: Login,
        meta: {
            middleware: "guest",
            title: `Login`
        }
    },
    {
        name: 'festlive',
        path: '/fest',
        component: Festhome,
        meta: {
            title: `Fest Live`
        }
    },
    {
        name: 'ticket',
        path: '/fest/ticket',
        component: Ticket,
        meta: {
            title: `Ticket`
        }
    }
]

const router=createRouter({
    history:createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.auth) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.auth) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})

export default router;
