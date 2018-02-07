/**
 * JavaScript for the main login page.
 */

'use strict';

var realtorcrm.mainlogin = {};

realtorcrm.mainlogin.init = function()
{
    //Initialize the inputs to see if any hold values to start
    $('input.input-material').each(function(){
    	if($(this).val())
    	{
    		$(this).siblings('.label-material').addClass('active');
    	}
    });

    // Main event handlers
    $('input.input-material').on('focus', function () {
        $(this).siblings('.label-material').addClass('active');
    });

    $('input.input-material').on('blur', function () { 
        if(!$(this).val())
        {
        	$(this).siblings('.label-material').removeClass('active');
        }
    });

    // Start validation
	$("#login-form").validate({
		rules: {
			username: {
				required: true,
			},
			password: {
				required: true,
				minlength: 6,
			}
		},
		messages: {
			username: {
				required: 'Username is required',
			},
			password: {
				required: 'Password is required',
				minlength: jQuery.validator.format('At least {0} characters required')
			}
		}
	});
}

$(document).ready(realtorcrm.mainlogin.init);
