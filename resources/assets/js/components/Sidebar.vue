<template>
	<el-menu default-active="2" class="sidebar" :collapse="sidebarClosed">
		<div class="brand">
  			<slot name="logo"></slot>
			<slot name="company"></slot>
	  	</div>
		<div class="search-icon">
  			<i class="fas fa-search"></i>
		</div>
	  	<SidebarSearch />
  		<el-menu-item class="nav-item" v-for="(item, index) in navItems" :key="index" :index="index.toString()">
    		<i :class="item.icon"></i>
    		<span slot="title">
	
					{{item.name}}

			</span>
  		</el-menu-item>
	</el-menu>
</template>

<script>
	import SidebarSearch from '../components/SidebarSearch.vue';
	import SidebarNavLink from '../components/SidebarNavLink.vue';

    export default {
    	name: 'sidebar',
    	data () {
    		return {
    			open: 'sidebar-open',
    			closed: 'sidebar-closed'
    		}
    	},
    	components:{
    		SidebarSearch,
    		SidebarNavLink,
    	},
    	props: {
			navItems: {
			    type: Array,
			    required: true,
			    default: () => []
			},
			sidebarClosed: {
			    type: Boolean,
			    required: true,
			    default: false
			}
		},
    }
</script>