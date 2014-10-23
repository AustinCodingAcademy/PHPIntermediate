<!DOCTYPE html>
<html>
<head>
    <!-- This is where your JS and CSS references go -->
    <style type="text/css">
        body {
            font-family: verdana;
        }

        .inputbox {
            font-size: 1.2em;
            color: orange;
        }
    </style>

    <script type="text/javascript" language="javascript">

        /**
         * When a user clicks the button, this function gets called
         */
        function myClickFunction() {

            var person_name = document.getElementById('pname').value;

            // If they didn't enter a name, show an error message
            if (person_name == "") {
                alert('Please enter a person name');
            } else {
                alert('You entered ' + person_name);
            }
        }
    </script>
</head>
<body>

<h3>HTML is cool</h3>

Enter Name: <input type="text" name="person_name" id="pname" size="20" class="inputbox"/>

<br/> <!-- This is a HTML comment -->

<input type="button" value="Click Me" onclick="myClickFunction();" class="inputbox"/>

<input type="radio" name="yesOrNo" value="Yes"/> Yes
<input type="radio" name="yesOrNo" value="No"/> No

<input type="checkbox" name="coursesTaken[]" value="PHP"/> PHP
<input type="checkbox" name="coursesTaken[]" value="MySQL"/> MySQL
<input type="checkbox" name="coursesTaken[]" value="Python"/> Python

<select name="animals">
    <option value="Human">Human</option>
    <option value="Monkey">Monkey</option>
    <option value="Goat">Goat</option>
    <option value="Whale">Whale</option>
</select>

<form enctype="multipart/form-data"

</body>
</html>