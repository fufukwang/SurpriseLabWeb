function disableGoNext() {
    var disabled = false;

    $('#invite input[type=text].required').each(function(){
        if($(this).val() == '') {
            disabled = true;
        }
    });

    $('#invite input[type=checkbox].required').each(function(){
        if(!$(this).is(":checked")) {
            disabled = true;
        }
    });

    return disabled;
}

$('#invite input[type=text].required').on('keyup', function() {
    $('#invite .actions button').prop('disabled', disableGoNext());
});

$('#invite input[type=checkbox].required').on('change', function() {
    $('#invite .actions button').prop('disabled', disableGoNext());
});

function onFormSubmit() {
    return !disableGoNext();
}