<?php require './app/Initialize/Start.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './app/Setup/Initial.php'; ?>
    <script src="js/animation.js" type="text/javascript"></script>
    <script src="js/quickassistRaw.js" type="text/javascript"></script>
</head>

<body class="contextMenu">
    <?php echo "<script>window.onload = $.notify('Hello, world!','danger')</script>"; ?>

    <div id="blankModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="title-bar">
                <div>
                    <span class="window-title">Blank Modal</span>
                    <span class="title-bar-controls">
                        <span data-dismiss="modal"><i class="fas fa-window-close" aria-hidden="true"></i></span>
                    </span>
                </div>
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    <span>Blank Modal</span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default">Confirm</button>
                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div style="text-align: center;">
        <h1 class="page-header">Bootstrap</h1>
        <button class="bangbtn bangbtn-positive">Bang Button</button><br>
        <button class="bangbtn bangbtn-negative">Bang Button</button><br>
        <button class="bangbtn bangbtn-green">Bang Button</button><br>
        <button class="bangbtn bangbtn-red">Bang Button</button><br>
        <button class="bangbtn bangbtn-yellow">Bang Button</button><br>
        <button class="bangbtn bangbtn-cyan">Bang Button</button><br>
        <br>
        <button type="button" class="btn">Basic</button>
        <button type="button" class="btn btn-default">Default</button>
        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-info">Info</button>
        <button type="button" class="btn btn-warning">Warning</button>
        <button type="button" class="btn btn-danger">Danger</button>
        <br><br>
        <button type="button" id="newBlankModal" class="btn btn-info">Open Modal</button>
        <br>

        <h1 class="page-header">Font-Awesome</h1>
        <div>
            <i class="fas fa-times chopper" aria-hidden="true"></i>
            <i class="far fa-thumbs-up fa-2x boo" aria-hidden="true"></i>
            <i class="far fa-thumbs-up fa-3x boo" aria-hidden="true"></i>
            <i class="far fa-thumbs-up fa-4x boo" aria-hidden="true"></i>
            <i class="far fa-thumbs-up fa-5x boo" aria-hidden="true"></i>
            <i class="far fa-thumbs-up fa-4x boo" aria-hidden="true"></i>
            <i class="far fa-thumbs-up fa-3x boo" aria-hidden="true"></i>
            <i class="far fa-thumbs-up fa-2x boo" aria-hidden="true"></i>
            <i class="fas fa-times chopper" aria-hidden="true"></i>
        </div>
        <br>

        <h1 class="page-header">Toggle Switch</h1>
        <label class="switch">
            <input type="checkbox" checked="true">
            <span class="slider round"></span>
        </label>
        <label class="switch">
            <input type="checkbox" checked="true">
            <span class="slider round"></span>
        </label>
        <label class="switch">
            <input type="checkbox" checked="true">
            <span class="slider round"></span>
        </label>
        <label class="switch">
            <input type="checkbox" checked="true">
            <span class="slider round"></span>
        </label>
        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>
        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>
        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>
        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>
        <br>

        <h1 class="page-header">Notify.js</h1>
        <button id="success">Success</button>
        <button id="error">Error</button>
        <button id="danger">Danger</button>
        <br>

        <h1 class="page-header">Bootstrap Tooltip</h1>
        <div class="container">
            <span style="margin: 10px;" data-toggle="tooltip" data-placement="left" data-html="true" title="Hooray!">Left</span>
            <span style="margin: 10px;" data-toggle="tooltip" data-placement="top" data-html="true" title="Hooray!">Top</span>
            <span style="margin: 10px;" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Hooray!">Bottom</span>
            <span style="margin: 10px;" data-toggle="tooltip" data-placement="right" data-html="true" title="Hooray!">Right</span>
        </div>
        <br>

        <h1 class="page-header">jQuery Context Menu</h1>
        <button class="btn btn-success buttonContextMenu">Right Click Here</button>
        <br><br><br>

        <!--Override Context Menu-->
        <script type="text/javascript">
            $(function() {
                $.contextMenu({
                    selector: '.buttonContextMenu',
                    callback: function(key, options) {
                        if (key === "Refresh") {
                            $.notify(key, 'danger');
                            location.reload();
                        } else if (key === "Copy") {
                            $.notify(key, 'success');
                        } else if (key === "Paste") {
                            $.notify(key, 'success');
                        } else if (key === "Delete") {
                            $.notify(key, 'success');
                        } else if (key === "Properties") {
                            $.notify(key, 'success');
                        }
                    },
                    items: {
                        "Refresh": {
                            name: "Refresh"
                        },
                        "sep1": "---------",
                        "Copy": {
                            name: "Copy"
                        },
                        "Paste": {
                            name: "Paste"
                        },
                        "Delete": {
                            name: "Delete"
                        },
                        "sep2": "---------",
                        "Properties": {
                            name: "Properties",
                            icon: "fa-beer"
                        }
                    }
                });
            });
        </script>

        <script>
            $("#success").click(function() {
                $.notify("Notify.js", "success");
            });
            $("#error").click(function() {
                $.notify("Notify.js", "error");
            });
            $("#danger").click(function() {
                $.notify("Notify.js", {
                    className: "danger",
                    position: "bottom left"
                });
            });
        </script>
    </div>
</body>

</html>
<?php require './app/Initialize/End.php'; ?>