<template>
	<ContactCardShell :cardSubTitle="cardSubTitle">
		<div slot="card-body" class=" contact-listing">
			<el-row type="flex" class="card-body-controls">
                <span class="filters">These are the controls</span>
                <span class="paging-links">
                    <el-pagination
                    layout="prev, pager, next"
                    :total="totalContacts"
                    :page-size="20"
                    @current-change="newPage">
                    </el-pagination>
                </span>
            </el-row>
            <el-row type="flex" class="list-container">
                <div class="no-contacts d-flex d-just-center d-align-center" v-if="totalContacts == 0">
                    <span>You have no contacts. Click "New" to begin entering one.</span>
                </div>
                <ContactListingRow v-else v-for="(contactRowSet, index) in contacts" :key="index" :contactRowSet="contactRowSet"></ContactListingRow>
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
                totalContacts: 0,
    		}
    	},

        mounted: function() {
            axios.get(`/contacts`)
            .then(response => {
                // Array of contacts is returned. Chunk the array into arrays of four.
                this.contacts = this.chunkArray(response.data.contacts, 4);
                this.totalContacts = response.data.total;
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

            newPage: function(newPage) {
                axios.get('/contacts', {
                    params: {
                        page: newPage
                    }
                })
                .then(response => {
                    // Array of contacts is returned. Chunk the array into arrays of four.
                    this.contacts = this.chunkArray(response.data.contacts, 4);
                    this.totalContacts = response.data.total;
                });
            }
        },
    }
</script>