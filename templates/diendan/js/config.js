ConfigRule = {
	REDate	: /^([0-3]{1})([0-9]{1})\-(0|1)([0-9]{1})\-20([1-9]{1})([0-9]{1})$/,
	REChar	: /^([A-Z]{1})$/,
	REPhone	: /^0(1|9)([0-9]{8,9})$/,
	REEmail	: /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
	RECar  	: /^([0-9]{2})([A-Z]{1,2})\-([0-9]{4,5})$/,
	REBike : /^([0-9]{2})([A-Z]{1})([A-Z0-9]{1})\-([0-9]{4,5})$/
}

ConfigError = {
	E001	: "Không được để trống",
	E002	: "Vui lòng nhập đúng ngày",
	E003	: "Vui lòng chọn trường này",
	E004	: "Vui lòng nhập đúng số điện thoại",
	E005	: "Độ dài quá ngắn",
	E006	: "Độ dài quá dài",
	E007	: "Vui lòng nhập đúng email",
	E008	: "Vui lòng không nhập ký tự đặc biệt",
	E009 	: "Biển số xe không đúng"
}

CharSpecial = '~!@#$%^&*()_+`1234567890-=[]{}|;:",./<>?';

function validateForm(selector){
	$(selector + " input[type='text'], " + selector + " textarea").each(function(){
		$(this).val($.trim($(this).val()));
	});//End: $("input[type='text'], textarea").each()

	var isValid = true;
	var textError = '';
	var textName = '';
	$(selector + " [data-regex]").each(function(){
		var partten = ConfigRule[$(this).attr("data-regex")];

		var localValid = partten.test($.trim($(this).val()));
		if(!localValid){
			textError += '-' + $(this).attr('name') + '_' + $(this).attr("data-regex-error");
		}
		textName += '-' + $(this).attr('name');

		isValid = isValid && localValid;
		
	});//End: $("[data-regex]").each();

	$(selector + ' [data-max]').each(function(){
		var maxLength = parseInt($(this).attr('data-max'));
		if ($(this).val().length > maxLength){
			textError += '-' + $(this).attr('name') + '_E006';
			isValid = false;
		}
		textName += '-' + $(this).attr('name');
	});//End: $("[data-max]").each();

	$(selector + ' [data-min]').each(function(){
		var minLength = parseInt($(this).attr('data-min'));
		if ($(this).val().length < minLength){
			textError += '-' + $(this).attr('name') + '_E005';
			isValid = false;
		}
		textName += '-' + $(this).attr('name');
	});//End: $("[data-min]").each();

	$(selector + ' [data-required]').each(function(){
		if ($(this).val().length == 0){
			textError += '-' + $(this).attr('name') + '_E001';
			isValid = false;
		}
		textName += '-' + $(this).attr('name');
	});//End: $("[data-required]").each();

	$(selector + ' [data-not-required]').each(function(){
		if ($(this).val().length > 0){
			var rule = $(this).attr('data-not-required').split(',');
			if ($(this).val().length < parseInt(rule[0])){
				textError += '-' + $(this).attr('name') + '_E005';
				isValid = false;
			}

			if ($(this).val().length > parseInt(rule[1])){
				textError += '-' + $(this).attr('name') + '_E006';
				isValid = false;
			}
		}
		textName += '-' + $(this).attr('name');
	});//End: $("[data-not-required]").each();

	$(selector + ' [data-charspecial]').each(function(){
		var val = $(this).val();
		var flag = true;

		for (var i = 0; i < CharSpecial.length; i++){
			if (val.indexOf(CharSpecial[i]) > -1){
				flag = false;
				break;
			}
		}

		if (flag == false || val.indexOf("'") > -1 || val.indexOf('\\') > -1){
			textError += '-' + $(this).attr('name') + '_E008';
			isValid = false;
		}
		textName += '-' + $(this).attr('name');
	});//End: $("[data-charspecial]").each();

	var arrName = textName.split('-');
	if (arrName.length >= 2){
		for (var i = 1; i < arrName.length; i++) {
			$(selector + ' [name=' + arrName[i] + ']').parent().find('p').html('');
		}
	}

	if (!isValid){
		var arrError = textError.split('-');
		if (arrError.length >= 2){
			for (var i = 1; i < arrError.length; i++) {
				var arrTypeError = arrError[i].split('_');
				$(selector + ' [name=' + arrTypeError[0] + ']').parent().find('p').html(ConfigError[arrTypeError[1]]);
			}
		}
	}

	return isValid;
}