$(document).ready(function() {
				$('#paymentsform').bootstrapValidator({
					fields: {
						payment_amount: {
							validators: {
								notEmpty: {
									message: 'The amount is required and can\'t be empty'
								},
							}
						},
						invoice_id: {
							  validators: {
								  notEmpty: {
									message: 'The Invoice Number is required and can\'t be empty'
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