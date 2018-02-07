<template>
	<header class="header-container">
		<el-row>
			<el-col :span="10" class="left-menu">
				<span class="sidebar-toggle" @click="toggleSidebar">
					<i class="fa fa-lg"  v-bind:class="[sidebarOpen ? closeIcon : openIcon]"></i>
				</span>
			</el-col>
			<el-col :span="10" class="right-menu pull-right">
				<span class="user">
					{{ displayname }}
				</span>
			</el-col>
		</el-row>
	</header>
</template>

<script>
    export default {
    	data() {
    		return {
    			displayname: '',
    			openIcon: 'fa-chevron-right',
    			closeIcon: 'fa-chevron-left'
    		}
    	},

    	props: {
			sidebarOpen: {
			    type: Boolean,
			    required: true,
			    default: true
			}
		},

    	methods: {
		    getDisplayname: function () {
		     	axios.get(`/user`)
			    .then(response => {
			    	// JSON responses are automatically parsed.
			    	this.displayname = response.data.firstname + ' ' + response.data.lastname;
			    })
		    },
		    toggleSidebar: function () {
		    	this.$emit('toggleSidebar');
		    }
		},

		created() {
			this.getDisplayname();
		},
    }
</script>
