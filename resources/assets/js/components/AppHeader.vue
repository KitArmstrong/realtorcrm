<template>
	<header class="header-container">
		<el-row>
			<el-col :span="10" class="left-menu">
				<span class="sidebar-toggle" @click="toggleSidebar">
					<i class="fa fa-lg"  :class="[sidebarClosed ? openIcon : closeIcon]"></i>
				</span>
			</el-col>
			<el-col :span="10" class="right-menu pull-right">
				<span class="user">
					{{ displayname }}
				</span>
				<el-tooltip effect="dark" content="Log out" placement="top">
					<span class="logout" @click="logout()">
						<i class="fas fa-sign-out-alt"></i>
					</span>
				</el-tooltip>
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
			sidebarClosed: {
			    type: Boolean,
			    required: true,
			    default: false
			}
		},

    	methods: {
		    getDisplayname: function () {
		     	axios.get(`/user`)
			    .then(response => {
			    	// JSON responses are automatically parsed.
			    	this.displayname = response.data.firstname + ' ' + response.data.lastname;
			    });
		    },
		    toggleSidebar: function () {
		    	this.$emit('toggleSidebar');
			},
			logout: function() {
				axios.post('/logout')
				.then(response => {
					if(response.status === 200)
					{
						window.location.replace('/');
					}
				});
			}
		},

		created() {
			this.getDisplayname();
		},
    }
</script>
