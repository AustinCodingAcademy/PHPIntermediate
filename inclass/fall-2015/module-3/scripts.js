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