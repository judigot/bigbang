//====================QUICKASSIST====================//
$(function () {
    if (!jQuery.ui) {
        alert("Quickassist requires jQuery UI to work.");
    } else {
        var Quickassist = "<img class='Quickassist' src='images/" + ["1", "2", "3", "4", "5"][Math.floor(Math.random() * ["1", "2", "3", "4", "5"].length)] + ".gif'>";
        var QuickassistSize = 100;
        var QuickassistPosition = ["left", "right"][Math.floor(Math.random() * ["left", "right"].length)];
        var QuickassistDisplay = "initial" /*initial, none*/;
        var QuickassistHidden = QuickassistSize * 0.1;
        var QuickassistAnimation = ["easeOutBack"];
        var QuickassistAnimationDuration = [1000];
        $('body').append(Quickassist);
        if (QuickassistDisplay === "initial") {
            $(".Quickassist").hide().fadeIn(500);
        }
        $(".Quickassist").draggable({containment: "window"});
        $(".Quickassist").attr("data-position", QuickassistPosition);
        $(".Quickassist").css({
            "display": QuickassistDisplay,
            "top": "0",
            "left": QuickassistPosition === "left" ? "-" + QuickassistHidden + "px" : ($(window).width() - QuickassistSize) + QuickassistHidden + "px",
            "cursor": "pointer",
            "position": "fixed",
            "height": QuickassistSize + "px",
            "width": QuickassistSize + "px",
            "border-radius": "50%",
            "transition": "opacity 0.1s, box-shadow 0.1s"
        });
        $(document).on("mousedown", ".Quickassist", function (e) {
            $(".Quickassist").stop();
            $(".Quickassist").css({
                "opacity": "0.5",
                "box-shadow": "none"
            });
        });
        $(document).on("mouseup", ".Quickassist", function (e) {
            $(".Quickassist").stop();
            $(".Quickassist").css({
                "opacity": "1",
                "transition": "opacity 0.1s, box-shadow 0.1s"
            });
            var winHeight = $(window).height();
            var windowWidth = $(window).width();
            var QuickXAxis = $(this).offset().left + (QuickassistSize / 2);
            var QuickYAxis = $(this).offset().top + (QuickassistSize / 2);
            if ((QuickXAxis < windowWidth / 2)) {
                // Left
                $(".Quickassist").attr("data-position", "left");
                $(".Quickassist").animate({"left": "-" + QuickassistHidden + "px"}, QuickassistAnimationDuration[Math.floor(Math.random() * QuickassistAnimationDuration.length)], QuickassistAnimation[Math.floor(Math.random() * QuickassistAnimation.length)]);
            } else {
                // Right
                $(".Quickassist").attr("data-position", "right");
                $(".Quickassist").animate({"left": (windowWidth - QuickassistSize) + QuickassistHidden + "px"}, QuickassistAnimationDuration[Math.floor(Math.random() * QuickassistAnimationDuration.length)], QuickassistAnimation[Math.floor(Math.random() * QuickassistAnimation.length)]);
            }
        });
        $(window).resize(function () {
            $(".Quickassist").trigger("mouseup");
        });
        $(document).on("click", function (e) {
            $(".Quickassist").trigger("mouseup");
        });
        $(document).on("keyup", function (e) {
            var letter = {a: 65, b: 66, c: 67, d: 68, e: 69, f: 70, g: 71, h: 72, i: 73, j: 74, k: 75, l: 76, m: 77, n: 78, o: 79, p: 80, q: 81, r: 82, s: 83, t: 84, u: 85, v: 86, w: 87, x: 88, y: 89, z: 90};
            if (e.ctrlKey && e.keyCode === letter.q) {
                $(".Quickassist").stop();
                $(".Quickassist").toggle("drop", {
                    direction: $(".Quickassist").attr("data-position")
                }, 100);
                e.preventDefault();
            }
        });
        $(document).on("click", ".Quickassist", function (e) {
            $(".Quickassist").attr("src", "images/" + ["1", "2", "3", "4", "5"][Math.floor(Math.random() * ["1", "2", "3", "4", "5"].length)] + ".gif");
        });
    }
});
//====================QUICKASSIST====================//