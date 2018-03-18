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
	import nav from '../data/_sidebarNav.js';
	
	const BREAKPOINT = 1000;

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

 		mounted: function () {
			window.addEventListener('resize', this.resizeSidebar);
			this.resizeSidebar();
		},

		beforeDestroy: function () {
			window.removeEventListener('resize', this.resizeSidebar);
		},

 		methods: {
 			toggleSidebar: function() {
 				this.sidebarOpen = !this.sidebarOpen;
 			},
 			resizeSidebar: function(event) {
 				let width;
 				if(event)
 				{
 					width = event.target.outerWidth;
 				}
 				else
 				{
 					width = window.innerWidth;
 				}

 				if(width < BREAKPOINT)
 				{
 					this.sidebarOpen = false;
 				}
 				else
 				{
 					this.sidebarOpen = true;
 				}
 			}
 		}
    }
</script>

<style lang="scss">

</style>
