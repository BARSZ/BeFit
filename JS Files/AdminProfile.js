//vasil, ask me before moving this to seperate file!

//Gets the array that is JSON encoded from UsersJSON.php
var myObj;
var name;
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        //adds the usernames from the array to the listbox
        for (let i = 0; i < myObj.length; i++) {
            var para = document.createElement("option");
            var node = document.createTextNode(myObj[i]);
            para.appendChild(node);
            var element = document.getElementById("listbox");
            element.appendChild(para);
        }
    }
};
xmlhttp.open("GET", "UsersJSON.php", true);
xmlhttp.send();