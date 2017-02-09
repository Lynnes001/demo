(function(){
	var $todoForm = $('#todoForm');
	var $todoInput = $('#todoInput');
	var $todoList = $('#todoList');
	var $todoCount = $('#todoCount');
	// function count(){
	// 	var len = $todoList.children().length;
	// 	$todoCount.html(len>0 ? '现有' + len + '项todo list' ： '');
	// }


function count(){
    var len = $('#list').children().length;
    if (len>0)
        $('#count').html('现有' + len + '项todo list');
    else
        $('#count').html('');
}


	$todoForm.submit(function(e) {
		e.preventDefault();
		var input_value = $todoInput.val();
		$todoList.append('<li>' + input_value + '$nbsp;<a href="#" class="todoDelete">x</a></li>');
		$todoInput.val('');
		count();
	});

	$todoList.on('click','.todoDelete', function(e){
		e.preventDefault();
		$(this).parent().remove();
		count();
	});
})();










