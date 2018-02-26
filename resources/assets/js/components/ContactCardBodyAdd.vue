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
									<el-col :span="10" class="is-required">First Name</el-col>
									<el-col :span="14" >
										<el-input type="text" 
												name="fname" 
												v-model="formData.fname" 
												:class="{'has-error': formErrors.fname.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.fname.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.fname.errors">{{ error }}</p>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10" class="is-required">Last Name</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="lname" 
												v-model="formData.lname"
												:class="{'has-error': formErrors.lname.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.lname.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.lname.errors">{{ error }}</p>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Mobile Phone</el-col>
									<el-col :span="14">
										<el-input type="text"
												name="mphone" 
												v-model="formData.mphone"
												:class="{'has-error': formErrors.mphone.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.mphone.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.mphone.errors">{{ error }}</p>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Home Phone</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="hphone" 
												v-model="formData.hphone"
												:class="{'has-error': formErrors.hphone.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.hphone.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.fname.errors">{{ error }}</p>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Alt Phone</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="aphone" 
												v-model="formData.aphone"
												:class="{'has-error': formErrors.aphone.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.aphone.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.aphone.errors">{{ error }}</p>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Email</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="email" 
												v-model="formData.email"
												:class="{'has-error': formErrors.email.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.email.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.email.errors">{{ error }}</p>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Company</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="company" 
												v-model="formData.company"
												:class="{'has-error': formErrors.company.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.company.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.company.errors">{{ error }}</p>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Title</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="title" 
												v-model="formData.title"
												:class="{'has-error': formErrors.title.hasError}">
										</el-input>
									</el-col>
								</el-row>
							</el-col>
							<el-row :class="{'error': formErrors.title.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.title.errors">{{ error }}</p>
									</el-col>
								</el-row>
							<el-col :span="12">
								<h4 class="section-heading">Address</h4>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Address 1</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="address1" 
												v-model="formData.address1"
												:class="{'has-error': formErrors.address1.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.address1.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.address1.errors">{{ error }}</p>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Address 2</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="address2" 
												v-model="formData.address2"
												:class="{'has-error': formErrors.address2.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.address2.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.address2.errors">{{ error }}</p>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">City</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="city" 
												v-model="formData.city"
												:class="{'has-error': formErrors.city.hasError}">	
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.city.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.city.errors">{{ error }}</p>
									</el-col>
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
									<el-col :span="14">
										<el-input type="text" 
												name="postal" 
												v-model="formData.postal"
												:class="{'has-error': formErrors.postal.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.postal.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.postal.errors">{{ error }}</p>
									</el-col>
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
								      		name="sdate"
								      		value-format="yyyy-MM-dd">
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
								      		name="edate"
								      		value-format="yyyy-MM-dd">
								   	 	</el-date-picker>
								   	</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Referred By</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="refby" 
												v-model="formData.refby"
												:class="{'has-error': formErrors.refby.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.refby.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.refby.errors">{{ error }}</p>
									</el-col>
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
									<el-col :span="14">
										<el-input type="text" 
												name="homeage" 
												v-model="formData.homeage">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Square Feet</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="feet" 
												v-model="formData.feet"
												:class="{'has-error': formErrors.feet.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.feet.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.feet.errors">{{ error }}</p>
									</el-col>
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
									<el-col :span="14">
										<el-input type="text" 
												name="location" 
												v-model="formData.location"
												:class="{'has-error': formErrors.location.hasError}">
										</el-input>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.location.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.location.errors">{{ error }}</p>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Features</el-col>
									<el-col :span="14">
										<FeaturesDropDown v-model="formData.features"></FeaturesDropDown>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="7">Max Price</el-col>
									<el-col :span="9" class="margin-right">
										<el-input type="text" 
												name="maxprice" 
												v-model="formData.maxprice"
												:class="{'has-error': formErrors.maxprice.hasError}">
												<i slot="prefix" class="el-input__icon fas fa-dollar-sign"></i>
										</el-input>
									</el-col>
									<el-col :span="8">
										<el-checkbox v-model="formData.preapprove" name="preapprove" true-label="Y" false-label="N">Pre Appr.</el-checkbox>
									</el-col>
								</el-row>
								<el-row :class="{'error': formErrors.maxprice.hasError}" class="error-row">
									<el-col :offset="10" :span="14" class="errors">
										<p v-for="(error, index) in formErrors.maxprice.errors">{{ error }}</p>
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
						  class="contact-notes"
						  :class="{'has-error': formErrors.notes.hasError}">
						</el-input>
						<el-button native-type="submit" form="contact-form" class="main-card-btn contact-add-btn">Save</el-button>
					</el-col>
				</el-row>
				<el-row :class="{'error': formErrors.notes.hasError}" class="error-row">
					<el-col :offset="10" :span="14" class="errors">
						<p v-for="(error, index) in formErrors.notes.errors">{{ error }}</p>
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

	    		formErrors: {
	    			fname: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			lname: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			mphone: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			hphone: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			aphone: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			email: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			company: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			title: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			address1: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			address2: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			city: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			postal: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			refby: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			feet: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			location: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			maxprice: {
	    				hasError: false,
	    				errors: [],
	    			},
	    			notes: {
	    				hasError: false,
	    				errors: [],
	    			},
	    		},

    			cardSubTitle: 'Add New',
    		}
    	},

    	methods: {
    		contactFormSubmit: function() {
				axios.post('/contact/add', this.formData)
				.then((response) => {
					if(response.data.success)
					{
						this.$router.push({name: 'contacts'}, this.openAddSuccessMessage);
					}
				})
				.catch((response) => {
   					if(!response.response.data.success)
   					{
  						this.handleErrors(response.response.data.errors);
   					}
  				});
    		},

    		handleErrors: function(errors) {
    			for(let input in errors)
    			{
    				this.formErrors[input].hasError = true;

    				for(let errorNumber in errors[input])
    				{
    					let singleError =  errors[input][errorNumber];
    					this.formErrors[input].errors[errorNumber] = singleError;
    				}
    			}
    		},

    		openAddSuccessMessage: function() {
   				this.$message({
		        	message: 'Contact has been succesfully added.',
		        	type: 'success',
		        	duration: 3000,
		        	customClass: 'success-notification',
		        });
    		}
    	},
    }
</script>