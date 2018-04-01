<template>
	<ContactCardShell :cardSubTitle="cardSubTitle">
		<div slot="card-body" class="card-slot-body add-contact">
			<el-form id="contact-form" :model="formData" ref="contactForm" :rules="rules" class="form-fill" label-width="140px" label-position="left">
				<el-row :gutter="20">
					<el-col :lg="12" class="main-card-left">
						<el-row>
							<el-col :span="12" class="padding-right">
								<h4 class="section-heading">Details</h4>
								<el-form-item label="First Name" required prop="fname">
							    	<el-input type="text" 
											name="fname" 
											v-model="formData.fname" 
											:class="{'has-error': formErrors.fname.hasError}"
											:maxlength="255">
									</el-input>
									<el-row :class="{'error': formErrors.fname.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.fname.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
								<el-form-item label="Last Name" required prop="lname">
									<el-input type="text" 
											name="lname" 
											v-model="formData.lname"
											:class="{'has-error': formErrors.lname.hasError}"
											:maxlength="255">
									</el-input>
									<el-row :class="{'error': formErrors.lname.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.lname.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
								<el-form-item label="Mobile Phone">
									<el-input type="text"
										name="mphone" 
										v-model="formData.mphone"
										:class="{'has-error': formErrors.mphone.hasError}"
										:maxlength="15">
									</el-input>
									<el-row :class="{'error': formErrors.mphone.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.mphone.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
								<el-form-item label="Home Phone">
									<el-input type="text" 
										name="hphone" 
										v-model="formData.hphone"
										:class="{'has-error': formErrors.hphone.hasError}"
										::maxlength="15">
									</el-input>
									<el-row :class="{'error': formErrors.hphone.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.fname.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
								<el-form-item label="Alt Phone">
									<el-input type="text" 
										name="aphone" 
										v-model="formData.aphone"
										:class="{'has-error': formErrors.aphone.hasError}"
										::maxlength="15">
									</el-input>
									<el-row :class="{'error': formErrors.aphone.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.aphone.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
								<el-form-item label="Email">
									<el-input type="text" 
										name="email" 
										v-model="formData.email"
										:class="{'has-error': formErrors.email.hasError}"
										:maxlength="255">
									</el-input>
									<el-row :class="{'error': formErrors.email.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.email.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
								<el-form-item label="Company">
									<el-input type="text" 
										name="company" 
										v-model="formData.company"
										:class="{'has-error': formErrors.company.hasError}"
										:maxlength="255">
									</el-input>
									<el-row :class="{'error': formErrors.company.hasError}" class="error-row">
										<el-col  :span="14" class="errors">
											<p v-for="(error, index) in formErrors.company.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
								<el-form-item label="Title">
									<el-input type="text" 
											name="title" 
											v-model="formData.title"
											:class="{'has-error': formErrors.title.hasError}"
											:maxlength="255">
									</el-input>
									<el-row :class="{'error': formErrors.title.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.title.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
							</el-col>
							<el-col :span="12">
								<h4 class="section-heading">Address</h4>
								<el-form-item label="Address 1">
									<el-input type="text"
										@focus="geolocate()" 
										placeholder=""
										id="address1"
										name="address1" 
										v-model="formData.address1"
										:class="{'has-error': formErrors.address1.hasError}"
										:maxlength="255">
									</el-input>
									<el-row :class="{'error': formErrors.address1.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.address1.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
								<el-form-item label="Address 2">
									<el-input type="text" 
										name="address2" 
										v-model="formData.address2"
										:class="{'has-error': formErrors.address2.hasError}"
										:maxlength="255">
									</el-input>
									<el-row :class="{'error': formErrors.address2.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.address2.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
								<el-form-item label="City">
									<el-input type="text" 
										name="city" 
										v-model="formData.city"
										:class="{'has-error': formErrors.city.hasError}"
										:maxlength="255">	
									</el-input>
									<el-row :class="{'error': formErrors.city.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.city.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
								<el-form-item label="Province/State">
									<ProvStateDropDown v-model="formData.prov" :country="formData.country"></ProvStateDropDown>
								</el-form-item>
								<el-form-item label="Country">
									<CountryDropDown v-model="formData.country"></CountryDropDown>
								</el-form-item>
								<el-form-item label="Postal/Zip">
									<el-input type="text" 
										name="postal" 
										v-model="formData.postal"
										:class="{'has-error': formErrors.postal.hasError}"
										:maxlength="10">
									</el-input>
									<el-row :class="{'error': formErrors.postal.hasError}" class="error-row">
										<el-col :span="14" class="errors">
											<p v-for="(error, index) in formErrors.postal.errors">{{ error }}</p>
										</el-col>
									</el-row>	
								</el-form-item>
							</el-col>
						</el-row>
					</el-col>
					<el-col :lg="12">
						<el-row>
							<el-col :span="12" class="padding-right">
								<h4 class="section-heading">Status</h4>
								<el-form-item label="Status">
									<StatusDropDown v-model="formData.status"></StatusDropDown>
								</el-form-item>
								<el-form-item label="Motivation">
									<MotivationDropDown v-model="formData.motivation" :status="formData.status"></MotivationDropDown>
								</el-form-item>
								<el-form-item label="Start Date">
									<el-date-picker
										v-model="formData.sdate"
								      	type="date"
								      	class="form-date-picker"
								      	placeholder="Start Date"
								    	name="sdate"
								   		value-format="yyyy-MM-dd">
								 	</el-date-picker>
								</el-form-item>
								<el-form-item label="End Date">
									<el-date-picker
										v-model="formData.edate"
							      		type="date"
							      		class="form-date-picker"
							     		placeholder="End Date"
								   		name="edate"
							     		value-format="yyyy-MM-dd">
								   	 </el-date-picker>
								</el-form-item>
								<h4 class="section-heading-middle">Contact Method</h4>
								<el-form-item label="Best Method">
									<BestMethodDropDown v-model="formData.conmethod"></BestMethodDropDown>
								</el-form-item>
								<el-form-item label="Best Time">
									<BestTimeDropDown v-model="formData.contime"></BestTimeDropDown>
								</el-form-item>
								<el-form-item label="Referred By">
									<el-input type="text" 
										name="refby" 
										v-model="formData.refby"
										:class="{'has-error': formErrors.refby.hasError}"
										:maxlength="255">
									</el-input>
									<el-row :class="{'error': formErrors.refby.hasError}" class="error-row">
										<el-col  :span="14" class="errors">
											<p v-for="(error, index) in formErrors.refby.errors">{{ error }}</p>
										</el-col>
									</el-row>
								</el-form-item>
							</el-col>
							<el-col :span="12">
								<h4 class="section-heading">Requests</h4>
								<div class="empty-request" v-show="!formData.status">
									<el-row type="flex" justify="center" class="view-row">
							            <el-col :span="24" class="label">Select a Status to see the available options</el-col>
							        </el-row>
								</div>
								<div class="buyer-request" v-show="formData.status === 'B'">
							        <el-form-item label="Home Type">
							            <HomeTypeDropDown v-model="formData.hometype"></HomeTypeDropDown>
							        </el-form-item>
							        <el-form-item label="Home Age">
							            <HomeAgeDropDown v-model="formData.homeage"></HomeAgeDropDown>						           
							        </el-form-item>
							        <el-form-item label="Square Feet">
							            <el-input type="text" 
							                name="feet" 
							                v-model="formData.feet"
							                :class="{'has-error': formErrors.feet.hasError}">
							            </el-input>
							            <el-row :class="{'error': formErrors.feet.hasError}" class="error-row">
							                <el-col :span="14" class="errors">
							                    <p v-for="(error, index) in formErrors.feet.errors">{{ error }}</p>
							                </el-col>
							            </el-row>
							        </el-form-item>
							        <el-form-item label="Bedrooms">
							            <el-input-number v-model="formData.bedrooms" name="bedrooms" :min="0"></el-input-number>
							        </el-form-item>
							        <el-form-item label="Bathrooms">
							            <el-input-number v-model="formData.bathrooms" name="bathrooms" :min="0"></el-input-number>
							        </el-form-item>
							        <el-form-item label="Location">
							            <el-input type="text" 
							                name="location" 
							                v-model="formData.location"
							                :class="{'has-error': formErrors.location.hasError}">
							            </el-input>
							            <el-row :class="{'error': formErrors.location.hasError}" class="error-row">
							                <el-col :span="14" class="errors">
							                    <p v-for="(error, index) in formErrors.location.errors">{{ error }}</p>
							                </el-col>
							            </el-row>
							        </el-form-item>
							        <el-form-item label="Features">
							            <FeaturesDropDown v-model="formData.features"></FeaturesDropDown>
							        </el-form-item>
							        <el-form-item label="Max Price">
							            <el-row>
							                <el-col :span="14">
							                    <el-input type="text" 
							                        name="maxprice" 
							                        v-model="formData.maxprice"
							                        :class="{'has-error': formErrors.maxprice.hasError}">
							                        <i slot="prefix" class="el-input__icon fas fa-dollar-sign"></i>
							                    </el-input>
							                </el-col>
							                <el-col :span="10" class="preapprove">
							                    <el-checkbox v-model="formData.preapprove" name="preapprove" true-label="Y" false-label="N">Pre Appr.</el-checkbox>
							                </el-col>
							            </el-row>
							        </el-form-item>
								</div>
								<div class="seller-request" v-show="formData.status === 'S'">
							        <el-form-item label="Minimum Price">
							            <el-input type="text" 
							                name="minprice" 
							                v-model="formData.minprice"
							                :class="{'has-error': formErrors.minprice.hasError}">
							                <i slot="prefix" class="el-input__icon fas fa-dollar-sign"></i>
							            </el-input>
							        </el-form-item>
								</div>
							</el-col>
						</el-row>
					</el-col>	
				</el-row>
				<el-row type="flex" class="form-footer d-shrink">
					<el-col :xs="24" :sm="24" :md="16" class="">
						<h4 class="section-heading-middle">Notes</h4>
						<el-input
						  type="textarea"
						  name="notes"
						  v-model="formData.notes"
						  :rows="7"
						  placeholder="Contact Notes"
						  :maxlength="1000"
						  class="contact-notes"
						  :class="{'has-error': formErrors.notes.hasError}">
						</el-input>
					</el-col>
					<el-col :xs="24" :sm="24" :md="8" class="d-flex d-just-end">
						<el-row type="flex" :gutter="10" class="d-align-end">
							<el-button @click="previousPage">Cancel</el-button>
							<el-button native-type="button" form="contact-form" @click.prevent="submitContactForm()" class="main-card-btn">Save</el-button>
						</el-row>
					</el-col>
				</el-row>
				<el-row :class="{'error': formErrors.notes.hasError}" class="error-row">
					<el-col  :span="14" class="errors">
						<p v-for="(error, index) in formErrors.notes.errors">{{ error }}</p>
					</el-col>
				</el-row>
			</el-form>
		</div>
	</ContactCardShell>
