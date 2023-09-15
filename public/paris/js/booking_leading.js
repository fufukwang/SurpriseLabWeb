function onFormSubmit() {
    var code = $('#leading .invite-code input').val();
    $('#leading .error').removeClass('show');

    if( code == '' ) {
        $('#leading .error').addClass('show');
        return false;
    }
}