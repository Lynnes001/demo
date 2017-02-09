var $websites = $('#websites');
var $web = $('#new-web');


function addListItem() {
    var textToAdd = $web.val();                    // The finish class is just for css styling
    $websites.append('<li class="item">' + textToAdd + '<a href="#" class="delete">x</a></li>');
    $web.val('');
}

function deleteItem() {
    $(this).parent().remove();
}
