<!-- This is the main application componenet -->

<template>
	<el-row class="app">
		<Sidebar :navItems="nav" :sidebarClosed="sidebarClosed">
			<span slot="logo" class="logo"><img src="/img/logo.png"></span>
			<span slot="company" class="company">Realtor CRM</span>
		</Sidebar>
		<div class="canvas">
			<AppHeader :sidebarClosed="sidebarClosed" v-on:toggleSidebar="toggleSidebar"/>
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
	import GoogleMapsLoader from 'google-maps';

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
      			sidebarClosed: false,
   			}
 		},

 		mounted: function () {
			window.addEventListener('resize', this.resizeSidebar);
			this.resizeSidebar();

			// set the default router page.
			this.$router.push({name: 'dashboard'});
		},

		beforeDestroy: function () {
			window.removeEventListener('resize', this.resizeSidebar);
		},

 		methods: {
			// Opens and collapses the sidebar navigation.
 			toggleSidebar: function() {
 				this.sidebarClosed = !this.sidebarClosed;
			 },
			
			// Automatically collapses the sidebar depending on the size of the browser window.
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
 					this.sidebarClosed = true;
 				}
 				else
 				{
 					this.sidebarClosed = false;
 				}
 			}
 		}
    }
</script>

<style lang="scss">

</style>
