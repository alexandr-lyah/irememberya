/*  
 http://www.dailycoding.com/
 Topbar message plugin
 */
(function ($) {
    $.fn.showTopbarMessage = function (options) {

        var defaults = {
            background: "#888",
            borderColor: "#000",
            foreColor: "#000",
            fontSize: "20px",
            close: 3000,
            closeOnClick: true,
            type: "error"
        };
        var options = $.extend(defaults, options);

        var messageStyle = " width: 100%;position: absolute;top: 0px;left: 0px;right: 0px;margin: 0px;color: " +
                options.foreColor + "";

        return this.each(function () {
            obj = $(this);

            if ($(".topbarBox").length > 0) {
                // Hide already existing bars
                $(".topbarBox").hide()
                $(".topbarBox").slideUp(200, function () {
                    $(".topbarBox").remove();
                });
            }

            var html = ""
                    + "<div class='topbarBox " + options.type + "'>"
                    + "  <div class='topbarOverlay'>&nbsp;</div>"
                    + "  <div class='topbarMessage' style='" + messageStyle + "'>" + obj.html() + "</div>"
                    + "</div>"

            if (options.closeOnClick) {
                $(html).appendTo($('body')).click(
                        function () {
                            $(this).clearQueue();
                            $(this).slideUp(200, function () {
                                $(this).remove();
                            });
                        }).slideDown(200).delay(options.close).slideUp(200, function () {
                    $(this).remove();
                });
            }
            else {
                $(html).appendTo($('body')).slideDown(200).delay(options.close).slideUp(200, function () {
                    $(this).remove();
                });
            }

        });
    };
})(jQuery);