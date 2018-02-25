<template>
	<el-card class="main-card">
		<div slot="header" class="card-header">
			<h3 class="card-title">
				{{fullTitle}}
			</h3>
			<div class="top-options">
				<router-link to="/contacts/add">
					<el-button class="main-card-btn"><i class="fas fa-plus"></i> New</el-button>
				</router-link>
				<router-link to="/contacts">
					<el-button class="main-card-btn"><i class="fas fa-list"></i> List</el-button>
				</router-link>
			</div>
		</div>	
		<slot name="card-body"></slot>
	</el-card>
</template>

<script>
	export default {
    	name: 'contactCardShell',

    	data() {
    		return {
    			mainCardTitle: 'Contacts',
    		}
    	},

    	props: {
			cardSubTitle: {
			    type: String,
			    required: true,
			    default: ''
			}
		},

		computed: {
			fullTitle: function() {
				if(!this.cardSubTitle)
				{
					return this.mainCardTitle;
				}

				return this.mainCardTitle + ' - ' + this.cardSubTitle;
			},
		},
    }
</script>