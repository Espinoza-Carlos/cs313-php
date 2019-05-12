<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Carlos Home Page</title>
<script type="text/javascript" src="DynamicDocuments.js"></script>
<link rel="stylesheet" type="text/css" href="Dynamic%20Documents.css"/>
<style>
    #whole{
    visibility: hidden;
    }
    input:focus{
        background-color: lavender;
    }
        ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
    </style>

</head>
    <img class="centered" title = "carlos" src="carlos%20sport.png" alt = "carlos" width="160px" height="70px">

     <ul>
  <li><a class="active" href="../assignments.html">Return to assignments</a></li>
  
</ul>
    <body onload="startPage()">
   <header> <h1>Get Mother's day special</h1></header>
    <nav id="whole">
                     <div id="contactContent">
            <form action="" onsubmit="submitBtn()" onreset="resetForm()" id = "form">
                <h2>Billing/Shipping information</h2>
                

                <label>First Name:</label><input type="text" id="theFirstName" oninput="validateName(this.value, 'firstName', 'theFirstName')" onfocus="this.value=''" value="First Name"/>
                <span id="firstName" style='color:red'>Invalid First Name</span>
                <br>
                <label>Last Name:</label><input type="text" id="theLastName" oninput="validateName(this.value, 'lastName', 'theLastName')" onfocus="this.value=''"
                value="Last Name"/>
                <span id="lastName" style='color:red'>Invalid Last Name</span>
                <br>
                <label>Address:</label><input type="text" id="theALine" oninput="validateAddress(this.value, 'ALine', 'theALine')" onfocus="this.value=''"
                value="Address" />
                <span id="ALine" style='color:red'>Invalid Address Entry</span>
                <br>
                <label>City:</label><input type="text" id="theCity" oninput="validateAddress(this.value, 'city', 'theCity')" onfocus="this.value=''" value="City" />
                <span id="city" style='color:red'>Invalid City</span>
                <br>
                <label>State:</label><input type="text" id="theState" 
                oninput="validateAddress(this.value, 'state', 'theState')" onfocus="this.value=''" value="CA" />
                <span id="state" style='color:red'>Invalid State (Format: two letter state code, uppercase)</span>
                <br>
                <label>Zip Code:</label><input type="text" id="theZip" oninput="validateAddress(this.value, 'zip', 'theZip')" onfocus="this.value=''" value="00000" />
                <span id="zip" style='color:red'>Invalid Zip (Format: 99999)</span>
                <br>
                <label>Phone Number:</label><input type="text" id="thePhone" oninput="validatePhone(this.value, 'phone', 'thePhone')" onfocus="this.value=''" value="000-000-0000"/>
                <span id="phone" style='color:red'>Invalid Phone Number (Format: 000-000-0000)</span>
                <br>
                <!-- Payment Info -->
                
                <!--The Balance  -->
                <h2>The Balance</h2>
                <div>
                <label>Totals:</label><input type="text" id="totals" value="$0.00" readonly/>
                <input type="button" onclick="calcTotals()" name="totalBtn" value="Update Total" style="padding-right:10px"/>
                </div>
                <!-- submit and reset form -->
                <h2>Submit or Reset Form</h2>
                <div id="formButtons">
                    <input type="submit" value="Submit"/>
                    <input type="reset" value="Reset"/>
                </div>
                </form>
                </div>
               </nav>   

    <section>
        
<div id="shopping">
<input id="button1" onclick="openCart()" type="button" value="go to Cart">
<table id="shopTable">
<tr>
<th class="desc">Item Description</th>
<th class="image">Image</th>
<th class="price">Price</th>
<th class="check">Check to buy</th>
</tr>
    
<tr>
<td>Sole F63 Treadmill</td>
<td><img src="image4.jpg" alt="Sole F63 Treadmill" height="100px"></td>
<td>$800.00</td>
<td><input type="checkbox" onclick="changeColor(1,'s1')" name="s1" id="s1" value="800.00"/>
</td>
</tr>
<tr>
<td>Sole F1 Smart Treadmill</td>
<td><img src="image5.jpg" alt="Sole F1 Smart Treadmill" height="100px"></td>
<td>$900.00</td>
<td><input type="checkbox" onclick="changeColor(2,'s2')" name="s2" id="s2" value="900.00" />
</td>
</tr>
<tr>
<td>Sole F80 Treadmill </td>
<td><img src="image%206.jpg" alt="" height="100px"></td>
<td>$1,200.00</td>
<td><input type="checkbox" onclick="changeColor(3,'s3')" name="s3" id="s3" value="1200.00" />
</td>
</tr>
<tr>
<td>SkillMill Connect </td>
<td><img src="image%207.jpg" alt="Coleman Duel Fuel" height="100px"></td>
<td>$1500.00</td>
<td><input type="checkbox" onclick="changeColor(4,'s4')" name="s4" id="s4" value="1500.00" />
</td>
</tr>
<tr>
<td>Rawlings Youth  </td>
<td><img src="image8.jpg" alt="Rawlings Youth " height="100px"></td>
<td>$19.00</td>
<td><input type="checkbox" onclick="changeColor(5,'s5')" name="s5" id="s5" value="19.00" />
</td>
</tr>
<tr>
                    <td>Easton Youth S450</td>
                    <td><img src="image9.jpg" alt="Easton Youth S450" height="100px"></td>
                    <td>$39.00</td>
                    <td><input type="checkbox" onclick="changeColor(6,'s6')" name="s6" id="s6" value="39.00" /></td>
                </tr>
                <tr>
                    <td>Easton S350 </td>
                    <td><img src="image%2010.jpg" alt="Easton S350" height="100px"></td>
                    <td>$44.00</td>
                    <td><input type="checkbox" onclick="changeColor(7,'s7')" name="s7" id="s7" value="44.00" /></td>
                </tr>
            </table>
        </div>
        
    </section>

              
                  
    
        
    </body>
        
    
</html>