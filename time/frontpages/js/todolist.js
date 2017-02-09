var $list = $('#list');
var $text = $('#new-text');
var $count = $('#count');


function addListItem() {
    var textToAdd = $text.val();                    // The finish class is just for css styling
    $list.append('<li class="item">' + textToAdd + '<a href="#" class="delete">X</a></li>');
    $text.val('');
    count();
}

function count(){
    var len = $list.children().length;
    if (len>0)
        $count.html('现有' + len + '项todo list');
    else
        $count.html('');
}

function deleteItem() {
    $(this).parent().remove();
    count();
}