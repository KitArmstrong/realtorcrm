<template>
	<ContactCardShell :cardSubTitle="cardSubTitle">
		<div slot="card-body">
			testing listing program
		</div>
	</ContactCardShell>
</template>

<script>
	import ContactCardShell from '../containers/ContactCardShell.vue';

	export default {
    	name: 'contactCardBodylist',
    	components: {
    		ContactCardShell,
    	},

    	data() {
    		return {
    			cardSubTitle: '',
    		}
    	},
    }
</script>