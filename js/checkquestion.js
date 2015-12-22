checknumber = function() {
	if ($(".question-set").length > 1) {
		return true;
	} else {
		return false;
	}
}

$(document).on("click", ".add-question", function() {
			question = $(this).closest(".question-set");
			emptyquestion.clone().insertAfter(question);
        })
		
$(document).on("click", ".remove-question", function() {
			if (checknumber()) {
				$(this).closest(".question-set").remove();
			}
        })
   
$(document).ready( function() {

	emptyquestion = $(".question-set").clone();

});