<template>
	<el-row class="app">
		<Sidebar :navItems="nav" :sidebarOpen="sidebarOpen">
			<span slot="logo" class="logo"><img src="/img/logo.png"></span>
			<span slot="company" class="company">Realtor CRM</span>
		</Sidebar>
		<div class="canvas">
			<AppHeader :sidebarOpen="sidebarOpen" v-on:toggleSidebar="toggleSidebar"/>
			<div class="content">
				<router-view></router-view>
			</div>
		</div>
	</el-row>
</template>

<script>
	import AppHeader from '../components/AppHeader.vue';
	import Sidebar from '../components/Sidebar.vue';
	import nav from '../_sidebarNav.js';

    export default {
    	name: 'app',
    	components: {
    		AppHeader,
    		Sidebar,
    	},

    	data () {
    		return {
      			nav: nav.items,
      			sidebarOpen: true,
   			}
 		},

 		methods: {
 			toggleSidebar: function() {
 				this.sidebarOpen = !this.sidebarOpen;
 			}
 		}
    }
</script>

<style lang="scss">

</style>
