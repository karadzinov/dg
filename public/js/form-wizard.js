$(".tab-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: "Submit",
    },
    onStepChanging: function (event, currentIndex, newIndex) {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex) {
            return false;
        }

        // Forbid next action on "Warning" step if the user is to young
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex) {
            // To remove error styles
            $(".tab-wizard").find(".body:eq(" + newIndex + ") label.error").remove();
            $(".tab-wizard").find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }

        return $(".tab-wizard").valid();
    },
    onFinished: function (event, currentIndex) {
        $(".tab-wizard").submit();
    },
}).validate({
    errorPlacement: function errorPlacement(error, element) {
        element.before(error);
    },

    rules: {
        // simple rule, converted to {required:true}
        mr: {
            required: true
        },
        mrs: {
            required: true
        },
        female_photo: {required: true},
        male_photo: {required: true},
        group_photo: {required: true},
        basic_url: {
            required: true,
            checkUrl: true,
        },
        // compound rule
        email: {
            required: true,
            email: true
        },
    },
    messages: {
        mr: "Ве молиме внесете го името на младоженецот",
        mrs: "Ве молиме внесете го името на невестата",
        email: "Потребено е да го внесете вашиот email",
        female_photo: "Ве молиме одберете слика за невестата",
        male_photo: "Ве молиме одберете слика за младоженецот",
        group_photo: "Ве молиме одберете заедничка слика",
        basic_url: "Ве молиме променете го линкот",
        date: "Ве молиме изберете датум поголем од: " + new Date().getDate() + "." + new Date().getMonth()  + 1 + "." + new Date().getFullYear()
    }
});
