/*
This source is shared under the terms of LGPL 3
www.gnu.org/licenses/lgpl.html

You are free to use the code in Commercial or non-commercial projects
*/

 //Set up an associative array
 //The keys represent the size of the cake
 //The values represent the cost of the cake i.e A 10" cake cost's $35
 var cake_prices = new Array();
 cake_prices["Round6"]=20;
 cake_prices["Round8"]=25;
 cake_prices["Round10"]=35;
 cake_prices["Round12"]=75;
 
 //Set up an associative array 
 //The keys represent the filling type
 //The value represents the cost of the filling i.e. Lemon filling is $5,Dobash filling is $9
 //We use this this array when the user selects a filling from the form
 var filling_prices= new Array();
 filling_prices["None"]=0;
 filling_prices["Borrower"]=1;
 filling_prices["Guarantor"]=2;
 filling_prices["Third"]=3;
 
	 
	 
// getCakeSizePrice() finds the price based on the size of the cake.
// Here, we need to take user's the selection from radio button selection
function getCakeSizePrice()
{  
    var cakeSizePrice=0;
    //Get a reference to the form id="cakeform"
    var theForm = document.forms["safees"];
    //Get a reference to the cake the user Chooses name=selectedCake":
    var selectedCake = theForm.elements["demand"];
    //Here since there are 4 radio buttons selectedCake.length = 4
    //We loop through each radio buttons
    //for(var i = 0; i < selectedCake.length; i++)
    //{
        //if the radio button is checked
      //  if(selectedCake[i].checked)
        //{
            //we set cakeSizePrice to the value of the selected radio button
            //i.e. if the user choose the 8" cake we set it to 25
            //by using the cake_prices array
            //We get the selected Items value
            //For example cake_prices["Round8".value]"
            cakeSizePrice = selectedCake.value;
            //If we get a match then we break out of this loop
            //No reason to continue if we get a match
            //break;
        //}
    //}
    //We return the cakeSizePrice
    return cakeSizePrice;
}

//This function finds the filling price based on the 
//drop down selection
function getFillingPrice()
{
    var cakeFillingPrice=0;
    //Get a reference to the form id="cakeform"
    var theForm = document.forms["safees"];
	//var selectedCake = theForm.elements["demand"];
    //Get a reference to the select id="filling"
     var selectedFilling = theForm.elements["appcategory"];
	cakeFillingPrice = filling_prices[selectedFilling.value];
     //var strcakeFillingPrice = selectedFilling.value;

	//If (cakeFillingPrice == 1) 
	//{
	//Var strAmt = 100000;
	//}
	//Else
	//{
	//Var strAmt = 500;
	//}	

    //set cakeFilling Price equal to value user chose
    //For example filling_prices["Lemon".value] would be equal to 5
    //cakeFillingPrice = selectedFilling.value;
	//cakeFillingPrice = strAmt;
    //finally we return cakeFillingPrice
    return cakeFillingPrice;
}

//candlesPrice() finds the candles price based on a check box selection
function candlesPrice()
{
    var candlePrice=0;
    //Get a reference to the form id="cakeform"
    //var theForm = document.forms["cakeform"];
    //Get a reference to the checkbox id="includecandles"
    //var includeCandles = theForm.elements["includecandles"];
//var strAmt = getcakeFillingPrice();

	If strAmt == 1
		{
	candlePrice = 10000;
		}

    //If they checked the box set candlePrice to 5
    if(includeCandles.checked==true)
    {
        candlePrice=5;
    }
    //finally we return the candlePrice
    return candlePrice;
}

function insciptionPrice()
{
    //This local variable will be used to decide whether or not to charge for the inscription
    //If the user checked the box this value will be 20
    //otherwise it will remain at 0
    var inscriptionPrice=0;
    //Get a refernce to the form id="cakeform"
    var theForm = document.forms["cakeform"];
    //Get a reference to the checkbox id="includeinscription"
    var includeInscription = theForm.elements["includeinscription"];
    //If they checked the box set inscriptionPrice to 20
    if(includeInscription.checked==true){
        inscriptionPrice=20;
    }
    //finally we return the inscriptionPrice
    return inscriptionPrice;
}
        
function calculateTotal()
{
    //Here we get the total price by calling our function
    //Each function returns a number so by calling them we add the values they return together
    var cakePrice = getCakeSizePrice();
// getCakeSizePrice() + getFillingPrice() + candlesPrice() + insciptionPrice();
    
    //display the result
    var divobj = document.getElementById('totalPrice');
    divobj.style.display='block';
    divobj.innerHTML = "Rs."+cakePrice;

}

function hideTotal()
{
    var divobj = document.getElementById('totalPrice');
    divobj.style.display='none';
}