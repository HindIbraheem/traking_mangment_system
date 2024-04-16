// $(".tab-wizard").steps({
//     headerTag: "h5",
//     bodyTag: "section",
//     transitionEffect: "fade",
//     titleTemplate: '<span class="step">#index#</span> #title#',
//     labels: {
//         finish: "Submit"
//     },
//     onStepChanged: function(event, currentIndex, priorIndex) {
//         $('.steps .current').prevAll().addClass('disabled');
//     },
//     onFinished: function(event, currentIndex) {
//         $('#success-modal').modal('show');
//     }
// });

$(".tab-wizard").steps({
    headerTag: "h5",
    bodyTag: "section",
    enableAllSteps: true,
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: "Add Employee"
    },
    onStepChanged: function(event, current, next) {
        if (current > 3) {
            $("#save").hide();
        } else if (current <= 3) {
            $("#save").show();
        }

    },
    onFinished: function(event, currentIndex) {
        $("#submit").click();
    },
});


// $(".tab-wizard2").steps({
//     headerTag: "h5",
//     bodyTag: "section",
//     transitionEffect: "fade",
//     titleTemplate: '<span class="step">#index#</span> <span class="info">#title#</span>',
//     labels: {
//         finish: "Submit",
//         next: "Next",
//         previous: "Previous",
//     },
//     onStepChanged: function(event, currentIndex, priorIndex) {
//         $('.steps .current').prevAll().addClass('disabled');
//     },
//     onFinished: function(event, currentIndex) {
//         $('#success-modal-btn').trigger('click');
//     }
// });