import Dashboard from './components/Dashboard.vue';
import Profile from './components/Profile.vue';
import Users from './components/Users.vue';
import Developer from './components/Developer.vue';
import Error404 from './components/Error404.vue';
import Chat from './components/chat/Main.vue';

export const routes = [
	{ path:'/', component: Dashboard },
	{ path:'/profile', component: Profile },
	{ path:'/users', component: Users },
	{ path:'/developer', component: Developer },
	{ path:'/chat', component: Chat },
	{ path:'*', component: Error404 },

]