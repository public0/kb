(function($) {
    "use strict";

	// ______________Cover Image
	$(".cover-image").each(function() {
		var attr = $(this).attr('data-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});

	$('.table-subheader').click(function(){
		$(this).nextUntil('tr.table-subheader').slideToggle(100);
	});

	// ______________ Horizonatl
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
      $("a[data-theme]").click(function() {
        $("head link#theme").attr("href", $(this).data("theme"));
        $(this).toggleClass('active').siblings().removeClass('active');
      });
      $("a[data-effect]").click(function() {
        $("head link#effect").attr("href", $(this).data("effect"));
        $(this).toggleClass('active').siblings().removeClass('active');
      });
    });


	// ______________Full screen
	$("#fullscreen-button").on("click", function toggleFullScreen() {
      if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
          document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
          document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    })

	// ______________Active Class
	$(document).ready(function() {
		// Add Trigger
		$('body').on('click', "button[data-toggle=modal][data-target='#add-trigger-modal']", function() {
			$('#triggers_table tbody').prepend(
				'<tr id="trigger_add">' +
				'<td id="trigger_id"><button class="btn btn-outline-success" type="button">New</button></td>'+
				'<td><input type="text" class="form-control" name="trigger_name" value=""></td>'+
				'<td><input type="text" class="form-control" name="trigger_desc" value=""></td>'+
				'<td id="trigger_type_add"></td>'+
				'<td id="trigger_calc_add"></td>'+
				'<td>' +
				'<select name="trigger_status" class="custom-select form-control">' +
				'<option value="0">Inactiv</option>'+
				'<option value="1">Activ</option>'+
				'</select>'+
				'</td>'+
				'<td>' +
				'<button type="button" class="btn btn-success add-trigger">\n' +
				'Save\n' +
				'</button>\n' +
				'<button type="button" class="btn btn-danger">\n' +
				'Delete\n' +
				'</button>\n' +
				'<button type="button" class="btn btn-info">\n' +
				'Params\n' +
				'</button>\n'+
				'</td>'+
				'</tr>'
			);

			$('#types_add').clone().appendTo($('#trigger_add').find('td[id=trigger_type_add]'));
			$('#calcs_add').clone().appendTo($('#trigger_add').find('td[id=trigger_calc_add]'));
		});

		$('body').on('click', '.add-trigger', function() {
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
			}

			let btn = $(this);
			let btn_id =$(this).parent().parent().find('#trigger_id');
			let inputs = $(this).parent().parent().find('input, select');
			let inputValues = [];
			inputs.each(function() {
				inputValues[$(this).attr('name')] = $(this).val();
			});
			if(!data_id) {
				$.post( "/ibd/ajax/addtrigger",
					{
						name : inputValues['trigger_name'],
						desc : inputValues['trigger_desc'],
						type : inputValues['trigger_type'],
						calculation : inputValues['trigger_calculation'],
						status: inputValues['trigger_status']
					}).done(function(msg) {
					btn.attr('data-id', msg.result.Id);
					btn_id.html(msg.result.Id);
				}).fail(function(xhr, status, error) {
					let message = JSON.parse(xhr.responseText);
				});
			} else {
				$.post( "/ibd/ajax/updatetrigger/"+data_id,
					{
						name : inputValues['trigger_name'],
						desc : inputValues['trigger_desc'],
						type : inputValues['trigger_type'],
						calculation : inputValues['trigger_calculation'],
						status: inputValues['trigger_status']
					}).done(function(msg) {
				}).fail(function(xhr, status, error) {
					let message = JSON.parse(xhr.responseText);
				});
			}

		});

		// Triggers Params
		$('body').on('click', "button[data-toggle=modal][data-target='#trigger-params-modal']", function() {
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
			}
			$('#activeTrigger').attr('data-value',  data_id);


			$.get( "/ibd/ajax/gettriggerparamsbytrigger/"+data_id, function( data ) {
				$("#trigger_params tbody").empty();
				$.each(data.typeParams, function(index, value) {
					$("#trigger_params tbody").append('<tr>'+
						'<td>'+value.Id+'</td>' +
						'<td>' +
						'<input type="hidden" name="triggerid" value="'+value.TriggerId+'">' +
						'<input type="text" class="form-control" name="typesqlexpression" disabled value="'+value.TypeId+'">' +
						'</td>' +
						'<td><input type="text" class="form-control" name="typesqlexpression" disabled value="('+value.ParameterId+')'+value.ParameterName+'"></td>'+
						'<td><input type="text" class="form-control" name="typesqlexpression" value="'+value.TypeSQLExpression+'"></td>'+
						'<td><input type="text" class="form-control" name="sqlexpression" value="'+value.SQLExpression+'"></td>'+
						'<td><input type="text" class="form-control" name="typesqlexpression" disabled value="('+value.OutputParameterId+')'+value.ParameterName+'"></td>'+
						'<td>'+
						'<button type="button" class="mx-2 my-2 btn btn-success btn-sm iu-trigger-param" data-id="'+value.Id+'">Save</button>'+
						'<button type="button" class="mx-2 my-2 btn btn-danger btn-sm">Delete</button>'+
						'</td>'+
						'</tr>');
				})
			});
		});

        $('#add-calculation').click(function(event) {
            event.stopPropagation();
			let calcTypes = $(".calc-type").map(function() {
				return `<option value="${this.value}">${this.value}</option>`;
			}).get().join();
            $("#calculations tbody").prepend('<tr>'+
                '<td>' +
                '<p id="calculation_id"><button class="btn btn-outline-success" type="button">New</button></p>'+
                '</td>' +
                '<td><textarea class="form-control" name="calc_name"></textarea></td>'+
                '<td><textarea class="form-control" name="calc_desc"></textarea></td>'+
                '<td>' +
                '<select class="custom-select form-control" name="calc_type">' +
				calcTypes +
                '</select>'+
                '</td>'+
                '<td><textarea class="form-control" name="calc_calc"></textarea></td>'+
                '<td>'+
                '<select class="custom-select form-control" name="calc_status">' +
                    '<option value="0">Inactive</option>' +
                    '<option value="1">Active</option>' +
                '</select>'+
                '</td>'+
                '<td>'+
                '<button type="button" class="mx-2 my-2 btn btn-success btn-sm iu-calculation">Save</button>'+
                '<button type="button" class="mx-2 my-2 btn btn-danger btn-sm">Delete</button><br/>'+
                '<button type="button" class="mx-2 my-2 btn btn-facebook btn-sm calc_inputs" data-toggle="modal" data-target="#calculations-inputs-modal" data-id="">Inputs</button>'+
                '<button type="button" class="mx-2 my-2 btn btn-info btn-sm calc_params" data-toggle="modal" data-target="#calculations-params-modal" data-id="">Params</button>'+
                '</td>'+
                '</tr>'
            );
        });

        $('body').on('click', '.calc-row-btn', async function () {
        	let id = $(this).parent().parent().attr('id');
        	let self = $(this).parent().parent();
        	$('#loader').remove();
			self.after('<tr id="loader"><td colspan="8" class="text-center">' +
				'<div style="margin: 0 auto;" class="tloader"></div>'+
				'</td></tr>');

        	$('.calc_info').empty().remove();
        	let str = '';
			await $.get( "/ibd/ajax/getcalculationinputtypes/"+id, function( data ) {
				str += '<tr class="calc_info"><td colspan="8"><b>Input Types</b>' +
					`<button type="button" class="float-right btn btn-success add-it" data-toggle="modal" data-target="#it-modal" data-id="${id}" >
							Add
						</button>` +
					'</td></tr>' +
						'<tr class="calc_info" style="border: #0a0c0d solid thick !important;">' +
						'<td><b>Id</b></td>' +
						'<td><b>Description</b></td>' +
						'<td><b>TypeId</b></td>' +
						'<td><b>TypesAlias</b></td>' +
						'<td><b>UpdateValues</b></td>' +
						'<td></td>' +
						'<td></td>' +
						'<td></td>' +
					'</tr>';
				data.typeParams.forEach(function(elem, index) {
					str +=
						`<tr class="calc_info" id="calc_iu_${id}"><td>${elem.Id}</td>` +
						`<td>${elem.Description}</td>` +
						`<td>${elem.TypeId}</td>` +
						`<td>${elem.TypeAlias}</td>` +
						`<td>${elem.UpdateValues}</td>` +
						'<td></td>' +
						'<td></td>' +
						'<td>' +
						`<button type="button" class="ml-2 btn btn-success update-it" data-toggle="modal" data-target="#it-modal" data-id="${elem.Id}" >
							Edit
						</button>` +
						`<button type="button" class="ml-2 btn btn-danger del-it" data-id="${elem.Id}" >
							Delete
						</button>` +
						'</td>' +
						'</tr>';
				});
			});
			await $.get( "/ibd/ajax/getcalculationcustomparams/"+id, function( data ) {
				str += '<tr class="calc_info"><td colspan="8"><b>Custom Params</b>' +
					`<button type="button" class="float-right btn btn-success add-cp" data-toggle="modal" data-target="#cp-modal" data-id="${id}" >
							Add
						</button>` +
					'</td></tr>' +
					'<tr class="calc_info" style="border: #0a0c0d solid thick !important;">' +
					'<td><b>Id</b></td>' +
					'<td><b>CalculationCustomParamType</b></td>' +
					'<td><b>ParameterId</b></td>' +
					'<td><b>ParameterName</b></td>' +
					'<td><b>SQLExpression</b></td>' +
					'<td><b>TypeIdInput</b></td>' +
					'<td></td>' +
					'<td></td>' +
					'</tr>';
				data.typeParams.forEach(function(elem, index) {
					str +=
						`<tr class="calc_info" id="calc_iu_${id}"><td>${elem.Id}</td>` +
						`<td>${elem.CalculationCustomParamType}</td>` +
						`<td>${elem.ParameterId}</td>` +
						`<td>${elem.ParameterName}</td>` +
						`<td>${elem.SQLExpression}</td>` +
						`<td>${elem.TypeIdInput}</td>` +
						'<td class="mx-auto">' +
						`<button type="button" class="btn btn-success update-cp" data-toggle="modal" data-target="#cp-modal" data-id="${elem.Id}" >
							Edit
						</button>` +
						`<button type="button" class="ml-2 btn btn-danger del-cp" data-id="${elem.Id}" >
							Delete
						</button>` +
						'</td>' +
						'<td></td>' +
						'</tr>';
				});
			});
			$('#loader').remove();
			self.after(str);

		});

        $('body').on('click', ".iu-calculation", function() {
            let data_id = null;
            if (typeof $(this).data('id') !== 'undefined') {
                data_id = $(this).data('id');
            }
            let inputs = $(this).parent().parent().find('textarea, input, select');
            let inputValues = [];
            let btn = $(this);
            let btn_id =$(this).parent().parent().find('#calculation_id');
            inputs.each(function() {
                if(!$(this).attr('disabled'))
                    inputValues[$(this).attr('name')] = $(this).val();
            });

            if(!data_id) {
                $.post( "/ibd/ajax/addcalculation",
                    {
                        name : inputValues['calc_name'],
                        desc : inputValues['calc_desc'],
                        outputType : $('#activeType').attr('data-value'),
                        type : inputValues['calc_type'],
                        calc : inputValues['calc_calc'],
                        status : inputValues['calc_status'],
                    }).done(function(msg) {
                    //param_id
                    btn.attr('data-id', msg.result.Id);
                    btn_id.html(msg.result.Id);
                    $('#calculation-alert').addClass('d-none');
                    $('#calculation-succes').removeClass('d-none').html('<p>Salvat</p>');

                }).fail(function(xhr, status, error) {
                    let message = JSON.parse(xhr.responseText);
                    $('#calculation-succes').empty().addClass('d-none');
                    $('#calculation-alert').empty().removeClass('d-none');
                    $.each(message.errors, function(index, value) {
                        $('#calculation-alert').append('<p>'+value+'</p>');
                    });
                });
            } else {
                $.post( "/ibd/ajax/updatecalculation/"+data_id,
                    {
                        name : inputValues['calc_name'],
                        desc : inputValues['calc_desc'],
                        outputType : $('#activeType').attr('data-value'),
                        type : inputValues['calc_type'],
                        calc : inputValues['calc_calc'],
                        status : inputValues['calc_status'],
                    }).done(function(msg) {
                    $('#calculation-alert').addClass('d-none');
                    $('#calculation-succes').removeClass('d-none').html('<p>Salvat</p>');
                }).fail(function(xhr, status, error) {
                    let message = JSON.parse(xhr.responseText);
                    $('#calculation-succes').empty().addClass('d-none');
                    $('#calculation-alert').empty().removeClass('d-none');
                    $.each(message.errors, function(index, value) {
                        $('#calculation-alert').append('<p>'+value+'</p>');
                    });
                });
            }
        });

		$('#add-trigger-param').click(function(event) {
			event.stopPropagation();
			$.get( "/ibd/ajax/gettypes", function( data ) {
				let typesOptions = '';
				let paramsOptions = '';
				$.each(data.typeParams, function(index, value) {
					typesOptions+='<option value="'+value.TypeId+'">('+value.TypeId+')'+value.TypeName+'</option>';
				});
				$.get( "/ibd/ajax/getparams", function( data ) {
					$.each(data.typeParams, function (index, value) {
						paramsOptions += '<option value="' + value.Id + '">(' + value.Id + ')' + value.Name + '</option>';
					});

					$("#trigger_params tbody").prepend(
						'<tr>'+
						'<td>' +
						'<input type="hidden" name="triggerid" value="'+$('#activeTrigger').attr('data-value')+'">' +
						'<p id="param_id"><button class="btn btn-outline-success" type="button">New</button></p>'+
						'</td>'+
						'<td>'+
						'<select class="custom-select form-control usedinput" name="type">' +
						typesOptions+
						'</select>'+
						'</td>'+
						'<td>' +
						'<select class="custom-select form-control usedinput" name="param">' +
						paramsOptions+
						'</select>'+
						'</td>'+
						'<td><input type="text" class="form-control" name="typesqlexpression" value=""></td>'+
						'<td><input type="text" class="form-control" name="sqlexpression" value=""</td>'+
						'<td>' +
						'<select class="custom-select form-control usedinput" name="outputparam">' +
						paramsOptions+
						'</select>'+
						'</td>'+
						'<td>'+
						'<button type="button" class="mx-2 my-2 btn btn-success btn-sm iu-trigger-param">Save</button>'+
						'<button type="button" class="mx-2 my-2 btn btn-danger btn-sm delete-row" data-id="100" data-type="inputtype">Delete</button><br/>'+
						'</td>'+
						'</tr>'
					);
				});
			});
		});

		$('body').on('click', ".iu-trigger-param", function() {
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
			}
			let inputs = $(this).parent().parent().find('input, select');
			let inputValues = [];
			let btn = $(this);
			let btn_id =$(this).parent().parent().find('#param_id');
			inputs.each(function() {
				if(!$(this).attr('disabled'))
					inputValues[$(this).attr('name')] = $(this).val();
			});
			if(!data_id) {
				$.post( "/ibd/ajax/addtriggerparam",
					{
						triggerId : inputValues['triggerid'],
						typeId : inputValues['type'],
						parameterId : inputValues['param'],
						typesqlexpression : inputValues['typesqlexpression'],
						sqlexpression : inputValues['sqlexpression'],
						outputparameterId: inputValues['outputparam']
					}).done(function(msg) {
						//param_id
					btn.attr('data-id', msg.result.Id);
					btn_id.html(msg.result.Id);
					$('#trigger-param-alert').addClass('d-none');
					$('#trigger-param').removeClass('d-none').html('<p>Salvat</p>');

				}).fail(function(xhr, status, error) {
					let message = JSON.parse(xhr.responseText);
					$('#trigger-param').empty().addClass('d-none');
					$('#trigger-param-alert').empty().removeClass('d-none');
					$.each(message.errors, function(index, value) {
						$('#trigger-param-alert').append('<p>'+value+'</p>');
					});
				});
			} else {
				$.post( "/ibd/ajax/updatetriggerparam/"+data_id,
					{
						triggerId : inputValues['triggerid'],
						typesqlexpression : inputValues['typesqlexpression'],
						sqlexpression : inputValues['sqlexpression'],
					}).done(function(msg) {
					$('#trigger-param-alert').addClass('d-none');
					$('#trigger-param').removeClass('d-none').html('<p>Salvat</p>');
				}).fail(function(xhr, status, error) {
					let message = JSON.parse(xhr.responseText);
					$('#trigger-param').empty().addClass('d-none');
					$('#trigger-param-alert').empty().removeClass('d-none');
					$.each(message.errors, function(index, value) {
						$('#trigger-param-alert').append('<p>'+value+'</p>');
					});
				});
			}
		});

		// Confgurator Params click
		$('body').on('click', "button[data-toggle=modal][data-target='#params-config-modal']", function() {
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
			}

			$.get( "/ibd/ajax/getparamsbytype/"+data_id, function( data ) {
				$("#params tbody").empty();
				$.each(data.typeParams, function(index, value) {
					$("#params tbody").append('<tr>'+
						'<td>'+value.ParameterId+'</td>' +
						'<td>'+value.ParameterName+'</td>'+
						'<td>'+'<button type="button" class="btn btn-danger btn-sm" >Delete</button>'+'</td>'+
						'</tr>');
				})
			});
		});

		// Confgurator Calculations click
		$('body').on('click', "button[data-toggle=modal][data-target='#calculations-config-modal']", function() {
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
                $('#activeType').attr('data-value',  data_id);
			}

			$.get( "/ibd/ajax/getcalculationbytype/"+data_id, function( data ) {
				$("#calculations tbody").empty();

				$.each(data.typeParams, function(index, value) {
					let selected = '';
					let calcTypes = $(".calc-type").map(function() {
						selected = (value.CalculationType === this.value)?'selected':'';
						return `<option value="${this.value}" ${selected}>${this.value}</option>`;
					}).get().join();

					let statusArray = [];
					statusArray[0] = (value.Activ === '0')?'selected':'';
					statusArray[1] = (value.Activ === '1')?'selected':'';
					$("#calculations tbody").append('<tr>'+
						'<td><br/><b>'+value.CalculationId+'</b></td>' +
						'<td><textarea class="form-control" name="calc_name">'+value.CalculationName+'</textarea></td>'+
						'<td><textarea class="form-control" name="calc_desc">'+value.Description+'</textarea></td>'+
						'<td>' +
						'<select class="custom-select form-control" name="calc_type">' +
						calcTypes +
						'</select>' +
						'</td>'+
						'<td><textarea class="form-control" name="calc_calc">'+value.Calculation+'</textarea></td>'+
						'<td>'+
						'<select class="custom-select form-control" name="calc_status">' +
							'<option value="0"'+statusArray[0]+'>Inactive</option>' +
							'<option value="1"'+statusArray[1]+'>Active</option>' +
						'</select>'+
						'</td>'+
						'<td>'+
						'<button type="button" class="mx-2 my-2 btn btn-success btn-sm iu-calculation" data-id="'+value.CalculationId+'">Save</button>'+
						'<button type="button" class="mx-2 my-2 btn btn-danger btn-sm" data-id="'+value.CalculationId+'">Delete</button><br/>'+
						'<button type="button" class="mx-2 my-2 btn btn-facebook btn-sm calc_inputs" data-toggle="modal" data-target="#calculations-inputs-modal" data-id="'+value.CalculationId+'">Inputs</button>'+
						'<button type="button" class="mx-2 my-2 btn btn-info btn-sm calc_params" data-toggle="modal" data-target="#calculations-params-modal" data-id="'+value.CalculationId+'">Params</button>'+
						'</td>'+
						'</tr>');
				})
			});


		});

		$('#add-input').click(function(event) {
			event.stopPropagation();
			$.get( "/ibd/ajax/gettypes", function( data ) {
				let typesArray = [];
				let typesOptions = '';
				$.each(data.typeParams, function(index, value) {
					typesOptions+='<option value="'+value.TypeId+'">('+value.TypeId+')'+value.TypeName+'</option>';
				});
				$("#calculation_inputs tbody").prepend(
					'<tr>'+
					'<td></td>'+
					'<td>'+
					'<select class="custom-select form-control usedinput" data-target="type">' +
					typesOptions+
					'</select>'+
					'</td>'+
					'<td><input type="text" class="form-control usedinput" data-target="alias" value=""></td>'+
					'<td><input type="text" class="form-control usedinput" data-target="updatevalues" value=""></td>'+
					'<td><input type="text" class="form-control usedinput" data-target="desc" value=""></td>'+
					'<td>'+
					'<button type="button" class="mx-2 my-2 btn btn-success btn-sm add-calc-input" data-target="">Save</button>'+
					'<button type="button" class="mx-2 my-2 btn btn-danger btn-sm delete-row" data-id="100" data-type="inputtype">Delete</button><br/>'+
					'</td>'+
					'</tr>'
				);
			});
		});

		$('body').on('click', 'button.add-calc-param', function() {
			let data = $(this).parent().parent().find('.usedinput');
			let dataValues = [];

			$.each(data, function(index, value) {
				dataValues[value.dataset.target] = value.value;
			});
			$.post( "/ibd/ajax/addcalculationparam",
				{
					calculation : $('#activeCalculation').attr('data-value'),
					type: dataValues['type'],
					typeId: dataValues['typeId'],
					param: dataValues['param'],
					expression: dataValues['expression']
				}).done(function(msg) {
				$('#param-alert').addClass('d-none');
				$('#calculations-params-modal').modal('hide')
			}).fail(function(xhr, status, error) {
				let message = JSON.parse(xhr.responseText);
				$('#param-alert').empty().removeClass('d-none');
				$.each(message.errors, function(index, value) {
					$('#param-alert').append('<p>'+value+'</p>');
				});
			});

		});


		$('body').on('click', 'button.add-calc-input', function() {
			let data = $(this).parent().parent().find('.usedinput');
			let dataValues = [];

			$.each(data, function(index, value) {
				dataValues[value.dataset.target] = value.value;
			});
			$.post( "/ibd/ajax/addcalculationinput",
				{
					calculation : $('#activeCalculation').attr('data-value'),
					type: dataValues['type'],
					alias: dataValues['alias'],
					updatevalues: dataValues['updatevalues'],
					desc: dataValues['desc']
			}).done(function(msg) {
				$('#input-type-alert').addClass('d-none');
				$('#calculations-inputs-modal').modal('hide')
			}).fail(function(xhr, status, error) {
				let message = JSON.parse(xhr.responseText);
				$('#input-type-alert').empty().removeClass('d-none');
				$.each(message.errors, function(index, value) {
					$('#input-type-alert').append('<p>'+value+'</p>');
				});
			});

		});


		$('body').on('click', 'button.delete-row', function() {
			let data_id = null;
			let data_type = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
				data_type = $(this).data('type');
			}
			$(this).parent().parent().remove();
		});

		// Configurator calculation input type
		$('body').on('click', 'button.calc_inputs', function() {
			$('#input-type-alert').addClass('d-none').empty();
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
				$('#activeCalculation').attr('data-value',  data_id);
			}
			$.get( "/ibd/ajax/getcalculationinputtypes/"+data_id, function( data ) {
				$("#calculation_inputs tbody").empty();
				$.each(data.typeParams, function(index, value) {
					$("#calculation_inputs tbody").append(
					'<tr>'+
						'<td>'+value.Id+'</td>'+
						'<td><input type="hidden" class="form-control" name="type" value="'+value.TypeId+'">'+value.TypeId+'</td>'+
						'<td><input type="text" class="form-control" name="alias" value="'+value.TypeAlias+'"></td>'+
						'<td><input type="text" class="form-control" name="updatevalues" value="'+value.UpdateValues+'"></td>'+
						'<td><input type="text" class="form-control" name="desc" value="'+value.Description+'"></td>'+
						'<td>'+
						'<button type="button" class="mx-2 my-2 btn btn-success btn-sm update-calc-input" data-id="'+value.Id+'">Save</button>'+
						'<button type="button" class="mx-2 my-2 btn btn-danger btn-sm" >Delete</button><br/>'+
						'</td>'+
					'</tr>'
					);
				});

			});
		});

		// Configurator calculation custom params
		$('body').on('click', 'button.del-cp', function() {
			let data_id = null;
			self = $(this);
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');

				$.ajax({
					url: '/ibd/ajax/calccp/'+data_id,
					type: 'DELETE',
					success: function(data) {
						self.parent().parent().remove();
					}
				});
			}
		});

		$('body').on('click', 'button.add-cp', function() {
			$('#param-alert').addClass('d-none');
			$('#param-info').addClass('d-none');
			$('#ccp-sql').val('');
			$('#ccp-sel').val($("#ccp-sel option:first").val());
			$('#ccp-params').val($("#ccp-params option:first").val());
			$('#ccp-it').val($("#ccp-it option:first").val());
			$('#ccp-id').val(0);

			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
				$('#activeCalculation').attr('data-value',  data_id);
			}
			$('#ccp-calc').val(data_id);

		});

		$('body').on('click', 'button.update-cp', function() {
			$('#param-alert').addClass('d-none');
			$('#param-info').addClass('d-none');
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
				$('#activeCalculation').attr('data-value',  data_id);
			}
			$.get( "/ibd/ajax/getcustomparams/"+data_id, function( data ) {
				$('#ccp-sel').val(data.typeParams[0].CalculationCustomParamType);
				$('#ccp-params').val(data.typeParams[0].ParameterId);
				$('#ccp-sql').val(data.typeParams[0].SQLExpression);
				$('#ccp-it').val(data.typeParams[0].TypeIdInput);
				$('#ccp-id').val(data.typeParams[0].Id);
				$('#ccp-calc').val(data.typeParams[0].CalculationId);
			});

		});

		$('body').on('click', 'button.iu-it', function() {

			let id = $('#it-id').val();
			let calc = $('#it-calc').val();
			let type = $('#it-type').val();
			let alias = $('#it-alias').val();
			let update = $('#it-update').val();
			let desc = $('#it-desc').val();
			$.post( "/ibd/ajax/updatecalculationinput/"+id,
				{
					calculation : calc,
					type: type,
					alias: alias,
					updatevalues: update,
					desc: desc
				}).done(function(msg) {
				$('#input-alert').addClass('d-none');
				$('#input-info').removeClass('d-none').html('<p>Salvat</p>');
				$('.calc_info').empty().remove();

//				$('#calculations-inputs-modal').modal('hide')
			}).fail(function(xhr, status, error) {
				let message = JSON.parse(xhr.responseText);
				$('#input-info').empty().addClass('d-none');
				$('#input-alert').empty().removeClass('d-none');
				$.each(message.errors, function(index, value) {
					$('#input-alert').append('<p>'+value+'</p>');
				});
			});

		});

		$('body').on('click', 'button.iu-ccp', function() {
			let type = $('#ccp-sel').val();
			let param = $('#ccp-params').val();
			let sql = $('#ccp-sql').val();
			let it = $('#ccp-it').val();
			let ccpId = $('#ccp-id').val();
			let ccpCalc = $('#ccp-calc').val();

			$.post( "/ibd/ajax/updatecalculationparam/"+ccpId,
				{
					calculation : ccpCalc,
					typeId : it,
					param : param,
					type : type,
					expression: sql
				}).done(function(msg) {
				$('#param-alert').addClass('d-none');
				$('#param-info').removeClass('d-none').html('<p>Salvat</p>');
				$('.calc_info').empty().remove();
//				$('#calculations-inputs-modal').modal('hide')
			}).fail(function(xhr, status, error) {
				let message = JSON.parse(xhr.responseText);
				$('#param-info').empty().addClass('d-none');
				$('#param-alert').empty().removeClass('d-none');
				$.each(message.errors, function(index, value) {
					$('#param-alert').append('<p>'+value+'</p>');
				});
			});

		});
		// $('body').on('change', '#it-type', function() {
		// });

		// Configurator calculation input types
		$('body').on('click', 'button.del-it', function() {
			let data_id = null;
			self = $(this);
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');

				$.ajax({
					url: '/ibd/ajax/calcit/'+data_id,
					type: 'DELETE',
					success: function(data) {
						self.parent().parent().remove();
					}
				});
			}
		});

		$('body').on('click', 'button.add-it', function() {
			$('#input-alert').addClass('d-none');
			$('#input-info').addClass('d-none');
			$('#it-desc').val('');
			$('#it-alias').val('');
			$('#it-update').val('');

			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
				$('#activeCalculation').attr('data-value',  data_id);
			}
			$('#it-id').val(0);
			$('#it-calc').val(data_id);
			$('#it-type').val($("#it-type option:first").val());

		});

		$('body').on('click', 'button.update-it', function() {
			$('#input-alert').addClass('d-none');
			$('#input-info').addClass('d-none');

			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
				$('#activeCalculation').attr('data-value',  data_id);
			}
			$.get( "/ibd/ajax/getinputtype/"+data_id, function( data ) {
				$('#it-id').val(data.typeParams[0].Id);
				$('#it-calc').val(data.typeParams[0].CalculationId);
				$('#it-desc').val(data.typeParams[0].Description);
				$('#it-type').val(data.typeParams[0].TypeId);
				$('#it-alias').val(data.typeParams[0].TypeAlias);
				$('#it-update').val(data.typeParams[0].UpdateValues);
			});

		});

		// Configurator calculation custom params
		$('body').on('click', 'button.calc_params', function() {
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
				$('#activeCalculation').attr('data-value',  data_id);
			}
			$.get( "/ibd/ajax/getcalculationcustomparams/"+data_id, function( data ) {
				$("#calculation_params tbody").empty();
				$.each(data.typeParams, function(index, value) {
					$("#calculation_params tbody").append(
						'<tr>'+
						'<td>'+value.Id+'</td>'+
						'<td><input type="hidden" class="form-control" name="typeId" value="'+value.TypeIdInput+'">'+value.TypeIdInput+'</td>'+
						'<td><input type="hidden" class="form-control" name="param" value="'+value.ParameterId+'">'+value.ParameterId+'</td>'+
						'<td><input type="text" disabled class="form-control" name="type" value="'+value.CalculationCustomParamType+'"></td>'+
						'<td><input type="text" class="form-control" name="expression" value="'+value.SQLExpression+'"></td>'+
						'<td>'+
						'<button type="button" class="mx-2 my-2 btn btn-success btn-sm update-calc-param" data-id="'+value.Id+'">Save</button>'+
						'<button type="button" class="mx-2 my-2 btn btn-danger btn-sm" >Delete</button><br/>'+
						'</td>'+
						'</tr>'
					);
				});

			});

		});

		// Configurator add/update calculation input type
		$('body').on('click', 'button.update-calc-input', function(event) {
			event.stopPropagation();
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
			}
			let inputs = $(this).parent().parent().find('input');
			let inputValues = [];
			inputs.each(function() {
				inputValues[$(this).attr('name')] = $(this).val();
			});
			$.post( "/ibd/ajax/updatecalculationinput/"+data_id,
				{
					calculation : $('#activeCalculation').attr('data-value'),
					type: inputValues['type'],
					alias: inputValues['alias'],
					updatevalues: inputValues['updatevalues'],
					desc: inputValues['desc']
				}).done(function(msg) {
				$('#input-type-alert').addClass('d-none');
				$('#input-info').removeClass('d-none').html('<p>Salvat</p>');
//				$('#calculations-inputs-modal').modal('hide')
			}).fail(function(xhr, status, error) {
				let message = JSON.parse(xhr.responseText);
				$('#input-type-alert').empty().removeClass('d-none');
				$('#input-info').empty().addClass('d-none');
				$.each(message.errors, function(index, value) {
					$('#input-type-alert').append('<p>'+value+'</p>');
				});
			});

		});


		$('body').on('click', 'button.update-trigger', function(event) {
			event.stopPropagation();
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
			}
			let inputs = $(this).parent().parent().find('input, select');
			let inputValues = [];
			inputs.each(function() {
				inputValues[$(this).attr('name')] = $(this).val();
			});
			$.post( "/ibd/ajax/updatetrigger/"+data_id,
				{
					name : inputValues['trigger_name'],
					desc : inputValues['trigger_desc'],
					type : inputValues['trigger_type'],
					calculation : inputValues['trigger_calculation'],
					status: inputValues['trigger_status']
				}).done(function(msg) {
			}).fail(function(xhr, status, error) {
				let message = JSON.parse(xhr.responseText);
			});
		});

		// Configurator add/update calculation params
		$('body').on('click', 'button.update-calc-param', function(event) {
			event.stopPropagation();
			let data_id = null;
			if (typeof $(this).data('id') !== 'undefined') {
				data_id = $(this).data('id');
			}
			let inputs = $(this).parent().parent().find('input');
			let inputValues = [];
			inputs.each(function() {
//				if($(this).attr('name') !== undefined)
				inputValues[$(this).attr('name')] = $(this).val();
			});
			$.post( "/ibd/ajax/updatecalculationparam/"+data_id,
				{
					calculation : $('#activeCalculation').attr('data-value'),
					typeId : inputValues['typeId'],
					param : inputValues['param'],
					type : inputValues['type'],
					expression: inputValues['expression']
			}).done(function(msg) {
				$('#param-alert').addClass('d-none');
				$('#param-info').removeClass('d-none').html('<p>Salvat</p>');
//				$('#calculations-inputs-modal').modal('hide')
			}).fail(function(xhr, status, error) {
				let message = JSON.parse(xhr.responseText);
				$('#param-info').empty().addClass('d-none');
				$('#param-alert').empty().removeClass('d-none');
				$.each(message.errors, function(index, value) {
					$('#param-alert').append('<p>'+value+'</p>');
				});
			});

		});

        if ($('.triggertype').length) {
            $('.triggertype').autoComplete({
                noResultsText: '',
                events: {
                    select: (evt, item) => {
                        return item;
                    },
                    typed: function (val, elem) {
                        return val;
                    }
                },
                select: function (event, ui) {
                    alert('aaa');
                },
                formatResult: function (item) {
                    return item;
                },
                // resolverSettings: {
                // 	url: '/ibd/ajax/getselecttypes'
                // }
            });
        }
        if ($('.triggercalc').length) {
            $('.triggercalc').autoComplete({
                noResultsText: '',
            });
        }

		$('#add-param').click(function(event) {
			event.stopPropagation();
			$.get( "/ibd/ajax/gettypes", function( data ) {
				let typesArray = [];
				let typesOptions = '';
				let paramsOptions = '';
				let distinctTypesOptions = '';
				$.each(data.typeParams, function(index, value) {
					typesOptions+='<option value="'+value.TypeId+'">('+value.TypeId+')'+value.TypeName+'</option>';
				});
				$.get( "/ibd/ajax/getparams", function( data ) {
					$.each(data.typeParams, function(index, value) {
						paramsOptions+='<option value="'+value.Id+'">('+value.Id+')'+value.Name+'</option>';
					});
					$.get( "/ibd/ajax/getdistincttypes", function( data ) {
						$.each(data.typeParams, function (index, value) {
							distinctTypesOptions += '<option value="' + value.CalculationCustomParamType + '">' + value.CalculationCustomParamType + '</option>';
						});
						$("#calculation_params tbody").prepend(
							'<tr>'+
							'<td></td>'+
							'<td>'+
							'<select class="custom-select form-control usedinput" data-target="typeId">' +
							typesOptions+
							'</select>'+
							'</td>'+
							'<td>'+
							'<select class="custom-select form-control usedinput" data-target="param">' +
							paramsOptions+
							'</select>'+
							'</td>'+
							'<td>'+
							'<select class="custom-select form-control usedinput" data-target="type">' +
							distinctTypesOptions+
							'</select>'+
							'</td>'+
							'<td><input type="text" class="form-control usedinput" data-target="expression" value=""></td>'+
							'<td>'+
							'<button type="button" class="mx-2 my-2 btn btn-success btn-sm add-calc-param">Save</button>'+
							'<button type="button" class="mx-2 my-2 btn btn-danger btn-sm delete-row" data-id="100" data-type="inputtype">Delete</button><br/>'+
							'</td>'+
							'</tr>'
						);
					});
				});
			});
		});

		$(".horizontalMenu-list li a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
		$(".horizontal-megamenu li a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().parent().parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
		$(".horizontalMenu-list .sub-menu .sub-menu li a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
	});

	// ______________Quantity Cart Increase & Descrease
	$(function () {
		$('.add').on('click',function(){
			var $qty=$(this).closest('div').find('.qty');
			var currentVal = parseInt($qty.val());
			if (!isNaN(currentVal)) {
				$qty.val(currentVal + 1);
			}
		});
		$('.minus').on('click',function(){
			var $qty=$(this).closest('div').find('.qty');
			var currentVal = parseInt($qty.val());
			if (!isNaN(currentVal) && currentVal > 0) {
				$qty.val(currentVal - 1);
			}
		});
	});

	// ___________TOOLTIP
	$('[data-toggle="tooltip"]').tooltip();
	// colored tooltip
	$('[data-toggle="tooltip-primary"]').tooltip({
		template: '<div class="tooltip tooltip-primary" role="tooltip"><div class="arrow"><\/div><div class="tooltip-inner"><\/div><\/div>'
	});
	$('[data-toggle="tooltip-secondary"]').tooltip({
		template: '<div class="tooltip tooltip-secondary" role="tooltip"><div class="arrow"><\/div><div class="tooltip-inner"><\/div><\/div>'
	});

	// __________POPOVER
	$('[data-toggle="popover"]').popover();
	$('[data-popover-color="head-primary"]').popover({
		template: '<div class="popover popover-head-primary" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	});
	$('[data-popover-color="head-secondary"]').popover({
		template: '<div class="popover popover-head-secondary" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	});
	$('[data-popover-color="primary"]').popover({
		template: '<div class="popover popover-primary" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	});
	$('[data-popover-color="secondary"]').popover({
		template: '<div class="popover popover-secondary" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	});
	$(document).on('click', function(e) {
		$('[data-toggle="popover"],[data-original-title]').each(function() {
			//the 'is' for buttons that trigger popups
			//the 'has' for icons within a button that triggers a popup
			if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
				(($(this).popover('hide').data('bs.popover') || {}).inState || {}).click = false // fix for BS 3.3.6
			}
		});
	});

	// __________MODAL
	// showing modal with effect
	$('.modal-effect').on('click', function(e) {
		e.preventDefault();
		var effect = $(this).attr('data-effect');
		$('#modaldemo8').addClass(effect);
	});
	// hide modal with effect
	$('#modaldemo8').on('hidden.bs.modal', function(e) {
		$(this).removeClass(function(index, className) {
			return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
		});
	});

	// ______________ Page Loading
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})

	// ______________Back to top Button
	$(window).on("scroll", function(e) {
    	if ($(this).scrollTop() > 0) {
            $('#back-to-top').fadeIn('slow');
        } else {
            $('#back-to-top').fadeOut('slow');
        }
    });
    $("#back-to-top").on("click", function(e){
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

	// ______________ StarRating
	var ratingOptions = {
		selectors: {
			starsSelector: '.rating-stars',
			starSelector: '.rating-star',
			starActiveClass: 'is--active',
			starHoverClass: 'is--hover',
			starNoHoverClass: 'is--no-hover',
			targetFormElementSelector: '.rating-value'
		}
	};
	$(".rating-stars").ratingStars(ratingOptions);

	// ______________ Chart-circle
	if ($('.chart-circle').length) {
		$('.chart-circle').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: '#e2e2e9',
			  lineCap: 'round'
			});
		});
	}
	// ______________ Chart-circle
	if ($('.chart-circle-primary').length) {
		$('.chart-circle-primary').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: 'rgba(112, 94, 200, 0.4)',
			  lineCap: 'round'
			});
		});
	}

	// ______________ Chart-circle
	if ($('.chart-circle-secondary').length) {
		$('.chart-circle-secondary').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: 'rgba(251, 28, 82, 0.4)',
			  lineCap: 'round'
			});
		});
	}

	// ______________ Chart-circle
	if ($('.chart-circle-success').length) {
		$('.chart-circle-success').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: 'rgba(66, 196, 138, 0.5)',
			  lineCap: 'round'
			});
		});
	}

	// ______________ Chart-circle
	if ($('.chart-circle-warning').length) {
		$('.chart-circle-warning').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: 'rgba(255, 171, 0, 0.5)',
			  lineCap: 'round'
			});
		});
	}

	// ______________ Global Search
	$(document).on("click", "[data-toggle='search']", function(e) {
		var body = $("body");

		if(body.hasClass('search-gone')) {
			body.addClass('search-gone');
			body.removeClass('search-show');
		}else{
			body.removeClass('search-gone');
			body.addClass('search-show');
		}
	});
	var toggleSidebar = function() {
		var w = $(window);
		if(w.outerWidth() <= 1024) {
			$("body").addClass("sidebar-gone");
			$(document).off("click", "body").on("click", "body", function(e) {
				if($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
					$("body").removeClass("sidebar-show");
					$("body").addClass("sidebar-gone");
					$("body").removeClass("search-show");
				}
			});
		}else{
			$("body").removeClass("sidebar-gone");
		}
	}
	toggleSidebar();
	$(window).resize(toggleSidebar);

	const DIV_CARD = 'div.card';
	// ______________ Tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// ______________ Popover
	$('[data-toggle="popover"]').popover({
		html: true
	});

	// ______________ Card Remove
	$(document).on('click', '[data-toggle="card-remove"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.remove();
		e.preventDefault();
		return false;
	});

	// ______________ Card Collapse
	$(document).on('click', '[data-toggle="card-collapse"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-collapsed');
		e.preventDefault();
		return false;
	});

	// ______________ Card Fullscreen
	$(document).on('click', '[data-toggle="card-fullscreen"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-fullscreen').removeClass('card-collapsed');
		e.preventDefault();
		return false;
	});

	// sparkline1
	$(".sparkline_bar").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4], {
		height: 20,
		type: 'bar',
		colorMap: {
			'7': '#a1a1a1'
		},
		barColor: '#ff5b51'
	});

	// sparkline2
	$(".sparkline_bar1").sparkline([3, 4, 3, 4, 5, 4, 5, 6, 4, 6,], {
		height: 20,
		type: 'bar',
		colorMap: {
			'7': '#c34444'
		},
		barColor: '#44c386'
	});

	// sparkline3
	$(".sparkline_bar2").sparkline([3, 4, 3, 4, 5, 4, 5, 6, 4, 6,], {
		height: 20,
		type: 'bar',
		colorMap: {
			'7': '#a1a1a1'
		},
		barColor: '#fa057a'
	});

	// ______________ Styles ______________//

	//$('body').addClass('color-menu');//

	//$('body').addClass('light-menu');//

	//$('body').addClass('dark-menu');//

	//$('body').addClass('gradient-menu');//

	//$('body').addClass('light-hor-header');//

	//$('body').addClass('color-hor-header');//

	//$('body').addClass('dark-hor-header');//

	//$('body').addClass('gradient-hor-header');//

	//$('body').addClass('color-hor-menu');//

	//$('body').addClass('light-hor-menu');//

	//$('body').addClass('gradient-hor-menu');//

	//$('body').addClass('dark-hor-menu');//

    $(document).ready(function() {
        $('.select2-tokens[multiple]').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            minimumResultsForSearch: Infinity,
            width: '100%'
        });
    });

	 $(document).ready(function() {
		var cacheLink = '/cache/flush?key=p@r0L@';
		var siteuri_proprii= [
			{'name':'Ringhel Demo',
			 'isdev':'0',
			 'url': 'http://sb.ringhel.ro/web'
			},
	
			{'name':'Ringhel DEV',
			 'isdev':'1',
			 'url': 'http://sb.ringhel.ro/web_dev'
			},
	
			{'name':'Ringhel TEST',
			 'isdev':'0',
			 'url': 'http://sb.ringhel.ro/web_test'
			}
		];
		
		var siteuri = [

			{'name':'Werk',
			 'isdev':'0',
			 'url': 'https://login.werkenergy.ro'
			},
	
			//{'name':'Arelco',
			// 'isdev':'0',
			// 'url': 'http://www.arelco.ro:34011'
			//},
	
			{'name':'Entrex',
			 'isdev':'0',
			 'url': 'https://crm.entrex.ro:444'
			},
	
			{'name':'Aderro',
			 'isdev':'0',
			 'url': 'http://clients.aderroenergy.ro'
			},
			
			{'name':'Aderro (TEST)',
			 'isdev':'1',
			 'url': 'http://clients-test.aderroenergy.ro'
			},
	
			{'name':'Getica 95',
			 'isdev':'0',
			 'url': 'http://clienti.getica95.ro'
			},
	
			{'name':'Apuron Energy',
			 'isdev':'0',
			 'url': 'http://clienti.apuron-energy.ro:9080'
			},
	
			{'name':'Nova PG',
			 'isdev':'0',
			 'url': 'https://crmadmin.novapg.ro'
			},
			
			{'name':'Nova PG - Test',
			 'isdev':'1',
			 'url': 'https://crmadmintest.novapg.ro'
			},
	
			{'name':'GDM Logistics',
			 'isdev':'0',
			 'url': 'http://client.gdmlogistics.ro'
			},
	
			{'name':'Curent Alternativ',
			 'isdev':'0',
			 'url': 'http://clienti.calt.ro'
			},
	
			{'name':'Industrial Energy',
			 'isdev':'0',
			 'url': 'http://client.industrialenergy.ro'
			},
	
			{'name':'Monsson Energy Trading',
			 'isdev':'0',
			 'url': 'http://client.monssontrading.eu'
			},
			
			{'name':'Monsson Energy Trading (TEST)',
			 'isdev':'1',
			 'url': 'http://91.240.94.105:8081'
			},
	
			{'name':'Absolute Energy',
			 'isdev':'0',
			 'url': 'http://clienti.absolute-energy.ro'
			},
	
	/* 		{'name':'C-Gaz',
			 'isdev':'0',
			 'url': 'http://client.cged.ro/gefee4web'
			}, */
	
			{'name':'RWE - MET',
			 'isdev':'0',
			 'url': 'http://cont2.ro.met.com'
			},
	
			{'name':'Electricom',
			 'isdev':'0',
			 'url': 'http://client.electricom.ro'
			},
	
			{'name':'Lukoil Energy & Gas (LEG)',
			 'isdev':'0',
			 'url': 'http://clienti.lukoilenergy.ro'
			},
	
			{'name':'Ovidiu Development',
			 'isdev':'0',
			 'url': 'https://cezenergy.cez.ro'
			},
	
			{'name':'Cez Vanzare',
			 'isdev':'0',
			 'url': 'https://webgaz.cezinfo.ro'
			},
	
			//{'name':'Arelco Energy',
			// 'isdev':'0',
			//'url': 'http://client.arelcoenergy.ro:34012'
			//},
	
			{'name':'Restart Energy',
			 'isdev':'0',
			 'url': 'https://client.restartenergy.ro'
			},
			{'name':'Restart Energy (TEST)',
			 'isdev':'1',
			 'url': 'http://89.38.211.103:82'
			},
			{'name':'Restart Energy (TEST 2)',
			 'isdev':'1',
			 'url': 'http://185.99.89.36'
			},
			{'name':'Premier Energy',
			 'isdev':'0',
			 'url': 'http://client.premierenergytrading.ro'
			},
			{
				'name':'Engie (PROD)',
				'isdev':'0',
				'url':'https://ppre.engie.ro'//http://fee-engie-app.azurewebsites.net
			},
			{
				'name':'Engie (TEST)',
				'isdev':'1',
				'url':'http://tpre.engie.ro'//http://fee-engie-app-test.azurewebsites.net
			},
			{
				'name':'MET (PROD)',
				'isdev':'0',
				'url':'https://client-ro.met.com'
			},
			{
				'name':'MET (TEST)',
				'isdev':'1',
				'url':'https://test.client-ro.met.com'
			},
			{
				'name':'Anchor Grup',
				'isdev':'0',
				'url':'http://energie.anchorgrup.ro'//'https://anchorgrup.azurewebsites.net'
			},
			{
				'name':'Mazarine Energy',
				'isdev':'0',
				'url':'http://customer-ro.mazarine-energy.com'
			},
			{
				'name':'E-nergia',
				'isdev':'0',
				'url':'https://portal-ro.e-nergia.net'
			},
			{
				'name':'ENERGIA Gas and Power Serbia',
				'isdev':'0',
				'url':'http://client.e-nergia.rs'
			},
			{
				'name':'ENERGIA Gas and Power Serbia - test',
				'isdev':'1',
				'url':'http://client-test.e-nergia.rs'
			},
			{
				'name':'EOL Energy',
				'isdev':'0',
				'url':'http://clienti.eol-energy.com'
			},
			{
				'name':'Electromagnetica (serverul nostru)',
				'isdev':'0',
				'url':'http://sb.ringhel.ro/web_electromagnetica'
			},
			{
				'name':'Electromagnetica',
				'isdev':'0',
				'url':'http://energie.electromagnetica.ro'
			},
			{
				'name':'Veolia Energie',
				'isdev':'0',
				'url':'http://portal.veolia.ro'
			},
			{
				'name':'Instant Construct',
				'isdev':'0',
				'url':'https://instantconstruct.azurewebsites.net'
			},
			{
				'name':'QMB Energ',
				'isdev':'0',
				'url':'http://crm.qmbenerg.com'
			},
			{
				'name':'A Energy Ind',
				'isdev':'0',
				'url':'https://aenergyind.azurewebsites.net'
			},
			{
				'name':'Energy Gas Provider',
				'isdev':'0',
				'url':'http://portal.energy-gas.ro'
			},
			{
				'name':'Energy Gas Provider (TEST)',
				'isdev':'1',
				'url':'https://energygasprovider-test.azurewebsites.net/'
			},
			{
				'name':'ICPE Electrocond',
				'isdev':'0',
				'url':'http://portal.icpeelectrocond.ro'
			}
	
		];
	
        $('#clearCacheDev').click(function(e){
			e.preventDefault();
			
			$.each(siteuri_proprii,function(key,site){
					if (!site.isdev) return;
					$.get(base_url+'/utils/ping', {url: site.url + cacheLink} ).done(function(result) {
						
					});
					
			});
			setTimeout(() => { 
			swal({
				  title: 'Cache golit cu succes (DEV)',
				  type: 'success',
				  timer: 4000
				}).catch(swal.noop);}, 1000);
		});
		
		
		$('#clearCache').click(function(e){
		$.each(siteuri,function(key,value){
			$.get(base_url+'/utils/ping', {url: value.url + cacheLink} ).done(function(result) {
			
			
			});
			
			
		});
		setTimeout(() => { 
		swal({
			  title: 'Cache golit cu succes (Clienti)',
			  type: 'success',
			  timer: 4000
			}).catch(swal.noop); }, 1000);
	});
			
    });

})(jQuery);

