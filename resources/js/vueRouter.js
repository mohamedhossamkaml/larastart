import Dashboard from './components/Dashboard'
import Home from './components/Home'
import Profile from './components/Profile'
import Users from './components/Users'

export default [
    {
        path: '/dashboard',
        component:Dashboard,
        name: 'dashboard',
    },
    {
        path:'/',
        component:Home,
        name: 'home',
    },
    {
        path:'/profile',
        component:Profile,
        name: 'profile',
    },
    {
        path:'/users',
        component:Users,
        name: 'users',
    },

]
