$( document ).ready(function($) {
    var frm = $('#registration-form');
    frm.submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                console.log('Submission was successful.');
                console.log(data);
                jQuery("#registration-form")[0].reset();
                $("#response").html(data.message).addClass('alert-success').removeClass('hide');
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
                jQuery("#registration-form")[0].reset();
                $("#response").html(data.message).addClass('alert-danger').removeClass('hide');

            },
        });
    });

    var frmupdate = $('#registration-form-update');
    frmupdate.submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: frmupdate.attr('method'),
            url: frmupdate.attr('action'),
            data: frmupdate.serialize(),
            success: function (data) {
                console.log('Submission was successful.');
                console.log(data);
                $("#response").html(data.message).addClass('alert-success').removeClass('hide');
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
                $("#response").html(data.message).addClass('alert-danger').removeClass('hide');

            },
        });
    });

    $( ".remove-registration" ).click(function(){
        var title = $(this).attr('data-title');
        var url = $(this).attr('data-url');
        var rowId = $(this).attr('data-id');

        if (confirm(title)) {
            $.ajax({
                type: "DELETE",
                url: url,
                success: function (data) {
                    console.log('Submission was successful.');
                    console.log(data);
                    $("#row-"+rowId).hide();
                    $("#response").html(data.message).addClass('alert-success').removeClass('hide');
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                    $("#response").html(data.message).addClass('alert-danger').removeClass('hide');

                },
            });
        }
    });

    $( "#cancel" ).click(function() {
        jQuery("#registration-form")[0].reset();
    });


});
