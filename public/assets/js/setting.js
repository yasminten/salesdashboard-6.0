$(document).ready(function() {
				$('#settingsform').bootstrapValidator({
					fields: {
						primary_contact: {
							validators: {
								regexp: {
									regexp: /^[0-9\.]+$/,
									message: 'The input is not a valid number'
								},
								stringLength: {
			                        max: 15,
			                        message: 'It must be less than 15 characters'
			                    }
							}
						}
					}
				});
			});