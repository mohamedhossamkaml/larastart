import Home from './components/Home'
import Dashboard from './components/Dashboard'
import Developer from './components/Developer'
import Profile from './components/Profile'
import Users from './components/Users'
import NotFound from './components/NotFound'

export default [
    {
        path:'/home',
        component:Home,
        name: 'home',
    },
    {
        path: '/dashboard',
        component:Dashboard,
        name: 'dashboard',
    },
    {
        path: '/developer',
        component:Developer,
        name: 'developer',
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
    {
        path:'*',
        component:NotFound,
        name: 'notfound',
    },

]
