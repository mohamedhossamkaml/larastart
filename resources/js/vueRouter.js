import Dashboard from './components/Dashboard'
import Profile from './components/Profile' 
import Home from './components/Home' 

export default [
    {
        path: '/dashboard',
        component:Dashboard,
        name: 'dashboard'
    },
    {
        path:'/profile',
        component:Profile,
        name: 'profile'
    },
    {
        path:'/',
        component:Home,
        name: 'home'
    },

]