</template>

<script>
	import ContactCardShell from '../containers/ContactCardShell.vue';
	import StatusDropDown from './StatusDropDown.vue';
	import MotivationDropDown from './MotivationDropDown.vue';
	import BestMethodDropDown from './BestMethodDropDown.vue';
	import BestTimeDropDown from './BestTimeDropDown.vue';
	import CountryDropDown from './CountryDropDown.vue';
	import ProvStateDropDown from './ProvStateDropDown.vue';
	import HomeTypeDropDown from './HomeTypeDropDown.vue';
    import FeaturesDropDown from './FeaturesDropDown.vue';
    import HomeAgeDropDown from './HomeAgeDropDown.vue';
    import GoogleMapsLoader from 'google-maps';
    import CountryOptions from '../data/_countries.js';
    import ProvinceOptions from '../data/_provinces.js';
    import StateOptions from '../data/_states.js';

	export default {
    	name: 'contactCardBodyAdd',
    	components: {
    		ContactCardShell,
    		StatusDropDown,
    		MotivationDropDown,
    		BestMethodDropDown,
    		BestTimeDropDown,
    		CountryDropDown,
    		ProvStateDropDown,
    		HomeTypeDropDown,
            FeaturesDropDown,
            HomeAgeDropDown,
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
	    			minprice: '',
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
	    			minprice: {
	    				hasError: false,
	    				errors: [],
	    			}
	    		},

	    		rules: {
		        	fname: [
		        		{required: true, message: 'First name is required', trigger: 'blur'}
		          	],
		          	lname: [
		            	{required: true, message: 'Last name is required', trigger: 'blur'}
		            ],
		        },

    			cardSubTitle: 'Add New',
    			placeSearch: '',
    			autocomplete: '',
    			stateOptions: StateOptions.options,
    			provinceOptions: ProvinceOptions.options,
    			countryOptions: CountryOptions.options,

    			addressForm: {
    			 	street_number: 'short_name',
			        route: 'long_name',
			        locality: 'long_name',
			        administrative_area_level_1: 'short_name',
			        country: 'short_name',
			        postal_code: 'short_name'
    			}
    		}
    	},

    	methods: {
    		submitContactForm: function() {
    			this.$refs['contactForm'].validate((valid) => {
         			if (valid) 
         			{
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
          			}
          			else 
          			{
    					return false;
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
    		},
            previousPage: function() {
                this.$router.go(-1);
            },
            initAutocomplete: function() {
	            GoogleMapsLoader.load(google => {
	 				this.autocomplete = new google.maps.places.Autocomplete(
	 					document.getElementById('address1'),
	 					{types: ['geocode']}
	 				);

	 				this.autocomplete.addListener('place_changed', this.fillInAddress);
				});
            },
            geolocate: function() {
                if (navigator.geolocation) 
                {
		          	navigator.geolocation.getCurrentPosition(function(position) {
		            	let geolocation = {
		              		lat: position.coords.latitude,
		              		lng: position.coords.longitude
		            	};
		            	let circle = new google.maps.Circle({
		              		center: geolocation,
		             		radius: position.coords.accuracy
		            	});
		            	this.autocomplete.setBounds(circle.getBounds());
		          	});
		        }
            },
            fillInAddress: function() {
            	let place = this.autocomplete.getPlace();

            	this.formData.address1 = '';

            	for(let i = 0; i < place.address_components.length; i++)
            	{
            		let addressType = place.address_components[i].types[0];
            		if(this.addressForm[addressType])
            		{
            			switch(addressType)
            			{
            				case 'street_number':
            					this.formData.address1 = place.address_components[i][this.addressForm[addressType]] + this.formData.address1;
            					break;

            				case 'route':
            					this.formData.address1 = this.formData.address1 + ' ' + place.address_components[i][this.addressForm[addressType]];
            					break;

            				case 'locality':
            					this.formData.city = place.address_components[i][this.addressForm[addressType]];
            					break;

            				case 'administrative_area_level_1':
            					this.formData.prov = place.address_components[i][this.addressForm[addressType]];
            					break;

            				case 'country':
            					this.formData.country = place.address_components[i][this.addressForm[addressType]];
            					break;

            				case 'postal_code':
            					this.formData.postal = place.address_components[i][this.addressForm[addressType]];
            					break;
            			}
            		}
            	}

            	// Must format the select elements after setting the values.
            	this.updateAddressSelects();
            },
            updateAddressSelects: function() {
            	// Must update the country first to set the province or state options.
            	document.getElementById('country').value = this.getDropdownText(this.formData.country, this.countryOptions);

            	document.getElementById('prov').value = this,getDropdownText(this.formData.prov, this.provinceOptions);
            },
            getDropdownText: function(code, options) {
    			if(!code)
    			{
    				return;
    			}

    			for(let option in options)
    			{
    				if(options[option].value === code)
    				{
    					return options[option].text;
    				}
    			}
    		},
    	},

    	created: function() {
    		this.initAutocomplete();
    	}
    }
</script>