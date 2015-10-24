<html>

<head>

    <!--        JS goes here-->

    <script>

        function doWork() {

            var personName = document.getElementById('person_name').value;
            var hangOut = document.getElementsByName('hang_out');
            var checkedValue = null;

            for (var i = 0; i < hangOut.length; i++) {

                var piece = hangOut[i];

                if (piece.checked) {
                    checkedValue = piece.value;
                }
            }

            alert(personName + checkedValue);
        }

    </script>

</head>

<body>

        <pre>
Make a webpage that has three radio buttons: yes, no, maybe so

Have a textbox right under it with a "name" label

And then have a button, when clicked, displays a message that says

{Yes|no|maybe so} we can hang out {name}
        </pre>

        Wanna hang out with

        <input type="text" name="person_name" id="person_name"/>

        <input type="radio" name="hang_out" value="Yes"> Yes
        <input type="radio" name="hang_out" value="No"> No
        <input type="radio" name="hang_out" value="Maybe So"> Maybe So

        <input type="button" value="Click me" onclick="doWork()"/>


        <!--        Fields go here-->

</body>

</html>