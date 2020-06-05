//========================================MODULE/APP NAME========================================//

//====================GLOBAL VARIABLES====================//
var key = { a: 65, b: 66, c: 67, d: 68, e: 69, f: 70, g: 71, h: 72, i: 73, j: 74, k: 75, l: 76, m: 77, n: 78, o: 79, p: 80, q: 81, r: 82, s: 83, t: 84, u: 85, v: 86, w: 87, x: 88, y: 89, z: 90 };
//====================GLOBAL VARIABLES====================//

//====================GENERAL====================//
$(function () {
    // sessionStorage.setItem("itemSample", "sessionStorage");
    // alert(sessionStorage.getItem("itemSample"));

    $(".modal-dialog").draggable({ handle: ".title-bar" });

    $(document).on("keyup", "input", function (e) {
        if (custom_isEmptyInput(this.value)) {
            this.value = "";
        }
    });
    $(document).on("click", "#newBlankModal", function (e) {
        $("#blankModal").modal('show');
    });

    $(".timepicker").timepicker({
        minuteStep: 1
    });
    $("body").attr("spellcheck", false);
    $(document).on("contextmenu", function (e) {
        return false;
    });
    $(document).on("keydown", function (e) {
        // One keydown listener on every page to avoid redundancy
        if (e.ctrlKey && e.keyCode === 65) {
            $.notify("Ctrl + A", "success");
        }
        if (e.ctrlKey && e.keyCode === 90) {
            $.notify("Ctrl + Z", "success");
        }
    });
});
//==========BOOTSTRAP TOOLTIP==========//
$(function () {
    $('body').tooltip({ selector: '[data-toggle=tooltip]' });
});

//==========CONTEXT MENU==========//
$(function () {
    $.contextMenu({
        selector: ".contextMenu",
        items: {
            "SortBy": {
                "name": "Sort by",
                "items": {
                    "Name": { "name": "Name" },
                    "Size": { "name": "Size" },
                    "ItemType": { "name": "Item type" },
                    "DateModified": { "name": "Date modified" },
                    "View": {
                        "name": "View",
                        "items": {
                            "Large": { "name": "Large icons" },
                            "Medium": { "name": "Medium icons" },
                            "Small": { "name": "Small icons" }
                        }
                    }
                }
            },
            "Refresh": { name: "Refresh" },
            "sep1": "-----",
            "Edit": { name: "Edit" },
            "Cut": { name: "Cut" },
            "Copy": { name: "Copy" },
            "Paste": { name: "Paste" },
            "Delete": { name: "Delete" },
            "sep2": "-----",
            "Properties": { name: "Properties" }
        },
        callback: function (key, options) {
            if (key === "Refresh") {
                $.notify(key, "success");
            } else if (key === "Edit") {
                $.notify(key, "success");
            } else if (key === "Cut") {
                $.notify(key, "success");
            } else if (key === "Copy") {
                $.notify(key, "success");
            } else if (key === "Paste") {
                $.notify(key, "success");
            } else if (key === "Delete") {
                $.notify(key, "success");
            } else if (key === "Properties") {
                $.notify(key, "success");
            } else if (key === "Name") {
                $.notify(key, "success");
            }
        }
    });
});
//==========CONTEXT MENU==========//
//====================GENERAL====================//

//====================MODULE FUNCTIONALITY====================//
$(function () {
});
//====================MODULE FUNCTIONALITY====================//

//====================FUNCTIONS====================//
function helloWorld() {
    alert("Hello, world!");
}
function custom_isEmptyInput(string) {
    return !string.replace(/\s/g, "").length ? true : false;
}
function custom_playAudio(audioName, audioSource) {
    var selector = audioName[0] === "#" ? 'id="' + audioName.substr(1) + '"' : 'class="' + audioName.substr(1) + '"';
    if ($(audioName).length === 0) {
        $("body").append('<audio ' + selector + ' preload="auto"><source src="' + audioSource + '"></audio>');
    }
    var audio = $(document).find(audioName)[0].play();
    if (audio !== undefined) {
        audio.then(_ => {
        }).catch(error => {
        });
    }
}
//====================FUNCTIONS====================//

//========================================MODULE/APP NAME========================================//