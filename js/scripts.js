$(document).ready(function () {
    $('form').submit(function(e) {

        var $form = $(this);
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize()
        }).done(function(data) {
            $('.form-action').text(data);
            console.log(data);
        }).fail(function(data) {
            $('.form-action').text(data);            
            console.log(data);
        });

        e.preventDefault();
    });

    $('#choiceModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var content = button.data('content')
        var modal = $(this)
        //modal.find('.modal-body').text(content)
        modal.find('.modal-body input[type="hidden"]').val(content)
    })

});