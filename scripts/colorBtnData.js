var blueBtn = document.getElementById("blueBtn");
var animaldiv = document.getElementById("animalList");
var pageCounter = 1;
var btnEnabler = document.getElementById("btnEnabler");
var greenBtn = document.getElementById("greenBtn");
var redBtn = document.getElementById("redBtn");
var formGET = document.getElementById("getForm");
var formPOST = document.getElementById("postForm");


greenBtn.addEventListener("click", getName);
redBtn.addEventListener("click", loadUsers)
formGET.addEventListener("submit", getName);
formPOST.addEventListener("submit", postName);

blueBtn.addEventListener("click", function(){
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-' + pageCounter + '.json');
    ourRequest.onload = function(){
        if (ourRequest.status >= 200 && ourRequest.status < 400){
            var ourData = JSON.parse(ourRequest.responseText);
            printOnHTML(ourData);
        } else {
            console.log("We connected to the server but it returned an error. Request status" + ourRequest.status);
        }
    };

    ourRequest.onerror = function(){
        console.log("Connection Error");
    }
    ourRequest.send();
    pageCounter++;
    if (pageCounter>3){
        btnEnabler.innerHTML = "Habilitar botón azul";
        blueBtn.disabled = true;
        btnEnabler.disabled = true;
        greenBtn.disabled = false;
    }
});

function printOnHTML(data){
    var htmlString = "";
    //Alternatively for (var i in data)
    for (i = 0; i < data.length; i++){
        htmlString += "<p>" + data[i].name + " es un " + data[i].species + " que le gusta ";
        for (var ii in data[i].foods.likes) {
            if (ii != 0 && ii == data[i].foods.likes.length - 1){
                htmlString += " and ";
            }
            htmlString += data[i].foods.likes[ii];
            if (ii < data[i].foods.likes.length - 1){
                htmlString += ", ";
            }
        }
        htmlString += " pero no le gusta ";

        for (ii = 0; ii < data[i].foods.dislikes.length; ii++) {
            if (ii != 0 && ii == data[i].foods.dislikes.length - 1){
                htmlString += " and ";
            }
            htmlString += data[i].foods.dislikes[ii];
            if (ii < data[i].foods.dislikes.length - 1){
                htmlString += ", ";
            }
        }

        htmlString += ".</p>"
    }

    animaldiv.insertAdjacentHTML('beforeend', htmlString);
}

btnEnabler.addEventListener("click", function(){
    if (blueBtn.disabled){
        blueBtn.disabled = false;
        btnEnabler.innerHTML = "Habilitar botón verde";
        greenBtn.disabled = true;
    } else {
        blueBtn.disabled = true;
        btnEnabler.innerHTML = "Habilitar botón azul";
        greenBtn.disabled = false;
    }
});

function getName(e){
    e.preventDefault();

    var yourName = document.getElementById("yourName1").value;

    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'scripts/process.php?yourName=' + yourName, true);
    ourRequest.onload = function(){
        if (ourRequest.status >= 200 && ourRequest.status < 400){
            console.log(this.responseText)
        } else {
            console.log("We connected to the server but it returned an error. Request status" + ourRequest.status);
        }
    };

    ourRequest.onerror = function(){
        console.log("Connection Error");
    }
    ourRequest.send();
}

function postName(e){
    e.preventDefault();

    var yourName = document.getElementById("yourName2").value;
    var params = "yourName="+yourName;

    var ourRequest = new XMLHttpRequest();
    ourRequest.open('POST', 'scripts/process.php', true);
    ourRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ourRequest.onload = function(){
        if (ourRequest.status >= 200 && ourRequest.status < 400){
            console.log(this.responseText)
        } else {
            console.log("We connected to the server but it returned an error. Request status" + ourRequest.status);
        }
    };

    ourRequest.onerror = function(){
        console.log("Connection Error");
    }
    ourRequest.send(params);
}

function loadUsers(){
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'scripts/users.php');

    ourRequest.onload = function(){
        if (ourRequest.status >= 200 && ourRequest.status < 400){
            var ourData = JSON.parse(this.responseText);
            var outPut = "";

            for (var i in ourData){
                outPut += '<ul>' +
                '<li>ID: ' + ourData[i].id + '</li>' +
                '<li>Their Name: ' + ourData[i].theirName + '</li>' +
                '</ul>';
            }

            document.getElementById('usersList').innerHTML = outPut;

        } else {
            console.log("We connected to the server but it returned an error. Request status" + ourRequest.status);
        }
    }

    ourRequest.onerror = function(){
        console.log("Connection Error");
    }
    ourRequest.send();
}