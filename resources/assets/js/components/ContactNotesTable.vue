<template>
  <el-table
    :data="notes"
    height="100%"
    :highlight-current-row="false">
    <el-table-column
        prop="date"
        label="Date"
        width="130">
    </el-table-column>
    <el-table-column
        prop="note"
        label="Comment">
    </el-table-column>
  </el-table>

</template>

<script>
    export default {
    	data() {
    		return {
                notes: [],
    		}
    	},

    	props: {
			contactId: {
			    type: Number,
			    required: true,
			}
		},

        methods: {
        	getContactNotes: function(contactId) {
				axios.get('/notes', {
					params: {
						contactid: contactId
					}
				})
				.then(response => {
					this.notes = response.data;
				});
			}
        },

		created: function() {
            this.getContactNotes(this.contactId);
        }
    }
</script>
