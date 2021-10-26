$(document).ready(function() {
				$('#refForm').bootstrapValidator({
					fields: {
						referral_code: {
							validators: {
								notEmpty: {
									message: 'The referral code is required and can\'t be empty'
								},
								stringLength: {
			                        max: 15,
			                        message: 'It must be less than 15 characters'
			                    }
							}
						},
						referral_for: {
							validators: {
								notEmpty: {
									message: 'The name is required and can\'t be empty'
								}
							}
						},
						datepicker:{
							validators: {
								notEmpty: {
									message: 'The start date is required and can\'t be empty'
								},
							}
						},
						end_date:{
							validators: {
								notEmpty: {
									message: 'The end date are required and can\'t be empty'
								},
							}
						},
						description:{
							validators: {
								notEmpty: {
									message: 'The description are required and can\'t be empty'
								},
							}
						},
					
				}
			});
	});

