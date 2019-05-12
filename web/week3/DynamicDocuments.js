/*************************************************************
* This is the Constructor
* this will start everithing from 0 hide all warnings 
*****************************************************************/
function openCart(){
    document.getElementById("whole").style.visibility="visible"
}

function startPage(){
	 //set the form "error messages" to hidden 
  // var f=0;
 //var l=0;
    //var a=0;
    //var c=0;
    //var s=0;
    //var z=0;
    //var ph=0;
    document.getElementById("firstName").style.visibility = "hidden";
    document.getElementById("lastName").style.visibility = "hidden";
    document.getElementById("ALine").style.visibility = "hidden";
    document.getElementById("city").style.visibility = "hidden";
    document.getElementById("state").style.visibility = "hidden";
    document.getElementById("zip").style.visibility = "hidden";
    document.getElementById("phone").style.visibility = "hidden";
    document.getElementById("creditCard").style.visibility = "hidden";
    document.getElementById("expiration").style.visibility = "hidden";
	document.getElementById("cardType").selectedIndex = 0;
	document.getElementById("dropdown").style.visibility = "hidden";
    //document.getElementById("contactContent").style.display = "none";
    //document.getElementById("contactContent").style.visibility = "hidden";
    //document.getElementById("whole").style.display = "none";
    //document.getElementById("whole").style.visibility = "hidden";
    //document.getElementById("button1").style.visibility="hidden";
    //document.getElementById("button1").style.display ="none";
    document.all.mydiv.style.visibility="hidden";
   
  //this next will set all the checkboxes to unchecked
	document.getElementById("s1").checked = false;
	document.getElementById("s2").checked = false;
	document.getElementById("s3").checked = false;
	document.getElementById("s4").checked = false;
	document.getElementById("s5").checked = false;
	document.getElementById("s6").checked = false;
    document.getElementById("s7").checked = false;
 
	 //this will erase like new the "shopping cart"
	 for(i=1; i <= 7; i++){
	 	document.getElementById("shopTable").rows[i].style.backgroundColor = "transparent";
	 }

	 //this will reset the input form and thir fields
	 resetInput("theFirstName");
	 resetInput("theLastName");
	 resetInput("theALine");
	 resetInput("theCity");
	 resetInput("theState");
	 resetInput("theZip");
	 resetInput("thePhone");
	 resetInput("theCcard");
	 resetInput("theExp");
	 resetInput("thetotals");

	 //put the focus on the first name of shipping form on start/reset
	 document.getElementById("theFirstName").focus();

}

//reset input text font style and text color
function resetInput(theClass){
	document.getElementById(theClass).style.color = "lightgrey";
	document.getElementById(theClass).style.fontStyle = "italic";
	document.getElementById(theClass).style.fontWeight = "bold";
}

//validate Name
function validateName(theName, theClass, secClass){
	var name = /[A-Za-z]/;
	var result = name.test(theName);
	isVisible(result, theClass, secClass);
    f=1;
}

//validate address
function validateAddress(theAddress, theClass, secClass){
	if(theClass == "state"){
		var stateCheck = validateState(theAddress);
		isVisible(stateCheck, theClass, secClass);
	} else if(theClass == "zip"){
			var value = /^\d{5}$/;
			var zipCheck = value.test(theAddress);
			isVisible(zipCheck, theClass, secClass);
	} else{
			//search expression
			var value = /^\w+/;
			//test expression
			var result = value.test(theAddress);
			isVisible(result, theClass, secClass);
		}
} 

//visible or hidden function
function isVisible(trueFalse, theClass, secClass){
	if(trueFalse){
		//if tests passed, hide element
		document.getElementById(theClass).style.visibility = 'hidden';
		document.getElementById(secClass).style.color = "black";
		document.getElementById(secClass).style.fontStyle = "normal";
		document.getElementById(secClass).style.fontWeight = "bold";
			
	}
	else{
		//if all conditions fail, leave element visible
		document.getElementById(theClass).style.visibility = 'visible';
		document.getElementById(secClass).style.color = "grey";
		document.getElementById(secClass).style.fontStyle = "italic";
		document.getElementById(secClass).style.fontWeight = "normal";
	}
}

