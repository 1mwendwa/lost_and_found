$("#field1").change(function() {
    if ($(this).val() == "Document") {
        $('#field2div').show();
        $('#field2').attr('required', '');
        $('#field2').attr('data-error', 'This field is required.');

    } else {
        $('#field2div').hide();
        $('#field2').removeAttr('required');
        $('#field2').removeAttr('data-error');

    }
});
$("field1").trigger("change");


$(function() {
    alert('js file was added succesfully')
});

function myFunction() {
    alert("Hello! I am an alert box!");
};