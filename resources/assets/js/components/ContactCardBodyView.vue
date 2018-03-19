<template>
	<ContactCardShell :cardSubTitle="cardSubTitle">
		<div slot="card-body" class="card-slot-body view-contact">
			<el-row class="view-header">
				<el-col :span="24">
					<h3 class="contact-name">{{fullName}} <span class="contact-status">{{contactStatus}}</span></h3>
				</el-col>
			</el-row>
			<el-row :gutter="20" class="view-body-container">
				<el-col :lg="16" class="main-card-left">
					<el-row>
						<el-col :md="10" class="padding-right">
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Mobile</el-col>
								<el-col :span="14" class="value">{{contact.mobile_phone}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row" v-if="contact.home_phone">
								<el-col :span="10" class="label">Home</el-col>
								<el-col :span="14" class="value">{{contact.home_phone}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row" v-if="contact.alt_phone">
								<el-col :span="10" class="label">Alternate</el-col>
								<el-col :span="14" class="value">{{contact.alt_phone}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Email</el-col>
								<el-col :span="14" class="value wrap"><a :href="contactMailUrl">{{contact.email}}</a></el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Company</el-col>
								<el-col :span="14" class="value wrap">{{contact.company}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Title</el-col>
								<el-col :span="14" class="value wrap">{{contact.title}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Best Method</el-col>
								<el-col :span="14" class="value">{{getDropdownText(contact.contact_method, bestMethodOptions)}}</el-col>
							</el-row>
							<el-row type="flex" justify="center"  class="view-row">
								<el-col :span="10" class="label">Best Time</el-col>
								<el-col :span="14" class="value">{{getDropdownText(contact.contact_time, bestTimeOptions)}}</el-col>
							</el-row>
							<el-row class="view-row" v-if="contact.reffered_by">
								<el-col :span="10" class="label">Referred By</el-col>
								<el-col :span="14" class="value">{{contact.referred_by}}</el-col>
							</el-row>
						</el-col>
						<el-col :md="14">
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Address 1</el-col>
								<el-col :span="14" class="value">{{contact.address1}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Address 2</el-col>
								<el-col :span="14" class="value">{{contact.address2}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">City</el-col>
								<el-col :span="14" class="value">{{contact.city}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Province/State</el-col>
								<el-col :span="14" class="value">{{getDropdownText(contact.state_province, provinceOptions)}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Country</el-col>
								<el-col :span="14" class="value">{{getDropdownText(contact.country, countryOptions)}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Postal/Zip</el-col>
								<el-col :span="14" class="value">{{contact.zip_postal}}</el-col>
							</el-row>
							<el-row type="flex" class="view-row address-buttons">
								<el-popover
									placement="top"
									trigger="click">
										<div>
											<div id="formattedAddress">{{formattedAddress}}</div>
											 <el-tooltip effect="dark" content="Click to copy" placement="top">
											 		<i class="fas fa-copy popover-icon" @click="copyAddress()"></i>
											 </el-tooltip>
										</div>
										<el-button id="format-address" slot="reference">Formatted Address</el-button>
								</el-popover>
								<el-button id="map-address" @click="openMapDialog()">Map Address</el-button>
							</el-row>
						</el-col>
					</el-row>
				</el-col>
				<el-col :lg="8" class="request-cards">
					<el-row>
						<el-col :span="24">
							<BuyerRequestPanel v-if="contact.buy_request_id" :contact="contact"></BuyerRequestPanel>
						</el-col>
					</el-row>
				</el-col>	
			</el-row>
			<el-row class="form-footer d-flex d-grow">
				<el-col class="d-flex d-column">
					<el-tabs type="border-card" class="d-grow tab">
						<el-tab-pane label="Notes"></el-tab-pane>
						<el-tab-pane label="Opportunities"></el-tab-pane>
						<el-tab-pane label="History"></el-tab-pane>
						<el-tab-pane label="Attachements"></el-tab-pane>
					</el-tabs>
				</el-col>
			</el-row>
			<el-dialog title="Address Map" class="addressDialog" :visible.sync="dialogMapVisible">
				<div id="addressMap" class="d-grow d-flex d-just-center d-align-center">
					<div class="dialogErrorMsg" v-if="mapDialogErrorDisplay">{{mapDialogError}}</div>
				</div>
			</el-dialog>
		</div>
	</ContactCardShell>
</template>

<script>
	import ContactCardShell from '../containers/ContactCardShell.vue';
	import BuyerRequestPanel from '../components/BuyerRequestPanel.vue';
	import SellerRequestPanel from '../components/SellerRequestPanel.vue';
	import BothRequestPanel from '../components/BothRequestPanel.vue';
	import statusOptions from '../data/_statusOptions.js';
	import motivationOptions from '../data/_motivationOptions.js';
	import bestMethodOptions from '../data/_bestMethodOptions.js';
	import bestTimeOptions from '../data/_bestTimeOptions.js';
	import countryOptions from '../data/_countries.js';
	import provinceOptions from '../data/_provinces.js';
	import GoogleMapsLoader from 'google-maps';

	export default {
    	name: 'contactCardBodyView',
    	components: {
    		ContactCardShell,
    		BuyerRequestPanel,
    	},

    	data() {
    		return {
    			contact: {},
    			cardSubTitle: 'View Contact',
    			statusOptions: statusOptions.options,
    			motivationOptions: motivationOptions.options,
    			bestMethodOptions: bestMethodOptions.options,
    			bestTimeOptions: bestTimeOptions.options,
    			provinceOptions: provinceOptions.options,
    			countryOptions: countryOptions.options,
    			dialogMapVisible: false,
    			mapDialogError: 'There was an error mapping the address. Ensure the contact has as many address details entered as possible.',
    			mapDialogErrorDisplay: false,
    		}
    	},

    	computed: {
    		fullName: function() {
    			return this.contact.firstname + ' ' + this.contact.lastname;
    		},
    		contactMailUrl: function() {
    			return 'mailto:' + this.contact.email;
    		},
    		contactStatus: function() {
    			let statusTitle = '';

    			if(this.contact.buy_request_id)
    			{
    				statusTitle += 'Buyer';
    				if(this.contact.motive)
    				{
    					statusTitle += ' - ' + this.getDropdownText(this.contact.motive, this.motivationOptions);
    				}
    			}

    			if(this.contact.sell_request_id)
    			{
    				if(statusTitle)
    				{
    					statusTitle += ', ';
    				}
    				statusTitle += 'Seller';

    				if(this.contact.sell_request_id)
    				{
    					statusTitle += ' - ' + this.getDropdwonText(this.contact.motive, this.motivationOptions);
    				}
    			}

    			return statusTitle;
    		},
    		formattedAddress: function() {
    			if(this.contact.address1 && this.contact.city)
    			{
    				let address = '';

    				if(this.contact.address1)
    				{
    					address += this.contact.address1;
    				}
    				if(this.contact.address2)
    				{
    					address += ', ' + this.contact.address2;
    				}

    				address += '\n';

    				if(this.contact.city)
    				{
    					address +=  this.contact.city;
    				}
    				if(this.contact.state_province)
    				{
    					address += ' ' + this.contact.state_province;
    				}
    				if(this.contact.country)
    				{
    					address += ' ' + this.contact.country;
    				}
    				if(this.contact.zip_postal)
    				{
    					address += ' ' + this.contact.zip_postal;
    				};

    				return address.trim();
    			}
    		},
    		geoAddress: function() {
    			if(this.contact.address1 && this.contact.city)
    			{
    				let address = '';

    				if(this.contact.address1)
    				{
    					address += this.contact.address1;
    				}
    				if(this.contact.address2)
    				{
    					address += ', ' + this.contact.address2;
    				}
    				if(this.contact.city)
    				{
    					address +=  this.contact.city;
    				}
    				if(this.contact.state_province)
    				{
    					address += ' ' + this.contact.state_province;
    				}
    				if(this.contact.country)
    				{
    					address += ' ' + this.contact.country;
    				}
    				if(this.contact.zip_postal)
    				{
    					address += ' ' + this.contact.zip_postal;
    				};

    				return address.trim();
    			}
    		}
    	},

    	methods: {
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

    		copyAddress: function() {
    			// Get the address and create a textarea element.
   			  	let addressText = document.getElementById('formattedAddress').innerHTML;
			  	let ta = document.createElement('textarea');
				
				ta.value = addressText;
			 	// Make it read only and hide it off the screen.
			 	ta.setAttribute('readonly', '');
			 	ta.style.position = 'absolute';                 
			  	ta.style.left = '-9999px';
			  	document.body.appendChild(ta);

			  	// Save any previously selected text a user might have.
			 	let selected =            
			    	document.getSelection().rangeCount > 0 
			      		? document.getSelection().getRangeAt(0)
			      		: false;

			    // Select the textarea.
			  	ta.select();
			  	// Copy and then remove element.
			  	document.execCommand('copy');
			  	document.body.removeChild(ta);

			  	// Restore previously selected text if any.
			  	if (selected) 
			  	{
			    	document.getSelection().removeAllRanges(); 
			    	document.getSelection().addRange(selected); 
			  	}
    		},

    		loadMap: function() {
    			var that = this;

    			// Set up map dialog.
	            GoogleMapsLoader.KEY = 'AIzaSyB1ktxO-hwgQeqrGN8Yiaey-tAf1Goin9Y';

	            GoogleMapsLoader.load(google => {
	            	var geocoder = new google.maps.Geocoder();

				    geocoder.geocode({'address': this.geoAddress}, (results, status) => {
      					if (status == 'OK') 
      					{
      						let mapOptions = {
	            				zoom: 17,
	            				center: results[0].geometry.location,
	            			}
	            		
      						let map = new google.maps.Map(document.getElementById('addressMap'), mapOptions);

        					let marker = new google.maps.Marker({
            					map: map,
           						position: results[0].geometry.location,
       						});
				   	 	} 
				    	else
				    	{
				    		this.mapDialogErrorDisplay = true;
				    	}
    				});
				});
    		},

    		openMapDialog: function() {
    			this.dialogErrorMsg = '';
    			this.loadMap();
    			this.dialogMapVisible = true;
    		},
    	},

    	created: function() {
    		let contactId = this.$route.params.id;

    		axios.get(`/contact/` + contactId)
            .then(response => {
                this.contact = response.data;
            });
    	},
    }
</script>