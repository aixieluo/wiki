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
                        component: require('./views/dashboard/dancer/Index.vue'),
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/dancer/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/dancer/Edit.vue')
                    }
                ]
            },
            {
                path: 'type',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/type/Index.vue')
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
                        component: require('./views/dashboard/country/Index.vue')
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
                        component: require('./views/dashboard/rarity/Index.vue')
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
            },
            {
                path: 'slot',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/slot/Index.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/slot/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/slot/Edit.vue')
                    }
                ]
            },
            {
                path: 'equipment',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/equipment/Index.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/equipment/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/equipment/Edit.vue')
                    }
                ]
            },
            {
                path: 'equipmentInfo',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/equipmentInfo/Index.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/equipmentInfo/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/equipmentInfo/Edit.vue')
                    }
                ]
            },
            {
                path: 'technologyCategory',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/technologyCategory/Index.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/technologyCategory/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/technologyCategory/Edit.vue')
                    }
                ]
            },
            {
                path: 'technologyType',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/technologyType/Index.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/technologyType/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/technologyType/Edit.vue')
                    }
                ]
            },
            {
                path: 'technology',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/technology/Index.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/technology/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/technology/Edit.vue')
                    }
                ]
            },
            {
                path: 'tacticInfo',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/tacticInfo/Index.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/tacticInfo/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/tacticInfo/Edit.vue')
                    }
                ]
            },
            {
                path: 'tactic',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/tactic/Index.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/tactic/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/tactic/Edit.vue')
                    }
                ]
            },
            {
                path: 'skillInfo',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/skillInfo/Index.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/skillInfo/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/skillInfo/Edit.vue')
                    }
                ]
            },
            {
                path: 'skill',
                component: Parent,
                children: [
                    {
                        path: '/',
                        component: require('./views/dashboard/skill/Index.vue')
                    },
                    {
                        path: 'create',
                        component: require('./views/dashboard/skill/Create.vue')
                    },
                    {
                        path: ':id/edit',
                        component: require('./views/dashboard/skill/Edit.vue')
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