import Dashboard from './views/Dashboard.vue'
import Parent from './views/Parent.vue'

export default {
    path: '/dashboard',
    component: Dashboard,
    beforeEnter: requireAuth,
    children: [
        {
            path: '/',
            component: require('./views/Dashboard/DancerType.vue')
        }
    ],
}