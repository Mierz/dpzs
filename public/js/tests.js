var_space = {
	current_quest:0,
	question_data:null,
	answer:[]
}

function getData (method, data){
	$.ajax({
		url: ['/students/',method].join(''),
		//type: 'POST',
		dataType: 'json',
		data: data,		
		success:function(res, status){
			console.log("success", res);
			var_space.question_data = res;
			renderQuest();
			$('.cont').removeClass('loader');			
		},
		error:function(res, status){
			console.log("error", res);
			$('.cont').removeClass('loader');
			console.log('ok', res);
		},
		beforeSend:function(res, status) {
			$('.cont').addClass('loader');
		},
	});


}

function sendData (method, data){
	$.ajax({
		url: ['/students/',method].join(''),
		type: 'POST',
		//dataType: 'json',
		data: data,		
		success:function(res){			
			console.log("success", res);						
		},
		error:function(res, status){
			console.log("error", res);		
			console.log('ok', res);
		},		
	});


}

function renderQuest(){
	render_data = {}
	render_data.title = var_space.question_data.title
	render_data.item = var_space.question_data.question_list[var_space.current_quest]
	render_data.procent = (100*var_space.current_quest)/render_data.item.options.length 
	html = $('#item_template').render(render_data);
	$(".cont").html(html);
}

function renderResult(res){
	var bal = 2; 
	perc = (res*100)/var_space.question_data.question_list.length;
	if((perc >= 80) && (perc < 85)){
		bal = 3;
	}else if ((perc >= 85) && (perc < 95)){
		bal = 4;
	}else if ((perc >= 95) && (perc <= 100)){
		bal = 5;
	};
	html = $('#correct_answer').render({correct_answ:bal});
	$(".cont").html(html);	
	sendData("send_result", {id:var_space.question_data.id, bal:bal})	
}

function resultProcessing(){
	var count_currect_answ = 0
	if(var_space.answer.length === var_space.question_data.correct_answ.length){
		for(var i=0; i<var_space.answer.length; i++){
			if(var_space.answer[i] == var_space.question_data.correct_answ[i]){
				count_currect_answ++;
			}
		}
		renderResult(count_currect_answ);
	}
}



function nextStep(){
	checked_elem = $(".question:checked").val() || null
	if (checked_elem != null){
		var_space.answer[var_space.current_quest] = checked_elem;
		var_space.current_quest++	
		if (var_space.question_data.question_list.length > var_space.current_quest){
			renderQuest()
		}else{
			resultProcessing()
		}
	}

}


$(document).ready(function() {
	$(document).on("click", ".next_btn", function(el){
		nextStep()
	});
		
	getData('get_test/' + $('.lecture_num').html(), {});

});