function isVisibles(trueFalse, theClass){
	if(trueFalse){
		//if tests passed, hide element
		document.getElementById(theClass).style.visibility = 'hidden';		
	}
	else{
		//if all conditions fail, leave element visible
		document.getElementById(theClass).style.visibility = 'visible';
	}
}

//validate phone
function validatePhone(thePhone, theClass, secClass){
	//search expression
	var value = /^(\d{3})-(\d{3})-(\d{4})$/g;
	//test expression
	var result = value.test(thePhone);
	isVisible(result, theClass, secClass);
}


//validate Credit Card
function validateCC(theCC, theClass, secClass){
	//search expression
	var cCard = /^\s?(\d{4}) ?(\d{4}) ?(\d{4}) ?(\d{4})\s?$/;
	//test expression
	var result = cCard.test(theCC);
	isVisible(result, theClass, secClass);
}
//validate expiration date
function validateExp(theExp, theClass, secClass){
	//search expression
	var exp = /^(\d{2})\/(\d{2})$/g;
	//test expression
	var result = exp.test(theExp);
	isVisible(result, theClass, secClass);
}

//validate card select
function validateSelect(theSelect, theClass){
	var result = document.getElementById("cardType").value;
	if(result == ""){
		isVisibles(false, theClass);
	} else {
		isVisibles(true, theClass);
	}
}

//validate State
function validateState(theState, theClass){
	//build state abbreviation array
	var usStates = ['AL','AK','AS','AZ','AR','CA','CO','CT','DE','DC','FM','FL','GA','GU','HI','ID','IL','IN','IA','KS','KY','LA','ME','MH','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','MP','OH','OK','OR','PW','PA','PR','RI','SC','SD','TN','TX','UT','VT','VI','VA','WA','WV','WI','WY'];
    
	//build search expression
	var state = /^\s?\b([A-Z][A-Z])\b\s?$/;
	//test the search
	var result = state.test(theState);
	//check for leading space, if leading space, then just grab the two letters
	if(theState.substring(0,1) == " "){
		var newState = theState.substring(1,3);
	}
	else{
		//else just take the entered value
		var newState = theState;
	}
	//if testing passed determine if the entered abbreviation is valid
	if(result){
		for(i=0; i < usStates.length; i++){
			if(newState == usStates[i]){
								return true;
			}
		}
	}
	else{
		
		return false;
	}
}

//checkbox onclick
function changeColor(theRow, theClass){
    var isChecked = document.getElementById(theClass).checked;
	if(isChecked){
        
		document.getElementById("shopTable").rows[theRow].style.backgroundColor = "lightblue";
	} else {
		document.getElementById("shopTable").rows[theRow].style.backgroundColor = "transparent";
	}
}

//calculate the totals
function calcTotals(){
	var amt = 0;
	for(i=1; i <= 7; i++){
		var myId = "s" + i;
		if(document.getElementById(myId).checked == true){
            
			var workingAmt = Number(amt) + Number(document.getElementById(myId).value);
			amt = workingAmt;
		}
	}
		var newAmt = "$" + amt.toFixed(2);
		document.getElementById("totals").value = newAmt;
		document.getElementById("totals").style.color = "black";
		document.getElementById("totals").style.fontStyle = "normal";
		document.getElementById("totals").style.fontWeight = "bold";
}

//on submit
function submitBtn(){
    
	//var name = /[A-Za-z]/;
//	var result = name.test(theName);
       
//	if(theName ==' ' || theName == 'First Name')
  //      {
//            window.alert("the form need the name")
//        }
//else
  //  {
	window.alert("The form has been submitted");
    //}
    }


//on reset
function resetForm(){
	//call start page to reset everything
	startPage();
}
