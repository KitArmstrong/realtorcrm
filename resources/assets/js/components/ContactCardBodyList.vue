<template>
	<ContactCardShell :cardSubTitle="cardSubTitle">
		<div slot="card-body" class=" contact-listing">
			<el-row type="flex" class="card-body-controls">
                <ContactListFilters v-on:filtersChange="updateFilters"/>
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
                <div class="no-contacts d-flex d-just-center d-align-center" v-if="totalContacts === 0">
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
    import ContactListFilters from './ContactListFilters.vue';

	export default {
    	name: 'contactCardBodylist',

    	components: {
    		ContactCardShell,
            ContactListingRow,
            ContactListFilters
    	},

    	data() {
    		return {
    			cardSubTitle: '',
                contacts: [],
                totalContacts: 0,
                currentPage: 1,
                filters: {
                    contactType: ''
                }
    		}
    	},

        mounted: function() {
            this.getContacts(1);
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
                this.currentPage = newPage;
                this.getContacts(newPage);
            },
            
            getContacts: function(page) {
                page = page || 1;

                axios.get('/contacts', {
                    params: {
                        page: page,
                        filters: this.filters
                    }
                })
                .then(response => {
                    // Array of contacts is returned. Chunk the array into arrays of four.
                    this.contacts = this.chunkArray(response.data.contacts, 4);
                    this.totalContacts = response.data.total;
                });
            },

            updateFilters: function() {
                alert("TEST");
                this.getContacts(this.currentPage);
            }
        },
    }
</script>