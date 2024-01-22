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





        window.mobileCheck = function () {
            let check = false;
            (function (a) {
                if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
            })(navigator.userAgent || navigator.vendor || window.opera);
            return check;
        };


        $(".gallery div").on("mouseout", function () {
            $(this).removeClass("active");
            $("#invitations").addClass("active");

        });

        $(".gallery > div").on("click", function () {


            let img = $(this).children('img')[0];

            img = $(img).data('link');

            if (img) {
                window.location = '/' + img;
            }


        });

        $("#invitations").on("click", function () {
            window.location = '/invitation/create';
        });


        $(".gallery div").on("mouseover", function () {
            $(this).removeClass("active");
            $("#invitations").removeClass("active");

        });

        let scrollVal;

        if (window.mobileCheck()) {
            scrollVal = 150;

            div1 = $('#musicians');
            div2 = $('#services');

            tdiv1 = div1.clone();
            tdiv2 = div2.clone();


            if (!div2.is(':empty')) {
                div1.replaceWith(tdiv2);
                div2.replaceWith(tdiv1);
            }

            $(tdiv1).on("click", function () {
                window.location = '/musicians';
            });
        } else {
            scrollVal = 400;
        }


        function check_from_top_de() { // Create our function
            var scroll = $(window).scrollTop(); // Check scroll distance
            if (scroll >= scrollVal) { // If it is equal or more than 300 - you can change this to what you want
                $("#invitations").parent().removeClass("gallery-gap");
            } else {
                $("#invitations").parent().addClass("gallery-gap");
            }
        }

        check_from_top_de(); // On load, run the function

        $(window).scroll(function () { // When scroll - run function
            check_from_top_de();
        });


        $(".scroll-to").click(function () {
            window.scrollTo({
                top: 800,
                behavior: "smooth",
            });
        })


        $(".image1").on("click", function () {
            window.location = '/invitation/create';
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



