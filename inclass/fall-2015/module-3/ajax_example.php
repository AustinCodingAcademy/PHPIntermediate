<html>

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>

        $(document).ready(function () {

            // Bind to the click event of the button
            // In this case 'click' is the event, on the button
            // The second argument is what happens when the button is clicked
            $("#btn-fetch-data").on('click', function () {

                // We need to get data from the server
                // Display it in the console!
                $.ajax({
                    url: "server_data.php",
                    dataType: "json",
                    method: "POST",
                    data: {
                        action: 'get_scores',
                        student: 'Samir Patel'
                    },
                    success: function (foo) {

//                        var arr = {'name' : 'cat'};
//
//                        console.info(arr['name']);
//                        return false;

//                        for(key in jsonData){
//
//                            console.log('key=' + key);
//                            console.log('value=' + jsonData[key]);
//                        }

                        // This is where I can access each piece of the data
                        var name = foo['name'];
                        var time = foo['time'];

                        $("#div-data").append(name + ' ' + time + '<br/>');

                        console.log('name = ' + name);
                        console.log('time = ' + time);
                    }
                });

            });

        });

    </script>

</head>

<body>

<input type="button" value="Fetch Data" class="cls-buttonz" id="btn-fetch-data"/>

<div id="div-data"></div>

</body>

</html>
