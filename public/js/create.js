Dropzone.autoDiscover = false;
$('document').ready(function () {



    let mr = $("#mr").val();
    let mrs = $("#mrs").val();
    $("#mr").on("change paste keyup", function () {

        mr = $(this).val().toLowerCase();

        $("#basic_url").val(toLatin(mrs + "-" + mr));
        $("#mainurl").text("https://dragigosti.com/" + toLatin(mrs + "-" + mr));


        var data = $("#basic_url").val();

        $.ajax({
            url: "{{ route('invitations.checkUrl') }}",
            method: 'post',
            data: {
                content: data,
            },
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}"
            },
            success: function (response) {
                if (response.status === 'Valid Url Link') {
                    validInvalid(true);
                    $("#valid").css('display', 'block');
                    $("#not-valid").css('display', 'none');
                }
                if (response.status === 'Choose another Url') {
                    validInvalid(false);
                    $("#valid").css('display', 'none');
                    $("#not-valid").css('display', 'block');
                }

            }
        });
    });

    $("#mrs").on("change paste keyup", function () {
        mrs = $(this).val().toLowerCase();

        $("#basic_url").val(toLatin(mrs + "-" + mr));

        $("#mainurl").text("https://dragigosti.com/" + toLatin(mrs + "-" + mr));

        var data = $("#basic_url").val();

        $.ajax({
            url: "{{ route('invitations.checkUrl') }}",
            method: 'post',
            data: {
                content: data,
            },
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}"
            },
            success: function (response) {
                if (response.status === 'Valid Url Link') {
                    $("#valid").css('display', 'block');
                    validInvalid(true);
                    $("#not-valid").css('display', 'none');
                }
                if (response.status === 'Choose another Url') {
                    validInvalid(false)
                    $("#valid").css('display', 'none');
                    $("#not-valid").css('display', 'block');
                }

            }
        });
    });

    $("#basic_url").on("change paste keyup", function () {
        var data = $(this).val();


        $("#mainurl").text("https://dragigosti.com/" + toLatin($(this).val()));

        $.ajax({
            url: "{{ route('invitations.checkUrl') }}",
            method: 'post',
            data: {
                content: data,
            },
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}"
            },
            success: function (response) {
                if (response.status === 'Valid Url Link') {
                    validInvalid(true);
                    $("#valid").css('display', 'block');
                    $("#not-valid").css('display', 'none');
                }
                if (response.status === 'Choose another Url') {
                    validInvalid(false);
                    $("#valid").css('display', 'none');
                    $("#not-valid").css('display', 'block');
                }
            }
        });
    });

    function validInvalid(e)
    {
        jQuery.validator.addMethod("checkUrl", function() { return e });
    }


    $("a[href$='previous']").hide();
});



let myMaleDropzone = $("#male-upload").dropzone({
    addRemoveLinks: true,
    maxFiles: 1,
    init: function () {

        // Hack: Add the dropzone class to the element
        $(this.element).addClass("dropzone");


        this.on("removedfile", function (file) {
            let filename = JSON.parse(file.xhr.response);
            filename = filename.success;

            if (file) {
                $.ajax({
                    url: "{{ route('dropzone.destroy') }}",
                    method: 'post',
                    data: {filename: filename},
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
            }
        });
    },
    url: "{{ route('dropzone.store') }}",
    method: 'post',
    headers: {
        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
    },
    success: function (file, response) {
        console.log(response['success']);
        $('#male_photo').attr('value', `${response.success}`);
    }
});

let myFemaleDropzone = $("#female-upload").dropzone({
    addRemoveLinks: true,
    maxFiles: 1,
    init: function () {

        // Hack: Add the dropzone class to the element
        $(this.element).addClass("dropzone");


        this.on("removedfile", function (file) {
            let filename = JSON.parse(file.xhr.response);
            filename = filename.success;

            if (file) {
                $.ajax({
                    url: "{{ route('dropzone.destroy') }}",
                    method: 'post',
                    data: {filename: filename},
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
            }
        });
    },
    url: "{{ route('dropzone.store') }}",
    method: 'post',
    headers: {
        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
    },
    success: function (file, response) {
        console.log(response['success']);
        $('#female_photo').attr('value', `${response.success}`);
    }
});

let myGroupDropzone = $("#group-upload").dropzone({
    addRemoveLinks: true,
    maxFiles: 1,
    init: function () {

        // Hack: Add the dropzone class to the element
        $(this.element).addClass("dropzone");


        this.on("removedfile", function (file) {
            let filename = JSON.parse(file.xhr.response);
            filename = filename.success;

            if (file) {
                $.ajax({
                    url: "{{ route('dropzone.destroy') }}",
                    method: 'post',
                    data: {filename: filename},
                    headers: {
                        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
            }
        });
    },
    url: "{{ route('dropzone.store') }}",
    method: 'post',
    headers: {
        'X-CSRF-TOKEN': "{{ @csrf_token() }}"
    },
    success: function (file, response) {
        console.log(response['success']);
        $('#group_photo').attr('value', `${response.success}`);
    }
});
