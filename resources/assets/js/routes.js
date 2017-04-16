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
                component: require('./views/dashboard/home/Home.vue')
            },
            {
                path: 'dancer',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/dancer/Dancer.vue'),
                    }
                ]
            },
            {
                path: 'type',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/type/Type.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/type/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/type/Edit.vue')
                    }
                ]
            },
            {
                path: 'country',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/country/Country.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/country/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/country/Edit.vue')
                    }
                ]
            },
            {
                path: 'rarity',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/rarity/Rarity.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/rarity/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/rarity/Edit.vue')
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