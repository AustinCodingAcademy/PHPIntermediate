03 - Web Programming
===============
>Now that we are comfortable with strings, functions and arrays we will dive right into understanding how PHP can be used to build web applications. 
>Although now PHP has evolved into a language that can do more than just build the web, it was originally designed as a web development language. 
>This week, we will look at how easy it is to build a page, style it, create a form, collect user input and persist state using sessions.

***

#### HTML
Hyper Text Markup Language is the language used to design and represent every website you see on the internet today, regardless of the back end language used to generate it. 
The final product is a structured set of XML ish data with open and close tags that serve a variety of purposes. Markup can be used to break up a document into parts, 
structure each part, create form controls, and style elements in conjunction with Cascading Style Sheets.

A HTML document has the following structure
```html
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
</body>
</html>
```

Stuff between the ```<style type="text/css">``` and ```</style>``` tags is ```CSS```, and is used to style elements on a page. 
The code between ```<script type="text/javascript" language="javascript">``` and ```</script>``` is called ```javascript``` and is used to add incredibly powerful dynamic functionality to your web application. 
Learning javascript is essential to becoming a successful web applications developer. Markup between the ```<body>``` and ```</body>``` tags is the content of the page 
and usually is a combination of text, images and form controls all styled by ```CSS``` and brought to life using ```javascript```. 
You can attach an event to a button, or any other element on the page for that matter, and run a custom javascript function when the event fires. 
In this case we have created a function called ```myClickFunction()``` that gets called when the user clicks the button. 
This works because the function is attached to the ```onclick``` event for that particular button.  

#### Scaffolding using bootstrap
[Bootstrap](http://getbootstrap.com/) is a CSS and javascript library that is used to create responsive layouts effortlessly.
 
* Adding style using CSS
* Dynamic behavior using the power of javascript and jQuery
* Collecting user input using forms
* Using cookies to store local data and maintain state
* Using sessions
