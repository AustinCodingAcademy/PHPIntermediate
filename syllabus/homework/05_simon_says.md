#### Homework 05 - Simon Says Game

We have been asked to create a web based implementation of simon says. We will be creating 4 buttons on a web page, numbered 1-4. 
Each button will have a different colored div underneath it.

![Simon Says UI](../../images/simon_says.png "Simon Says UI")

Here is a scenario on how the game will be played:
 - The user clicks on the start button to start the game, at which time the colored lights disappear
 - The user will click on one button, and the first light will flash
 - The user then clicks on third button, and the first and third light will flash
 - The user then clicks on the second button and the first, third and second lights flash....
 - This process will continue until the user makes a mistake
 
In short, each successive round will play back the results from the prior round, until the user makes a mistake in the sequence. 
If the user makes a mistake in the sequence, display the number of rounds they were able to play and the total time they took to play the game.


```html
<html>
<head>
<link rel="stylesheet" href="style.css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript" language="JavaScript">
    $(document).ready(function(){

        console.log('The document is ready...');
    });
</script>
</head>
<body>

    <h3>Simon Says</h3>

    <hr style="width:50%; float: left;"/>
    <div style="clear:both;"></div>


    <div class="container">

        <div style="float:left;">
            <table cellpadding="10">

                <!-- Row for buttons -->
                <tr>
                    <td>
                        <button id="btn-1" class="btn-simon">-- 1 --</button>
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

        <div style="float:left; padding-left:20px;">

            <button class="btn-start">Start</button>
        </div>

    </div>

</body>
</html>
```