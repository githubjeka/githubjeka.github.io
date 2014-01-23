
$('#grid').on('click',function() {
    $(this).removeClass('show').addClass('hidden');
    $('#content').removeClass('hidden').addClass('show');
    setTimeout(function() {
        $('#content .imageBlock').addClass('animate');
        $('#content .descBlock').addClass('animate');
    },100);

})

$('#closeContent').on('click',function() {
    $('#content').removeClass('show').addClass('hidden');
    $('#grid').removeClass('hidden').addClass('show');
    $('#content .imageBlock').removeClass('animate');
    $('#content .descBlock').removeClass('animate');
})