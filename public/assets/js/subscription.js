$(document).ready(function() {
				$('#subscriptionsform').bootstrapValidator({
					fields: {
						end_date: {
							validators: {
								notEmpty: {
									message: 'The end date is required and can\'t be empty'
								}
							}
						},
						date: {
							  validators: {
								  notEmpty: {
									message: 'The Expiry Date is required and can\'t be empty'
								}
							}
						},
						number: {
							  validators: {
								  notEmpty: {
									message: 'The Credit Card Number is required and can\'t be empty'
								}
							}
						},
					}
				});
			});