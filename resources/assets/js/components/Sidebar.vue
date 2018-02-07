<template>
	<div class="sidebar" :class="[sidebarOpen ? open : closed]">
	  	<nav class="sidebar-nav">
	  		<div class="brand">
	  			<slot name="logo"></slot>
	  			<slot name="company"></slot>
	  		</div>
	  		<div class="search-icon">
	  			<i class="fas fa-search"></i>
	  		</div>
	  	  	<SidebarSearch />
	     	<ul class="nav">
	     		<li class="nav-item" v-for="(item, index) in navItems">
                    <SidebarNavLink :name="item.name" :url="item.url" :icon="item.icon" />
                </li>
	      	</ul>
	    </nav>
	</div>
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
			sidebarOpen: {
			    type: Boolean,
			    required: true,
			    default: true
			}
		},
    }
</script>