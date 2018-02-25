<template>
	<ContactCardShell :cardSubTitle="cardSubTitle">
		<div slot="card-body" class="card-slot-body add-contact">
			<form id="contact-form" class="form-fill" @submit.prevent="contactFormSubmit">
				<el-row :gutter="20">
					<el-col :lg="12" class="main-card-left">
						<el-row>
							<el-col :span="12" class="padding-right">
								<h4 class="section-heading">Details</h4>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">First Name</el-col>
									<el-col :span="14"><el-input type="text" name="fname" v-model="formData.fname"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Last Name</el-col>
									<el-col :span="14"><el-input type="text" name="lname" v-model="formData.lname"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Mobile Phone</el-col>
									<el-col :span="14"><el-input type="text" name="mphone" v-model="formData.mphone"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Home Phone</el-col>
									<el-col :span="14"><el-input type="text" name="hphone" v-model="formData.hphone"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Alt Phone</el-col>
									<el-col :span="14"><el-input type="text" name="aphone" v-model="formData.aphone"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Email</el-col>
									<el-col :span="14"><el-input type="text" name="email" v-model="formData.email"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Company</el-col>
									<el-col :span="14"><el-input type="text" name="company" v-model="formData.company"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Title</el-col>
									<el-col :span="14"><el-input type="text" name="title" v-model="formData.title"></el-input></el-col>
								</el-row>
							</el-col>
							<el-col :span="12">
								<h4 class="section-heading">Address</h4>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Address 1</el-col>
									<el-col :span="14"><el-input type="text" name="address1" v-model="formData.address1"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Address 2</el-col>
									<el-col :span="14"><el-input type="text" name="address2" v-model="formData.address2"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">City</el-col>
									<el-col :span="14"><el-input type="text" name="city" v-model="formData.city"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Province/State</el-col>
									<el-col :span="14">
										<ProvStateDropDown v-model="formData.prov" :country="formData.country"></ProvStateDropDown>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Country</el-col>
									<el-col :span="14">
										<CountryDropDown v-model="formData.country"></CountryDropDown>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Postal/Zip</el-col>
									<el-col :span="14"><el-input type="text" name="postal" v-model="formData.postal"></el-input></el-col>
								</el-row>
							</el-col>
						</el-row>
					</el-col>
					<el-col :lg="12">
						<el-row>
							<el-col :span="12" class="padding-right">
								<h4 class="section-heading">Status</h4>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Status</el-col>
									<el-col :span="14">
										<StatusDropDown v-model="formData.status"></StatusDropDown>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Motivation</el-col>
									<el-col :span="14">
										<MotivationDropDown v-model="formData.motivation"></MotivationDropDown>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Start Date</el-col>
									<el-col :span="14">
										<el-date-picker
											v-model="formData.sdate"
								      		type="date"
								      		class="form-date-picker"
								      		placeholder="Start Date"
								      		name="sdate">
								   	 	</el-date-picker>
								   	</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">End Date</el-col>
									<el-col :span="14">
										<el-date-picker
											v-model="formData.edate"
								      		type="date"
								      		class="form-date-picker"
								      		placeholder="End Date"
								      		name="edate">
								   	 	</el-date-picker>
								   	</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Referred By</el-col>
									<el-col :span="14"><el-input type="text" name="refby" v-model="formData.refby"></el-input></el-col>
								</el-row>
								<h4 class="section-heading-middle">Contact Method</h4>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Best Method</el-col>
									<el-col :span="14">
										<BestMethodDropDown v-model="formData.conmethod"></BestMethodDropDown>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Best Time</el-col>
									<el-col :span="14">
										<BestTimeDropDown v-model="formData.contime"></BestTimeDropDown>
									</el-col>
								</el-row>
							</el-col>
							<el-col :span="12">
								<h4 class="section-heading">Requests</h4>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Home Type</el-col>
									<el-col :span="14">
										<HomeTypeDropDown v-model="formData.hometype"></HomeTypeDropDown>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Home Age</el-col>
									<el-col :span="14"><el-input type="text" name="homeage" v-model="formData.homeage"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Square Feet</el-col>
									<el-col :span="14"><el-input type="text" name="feet" v-model="formData.feet"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Bedrooms</el-col>
									<el-col :span="14"><el-input-number v-model="formData.bedrooms" name="bedrooms" :min="0"></el-input-number></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Bathrooms</el-col>
									<el-col :span="14"><el-input-number v-model="formData.bathrooms" name="bathrooms" :min="0"></el-input-number></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Location</el-col>
									<el-col :span="14"><el-input type="text" name="location" v-model="formData.location"></el-input></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Features</el-col>
									<el-col :span="14">
										<FeaturesDropDown v-model="formData.features"></FeaturesDropDown>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="7">Max Price</el-col>
									<el-col :span="9" class="margin-right"><el-input type="text" name="maxprice" v-model="formData.maxprice"></el-input></el-col>
									<el-col :span="8">
										<el-checkbox v-model="formData.preapprove" name="preapprove" true-label="Y" false-label="N">Pre Appr.</el-checkbox>
									</el-col>
								</el-row>
							</el-col>
						</el-row>
					</el-col>	
				</el-row>
				<el-row class="form-footer">
					<el-col class="relative">
						<h4 class="section-heading-middle">Notes</h4>
						<el-input
						  type="textarea"
						  name="notes"
						  v-model="formData.notes"
						  :rows="5"
						  placeholder="Contact Notes"
						  :maxlength="1000"
						  class="contact-notes">
						</el-input>
						<el-button native-type="submit" form="contact-form" class="main-card-btn contact-add-btn">Save</el-button>
					</el-col>
				</el-row>
			</form>
		</div>
	</ContactCardShell>
