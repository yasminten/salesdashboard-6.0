var startDateValidators = {
			            row: '.plan-start-date',
			            validators: {
			                notEmpty: {
			                    message: 'The start date is required'
			                }
			            }
			        };

	$('#membersform').bootstrapValidator({
		fields: {
			member_code: {
				validators: {
					notEmpty: {
						message: 'The member code is required and can\'t be empty'
					}
				}
			},
			name: {
				validators: {
					notEmpty: {
						message: 'The name is required and can\'t be empty'
					},
					stringLength: {
                        max: 50,
                        message: 'It must be less than 50 characters'
                    }
				}
			},
			address: {
				validators: {
					notEmpty: {
						message: 'The address is required and can\'t be empty'
					},
					stringLength: {
                        max: 200,
                        message: 'It must be less than 200 characters'
                    }
				}
			},
			email: {
				validators: {
					notEmpty: {
						message: 'The email address is required and can\'t be empty'
					},
					emailAddress: {
						message: 'The input is not a valid email address'
					},
					stringLength: {
                        max: 50,
                        message: 'It must be less than 50 characters'
                    }
				}
			},
			DOB: {
				validators: {
					notEmpty: {
						message: 'The date of birth is required'
					},
					date: {
                        format: 'YYYY-MM-DD',
                        message: 'The date should be in YYYY-MM-DD format'
                    }
				}
			},
			status: {
				validators: {
					notEmpty: {
						message: 'The status is required and can\'t be empty'
					}
				}
			},
			
			proof_name: {
				validators: {
					notEmpty: {
						message: 'The ID Card # is required and can\'t be empty'
					},
					stringLength: {
                        max: 50,
                        message: 'It must be less than 50 characters'
                    }
				}
			},
			
			plan_id: {
				validators: {
					notEmpty: {
						message: 'The plan id is required and can\'t be empty'
					}
				}
			},
			pin_code: {
				validators: {
					notEmpty: {
						message: 'The ZIP Code is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid ZIP code'
					}
				}
			},
			
			
			source: {
				validators: {
					notEmpty: {
						message: 'The source is required and can\'t be empty'
					},
					stringLength: {
                        max: 50,
                        message: 'It must be less than 50 characters'
                    }
				}
			},
			invoice_number: {
				validators: {
					notEmpty: {
						message: 'The Invoice Number is required and can\'t be empty'
					}
				}
			},
			admission_amount: {
				validators: {
					notEmpty: {
						message: 'The admission amount is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid amount'
					}
				}
			},
			subscription_amount: {
				validators: {
					notEmpty: {
						message: 'The subscription amount is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid amount'
					}
				}
			},
			taxes_amount: {
				validators: {
					notEmpty: {
						message: 'The taxes amount is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid amount'
					}
				}
			},
			payment_amount: {
				validators: {
					notEmpty: {
						message: 'The amount is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid amount'
					}
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
			contact: {
				validators: {
					notEmpty: {
						message: 'The contact is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[0-9\.]+$/,
						message: 'The input is not a valid number'
					},
					stringLength: {
                        max: 15,
                        message: 'It must be less than 15 characters'
                    }
				}
			},
			'plan[0].start_date' : startDateValidators								          
		}
	});
	

