function disapear() {
    var x = document.getElementById("disapear");
    if(x.innerHTML === "That the image has jquery, and this text if you click on it. the text  will disapear with java"){
     x.innerHTML = "I just trick you I didn't disapear";
        } else {
            x.innerHTML = "I didn't trick you";
        }
  
}