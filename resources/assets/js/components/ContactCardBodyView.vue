<template>
	<ContactCardShell :cardSubTitle="cardSubTitle">
		<div slot="card-body" class="card-slot-body add-contact">
			<form id="contact-form" class="form-fill">
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
												v-model="contact.fname">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10" class="is-required">Last Name</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="lname" 
												v-model="contact.lname">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Mobile Phone</el-col>
									<el-col :span="14">
										<el-input type="text"
												name="mphone" 
												v-model="contact.mphone">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Home Phone</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="hphone" 
												v-model="contact.hphone">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Alt Phone</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="aphone" 
												v-model="contact.aphone">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Email</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="email" 
												v-model="contact.email">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Company</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="company" 
												v-model="contact.company">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Title</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="title" 
												v-model="contact.title">
										</el-input>
									</el-col>
								</el-row>
							</el-col>
							<el-col :span="12">
								<h4 class="section-heading">Address</h4>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Address 1</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="address1" 
												v-model="contact.address1">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Address 2</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="address2" 
												v-model="contact.address2">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">City</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="city" 
												v-model="contact.city">	
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Province/State</el-col>
									<el-col :span="14">

									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Country</el-col>
									<el-col :span="14">

									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Postal/Zip</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="postal" 
												v-model="contact.postal">
										</el-input>
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

									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Motivation</el-col>
									<el-col :span="14">

									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Start Date</el-col>
									<el-col :span="14">
										<el-date-picker
											v-model="contact.sdate"
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
											v-model="contact.edate"
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
												v-model="contact.refby">
										</el-input>
									</el-col>
								</el-row>
								<h4 class="section-heading-middle">Contact Method</h4>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Best Method</el-col>
									<el-col :span="14">

									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Best Time</el-col>
									<el-col :span="14">

									</el-col>
								</el-row>
							</el-col>
							<el-col :span="12">
								<h4 class="section-heading">Requests</h4>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Home Type</el-col>
									<el-col :span="14">

									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Home Age</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="homeage" 
												v-model="contact.homeage">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Square Feet</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="feet" 
												v-model="contact.feet">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Bedrooms</el-col>
									<el-col :span="14"><el-input-number v-model="contact.bedrooms" name="bedrooms" :min="0"></el-input-number></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Bathrooms</el-col>
									<el-col :span="14"><el-input-number v-model="contact.bathrooms" name="bathrooms" :min="0"></el-input-number></el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Location</el-col>
									<el-col :span="14">
										<el-input type="text" 
												name="location" 
												v-model="contact.location">
										</el-input>
									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="10">Features</el-col>
									<el-col :span="14">

									</el-col>
								</el-row>
								<el-row type="flex" justify="center" align="middle" class="form-row">
									<el-col :span="7">Max Price</el-col>
									<el-col :span="9" class="margin-right">
										<el-input type="text" 
												name="maxprice" 
												v-model="contact.maxprice"">
												<i slot="prefix" class="el-input__icon fas fa-dollar-sign"></i>
										</el-input>
									</el-col>
									<el-col :span="8">
										<el-checkbox v-model="contact.preapprove" name="preapprove" true-label="Y" false-label="N">Pre Appr.</el-checkbox>
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
						  v-model="contact.notes"
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

	export default {
    	name: 'contactCardBodyView',
    	components: {
    		ContactCardShell,
    	},

    	data() {
    		return {
    			contact: {},
    			cardSubTitle: 'View Contact',
    		}
    	},

    	methods: {
    		
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