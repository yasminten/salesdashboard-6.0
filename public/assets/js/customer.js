var startDateValidators = {
			            row: '.plan-start-date',
			            validators: {
			                notEmpty: {
			                    message: 'The start date is required'
			                }
			            }
			        };

	$('#customersform').bootstrapValidator({
		fields: {
			customer_type: {
				validators: {
					notEmpty: {
						message: 'Customer Type is required, please pick one'
					}
				}
			},
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
			status: {
				validators: {
					notEmpty: {
						message: 'The status is required and can\'t be empty'
					}
				}
			},
			urban: {
				validators: {
					notEmpty: {
						message: 'Urban is required and can\'t be empty'
					}
				}
			},
			city: {
				validators: {
					notEmpty: {
						message: 'City is required and can\'t be empty'
					}
				}
			},
			sub_district: {
				validators: {
					notEmpty: {
						message: 'Sub-District is required and can\'t be empty'
					}
				}
			},
			province: {
				validators: {
					notEmpty: {
						message: 'Province is required and can\'t be empty'
					}
				}
			},
			zip_code: {
				validators: {
					notEmpty: {
						message: 'ZIP Code is required and can\'t be empty'
					}
				}
			},
			ID_no: {
				validators: {
					notEmpty: {
						message: 'ID # is required and can\'t be empty'
					}, stringLength: {
						min:16,
						max:16,
						message: 'ID # must be 16 characters'
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
			// 'plan[0].start_date' : startDateValidators								          
		}
	});
	

