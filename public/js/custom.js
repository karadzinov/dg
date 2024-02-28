(function ($) {
    $(document).ready(function () {


        $('.clone').on('click', function (e) {
            e.preventDefault();
        });
        $('.remove').on('click', function (e) {
            e.preventDefault();
        });
        var regex = /^(.+?)(\d+)$/i;
        var cloneIndex = $(".clonedInput").length;

        function clone() {
            $(".clonedInput").last().clone()
                .appendTo(".showHere")
                .attr("id", "clonedInput" + cloneIndex)
                .find("*")
                .each(function () {
                    var id = this.id || "";
                    var match = id.match(regex) || [];
                    if (match.length == 3) {
                        this.id = match[1] + (cloneIndex);
                    }
                })
                .val("")
                .on('click', 'button.clone', clone)
                .on('click', 'button.remove', remove);
            cloneIndex++;
        }

        function remove() {
            $(".clonedInput").last().remove();
        }

        $("button.clone").on("click", clone);
        $("button.remove").on("click", remove);


        document.addEventListener("DOMContentLoaded", function () {
            // Datatables Responsive
            $("#datatable").DataTable({
                "filter": false,
                "length": false
            });
        });
        var toolbarOptions = [
            ["bold", "underline"],
            ["link", "blockquote", "code", "image"],
            [{list: "ordered"}, {list: "bullet"}]
        ];
        $('.quill-editor').each(function (i, el) {
            var el = $(this), id = 'quilleditor-' + i, val = el.val(), editor_height = 200;
            var div = $('<div/>').attr('id', id).css('height', editor_height + 'px').html(val);
            el.addClass('d-none');
            el.parent().append(div);
            var quill = new Quill('#' + id, {
                modules: {toolbar: toolbarOptions},
                theme: 'snow'
            });
            quill.on('text-change', function () {
                console.log(quill.container.firstChild.innerHTML);
                el.html();
                $("#description").val(quill.container.firstChild.innerHTML);
            });

        });


        // Notify Plugin - The below code (until line 42) is used for demonstration purposes only
        //-----------------------------------------------
        if (($(".main-navigation.onclick").length > 0) && !Modernizr.touch) {
            $.notify({
                // options
                message: 'The Dropdowns of the Main Menu, are now open with click on Parent Items. Click "Home" to checkout this behavior.'
            }, {
                // settings
                type: 'info',
                delay: 10000,
                offset: {
                    y: 150,
                    x: 20
                }
            });
        }
        ;
        if (!($(".main-navigation.animated").length > 0) && !Modernizr.touch && $(".main-navigation").length > 0) {
            $.notify({
                // options
                message: 'The animations of main menu are disabled.'
            }, {
                // settings
                type: 'info',
                delay: 10000,
                offset: {
                    y: 150,
                    x: 20
                }
            }); // End Notify Plugin - The above code (from line 14) is used for demonstration purposes only

        }
        ;
    }); // End document ready

})(this.jQuery);



