(App = (function() {
    $('#bar').click(function() {
        $(this).toggleClass('open');
        $('#page-content-wrapper ,#sidebar-wrapper, #top-header, #footer').toggleClass('toggled');

    });
    $('.left-sidebar-scroll').perfectScrollbar();
})()),
(App = (function() {
    $('#datatable').DataTable();
})()),
(App = (function() {

})()),
(App = (function() {

})());




// Notifications
var uiNotifications = function() {
    conf = {

        assetsPath: "assets/images",
        imgPath: "avatar"
    }
    var assetsPath = "assets";
    var imgPath = "images";

    $("#not-theme").click(function() {
            return (
                $.gritter.add({
                    title: "Welcome home!",
                    text: "You can start your day checking the new messages.",
                    image: conf.assetsPath + "/" + conf.imgPath + "/avatar5.png",
                    class_name: "clean img-rounded",
                    time: "",
                }), !1
            );
        }),
        $("#not-sticky").click(function() {
            return (
                $.gritter.add({
                    title: "Sticky Note",
                    text: "Your daily goal is 130 new code lines, don't forget to update your work.",
                    image: conf.assetsPath +
                        "/" +
                        conf.imgPath +
                        "/slack_logo.png",
                    class_name: "clean",
                    sticky: !0,
                    time: "",
                }), !1
            );
        }),
        $("#not-text").click(function() {
            return (
                $.gritter.add({
                    title: "Just Text",
                    text: "This is a simple Gritter Notification. Etiam efficitur efficitur nisl eu dictum, nullam non orci elementum.",
                    class_name: "clean",
                    time: "",
                }), !1
            );
        }),
        $("#not-tr").click(function() {
            return (
                $.extend($.gritter.options, { position: "top-right" }),
                $.gritter.add({
                    title: "Top Right",
                    text: "This is a simple Gritter Notification. Etiam efficitur efficitur nisl eu dictum, nullam non orci elementum",
                    class_name: "clean",
                }), !1
            );
        }),
        $("#not-tl").click(function() {
            return (
                $.extend($.gritter.options, { position: "top-left" }),
                $.gritter.add({
                    title: "Top Left",
                    text: "This is a simple Gritter Notification. Etiam efficitur efficitur nisl eu dictum, nullam non orci elementum",
                    class_name: "clean",
                }), !1
            );
        }),
        $("#not-bl").click(function() {
            return (
                $.extend($.gritter.options, { position: "bottom-left" }),
                $.gritter.add({
                    title: "Bottom Left",
                    text: "This is a simple Gritter Notification. Etiam efficitur efficitur nisl eu dictum, nullam non orci elementum",
                    class_name: "clean",
                }), !1
            );
        }),
        $("#not-br").click(function() {
            return (
                $.extend($.gritter.options, { position: "bottom-right" }),
                $.gritter.add({
                    title: "Bottom Right",
                    text: "This is a simple Gritter Notification. Etiam efficitur efficitur nisl eu dictum, nullam non orci elementum",
                    class_name: "clean",
                }), !1
            );
        }),
        $("#not-primary").click(function() {
            $.gritter.add({
                title: "Primary",
                text: "This is a simple Gritter Notification.",
                class_name: "color primary",
            });
        }),
        $("#not-success").click(function() {
            $.gritter.add({
                title: "Success",
                text: "This is a simple Gritter Notification.",
                class_name: "color success",
            });
        }),
        $("#not-warning").click(function() {
            $.gritter.add({
                title: "Warning",
                text: "This is a simple Gritter Notification.",
                class_name: "color warning",
            });
        }),
        $("#not-danger").click(function() {
            $.gritter.add({
                title: "Danger",
                text: "This is a simple Gritter Notification.",
                class_name: "color danger",
            });
        }),
        $("#not-dark").click(function() {
            $.gritter.add({
                title: "Dark Color",
                text: "This is a simple Gritter Notification.",
                class_name: "color dark",
            });
        });
}
uiNotifications();