</template>

<script>
	import ContactCardShell from '../containers/ContactCardShell.vue';
	import StatusDropDown from './StatusDropDown.vue';
	import MotivationDropDown from './MotivationDropDown.vue';
	import BestMethodDropDown from './BestMethodDropDown.vue';
	import BestTimeDropDown from './BestTimeDropDown.vue';
	import HomeTypeDropDown from './HomeTypeDropDown.vue';
	import FeaturesDropDown from './FeaturesDropDown.vue';
	import CountryDropDown from './CountryDropDown.vue';
	import ProvStateDropDown from './ProvStateDropDown.vue';


	export default {
    	name: 'contactCardBodyAdd',
    	components: {
    		ContactCardShell,
    		StatusDropDown,
    		MotivationDropDown,
    		BestMethodDropDown,
    		BestTimeDropDown,
    		HomeTypeDropDown,
    		FeaturesDropDown,
    		CountryDropDown,
    		ProvStateDropDown,
    	},

    	data() {
    		return {
    			formData: {
	    			fname: '',
	    			lname: '',
	    			mphone: '',
	    			hphone: '',
	    			aphone: '',
	    			email: '',
	    			company: '',
	    			title: '',
	    			address1: '',
	    			address2: '',
	    			city: '',
	    			prov: '',
	    			country: '',
	    			postal: '',
	    			status: '',
	    			motivation: '',
	    			sdate: '',
	    			edate: '',
	    			refby: '',
	    			conmethod: '',
	    			contime: '',
	    			hometype: '',
	    			homeage: '',
	    			feet: '',
	    			bedrooms: '',
	    			bathrooms: '',
	    			location: '',
	    			features: [],
	    			maxprice: '',
	    			preapprove: '',
	    			notes: '',
	    		},
    			cardSubTitle: 'Add New',
    		}
    	},

    	methods: {
    		contactFormSubmit: function() {
				axios.post('/contact/add', this.formData)
				.then(function (response) {
				  		console.log(response);
				})
				.catch(function (error) {
   						console.log(error);
  				});
    		}
    	},
    }
</script>