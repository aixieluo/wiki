import Dashboard from './views/Dashboard.vue'
import Parent from './views/Parent.vue'

export default [
    {
        path: '/dashboard',
        component: Dashboard,
        beforeEnter: requireAuth,
        children: [
            {
                path: '/',
                redirect: '/dashboard/home'
            },
            {
                path: 'home',
                component: require('./views/dashboard/home/home.vue')
            },
            {
                path: 'dancer',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/dancer/dancer.vue'),
                    }
                ]
            },
            {
                path: 'type',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/type/type.vue')
                    }
                ]
            }
        ]
    }
]

function requireAuth (to, from, next) {
    if (window.User) {
        return next()
    } else {
        return next('/')
    }
}