<html>
<head>
    <link rel="stylesheet" href="style.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <script type="text/javascript" language="JavaScript">
        $(document).ready(function () {

            console.log('The document is ready...');

            $('.btn-simon').on('click', function () {

                var id = $(this).attr('id');

                console.log('The ' + id + ' button was clicked');
            });
        });
    </script>
</head>
<body>

<h3>Simon Says</h3>

<hr style="width:50%; float: left;"/>
<div style="clear:both;"></div>


<div class="container">

    <!-- Div containing table of buttons and lights -->
    <div style="float:left;">

        <table cellpadding="10">

            <!-- Row for buttons -->
            <tr>
                <td>
                    <button id="btn-1" class="btn-simon" foo="Something">-- 1 --</button>
                </td>
                <td>
                    <button id="btn-2" class="btn-simon">-- 2 --</button>
                </td>
                <td>
                    <button id="btn-3" class="btn-simon">-- 3 --</button>
                </td>
                <td>
                    <button id="btn-4" class="btn-simon">-- 4 --</button>
                </td>
            </tr>

            <!-- Row for colors -->
            <tr>
                <td>
                    <div id="div-1" class="div-simon"></div>
                </td>
                <td>
                    <div id="div-2" class="div-simon"></div>
                </td>
                <td>
                    <div id="div-3" class="div-simon"></div>
                </td>
                <td>
                    <div id="div-4" class="div-simon"></div>
                </td>
            </tr>
        </table>

    </div>

    <!-- Div containing the giant start button -->
    <div style="float:left; padding-left:20px;">
        <button class="btn-start">Start</button>
    </div>

</div>

</body>
</html>