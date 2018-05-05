<template>
    <div class="filter-row">
        <div class="filter-option">
             <label for="contactTypeFilter">Contact Type </label>
            <contactTypeDropDown v-model="filters.contactType" />
        </div>
    </div>
</template>

<script>
    import ContactTypeDropDown from './ContactTypeDropDown.vue';

    export default {
        name: 'contactListFilters',

    	components: {
    		ContactTypeDropDown
    	},

    	data() {
    		return {
                filters: {
                    contactType: 'A'
                }
    		}
        },

        watch: {
            filters: {
                handler(filters){
                    this.$emit('filtersChange', this.filters);
                },
                deep: true
            }
        },
    }
</script>

<style>

</style>
