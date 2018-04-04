<template>
	<ContactCardShell :cardSubTitle="cardSubTitle">
		<div slot="card-body" class="card-slot-body view-contact">
			<el-row class="view-header">
				<el-col :span="24" class="d-flex d-just-space-between">
					<h3 class="contact-name">{{fullName}} <span class="contact-status">{{contactStatus}}</span></h3>
                    <div class="header-buttons">
                        <el-button class="view-back-button header-btn" @click="previousPage"><i class="fas fa-undo-alt"></i> Back</el-button>
                        <el-dropdown class="header-btn" trigger="click">
                            <el-button class="dropdown-btn"><i class="fas fa-bars"></i>&nbsp;<i class="fas fa-caret-down"></i></el-button>
                            <el-dropdown-menu slot="dropdown">
                                <el-dropdown-item>Edit Contact</el-dropdown-item>
                                <el-dropdown-item>Delete Contact</el-dropdown-item>
                            </el-dropdown-menu>
                        </el-dropdown>
                    </div>
				</el-col>
			</el-row>
			<el-row :gutter="20" class="view-body-container">
				<el-col :lg="16" class="main-card-left">
					<el-row>
						<el-col :md="10" class="padding-right">
							<el-row type="flex" justify="center" class="view-row">
								<el-col :span="10" class="label">Mobile</el-col>
								<el-col :span="14" class="value">{{formatPhone(contact.mobile_phone)}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row" v-if="contact.home_phone">
								<el-col :span="10" class="label">Home</el-col>
								<el-col :span="14" class="value">{{formatPhone(contact.home_phone)}}</el-col>
							</el-row>
							<el-row type="flex" justify="center" class="view-row" v-if="contact.alt_phone">
								<el-col :span="10" class="label">Alternate</el-col>
								<el-col :span="14" class="value">{{formatPhone(contact.alt_phone)}}</el-col>
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
							<BuyerRequestPanel v-if="contact.buy_request_id && !contact.sell_request_id" :contact="contact"></BuyerRequestPanel>
							<SellerRequestPanel v-if="contact.sell_request_id && !contact.buy_request_id" :contact="contact"></SellerRequestPanel>
						</el-col>
					</el-row>
				</el-col>	
			</el-row>
			<el-row class="form-footer d-flex d-grow">
				<el-col class="d-flex d-column">
					<el-tabs type="border-card" class="d-grow d-flex d-column tab">
						<el-tab-pane label="Notes">
							<ContactNotesTable :contactId="contactId" />
						</el-tab-pane>
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
	import buyerMotivationOptions from '../data/_buyerMotivationOptions.js';
    import sellerMotivationOptions from '../data/_sellerMotivationOptions.js';
	import bestMethodOptions from '../data/_bestMethodOptions.js';
	import bestTimeOptions from '../data/_bestTimeOptions.js';
	import countryOptions from '../data/_countries.js';
	import provinceOptions from '../data/_provinces.js';
	import GoogleMapsLoader from 'google-maps';
	import ContactNotesTable from './ContactNotesTable.vue';

	export default {
    	name: 'contactCardBodyView',
    	components: {
    		ContactCardShell,
    		BuyerRequestPanel,
    		SellerRequestPanel,
			ContactNotesTable
    	},

    	data() {
    		return {
				contactId: '',
    			contact: {},
    			cardSubTitle: 'View Contact',
    			statusOptions: statusOptions.options,
    			motivationOptions: {},
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
    				if(this.contact.buy_motive)
    				{
    					statusTitle += ' - ' + this.getDropdownText(this.contact.buy_motive, this.motivationOptions);
    				}
    			}

    			if(this.contact.sell_request_id)
    			{
    				if(statusTitle)
    				{
    					statusTitle += ', ';
    				}
    				statusTitle += 'Seller';

    				if(this.contact.sell_motive)
    				{
    					statusTitle += ' - ' + this.getDropdownText(this.contact.sell_motive, this.motivationOptions);
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


			    // Select the textarea.
			  	ta.select();
			  	// Copy and then remove element.
			  	document.execCommand('copy');
			  	document.body.removeChild(ta);
    		},
    		loadMap: function() {
    			// Set up map dialog.
	           	GoogleMapsLoader.LIBRARIES = ['geometry', 'places'];
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
            formatPhone: function(phone) {
                if(phone)
                {
                    if(phone.length === 10)
                    {
                        return phone.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
                    }
                    else if(phone.length === 11)
                    {
                        return phone.replace(/(\d{1})(\d{3})(\d{3})(\d{4})/, "$1-$2-$3-$4");
                    }
                    else
                    {
                        return phone;
                    }
                }
            },
            previousPage: function() {
                this.$router.go(-1);
            },
    	},

    	created: function() {
    		this.contactId = this.$route.params.id;

    		axios.get(`/contact/` + this.contactId)
            .then(response => {
                this.contact = response.data;

                if(this.contact.buy_request_id)
                {
                    this.motivationOptions = buyerMotivationOptions.options;
                }
                else if(this.contact.sell_request_id)
                {
                    this.motivationOptions = sellerMotivationOptions.options;
                }
            });
    	},
    }
</script>