<template>
	<ContactCardShell :cardSubTitle="cardSubTitle">
		<div slot="card-body" class=" contact-listing">
			<el-row type="flex" class="card-body-controls">
                <el-col :span="24">
                    These are the controls
                </el-col>
            </el-row>
            <el-row type="flex" class="list-container">
                <ContactListingRow v-for="(contactRowSet, index) in contacts" :key="index" :contactRowSet="contactRowSet"></ContactListingRow>
            </el-row>
		</div>
	</ContactCardShell>
</template>

<script>
	import ContactCardShell from '../containers/ContactCardShell.vue';
    import ContactListingRow from './ContactListingRow.vue';

	export default {
    	name: 'contactCardBodylist',

    	components: {
    		ContactCardShell,
            ContactListingRow,
    	},

    	data() {
    		return {
    			cardSubTitle: '',
                contacts: [],
    		}
    	},

        mounted: function() {
            axios.get(`/contacts`)
            .then(response => {
                // Array of contacts is returned. Chunk the array into arrays of four.
                this.contacts = this.chunkArray(response.data, 4);
            });
        },

        methods: {
            chunkArray: function(arr, len) {
                let chunks = [];
                let start = 0;
                let length= arr.length;

                while (start < length) {
                    chunks.push(arr.slice(start, start += len));
                }

                return chunks;
            },
        },
    }
</script>