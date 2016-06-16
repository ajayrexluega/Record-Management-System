<html>
<head>
    <title>Confirm Dialog Box</title>
    <style>
*{
     margin: 0;
    padding: 0;
    border: 0;
    vertical-align: baseline;
}
table{
    border-collapse: collapse;
    border-spacing: 0;

}
td{
    padding-top: 10px;
    cursor: pointer;
}
#clickrow:hover{
    background-color: #C4CACC;
}
body{
    background-color: #ebebeb;
}
#table-wrapper {
  /*float: right;*/
  
}
#table-scroll {
  height: 400px;
  width: 500px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width: 750px;
    
}
#table-wrapper table * {
  border-bottom: 1px solid #ccc;
  color:black;
  
}
#table-wrapper table thead th .text {
    
  top:-20px;
  
  height:25px;
  width: 190px;
  
}
#tr {
margin-left: 0;
margin-right: 0;

}
#top{
text-align: left;
}

.filter{
  height: 25px;
  border-radius: 3px;
}
.filter:focus{
  border: 1px solid #428bca;
    box-shadow: 1px 1px 1px #428bca;
    outline: 0 none;
  transition: 1s;
}

#dlgbox{
  float: right;
  margin-top: -410px;
  border: 1px solid black;
  border-radius: 5px;
  padding: 10px;

}

        #dlg-header{
            background-color: #6d84b4;
            color: white;
            font-size: 20px;
            padding: 10px;
            margin: 10px 10px 0 10px;
        }

        #dlg-body{
            background-color: white;
            color: black;
            font-size: 14px;
            padding: 10px;
            margin: 0 10px 0 10px;
        }

        #dlg-footer{
            background-color: #f2f2f2;
            text-align: right;
            padding: 10px;
            margin: 0 10px 10px 10px;
        }

        #dlg-footer button{
            background-color: #6d84b4;
            color: white;
            padding: 5px;
            border: 0;
        }
        .submit{
            background-color: #6d84b4;
            color: white;
            padding: 5px;
            border: 0;
        }


        .fname, .lname{
    border: 1px solid #cccccc;
  border-radius: 5px;
  padding-left: 15px;
  width: 200px;
  height: 35px;
  margin-top: 5px;
  font-size: 12pt;
  margin-left: 50px;
  margin-right: 20px;

}
.fname{
  margin-left: 150px;
}
.age{
  border: 1px solid #cccccc;
  border-radius: 5px;
  padding-left: 10px;
  width: 60px;
  height: 35px;
  margin-top: 5px;
  font-size: 12pt;
  margin-left: 50px;
  margin-right: 20px;

}
fieldset{
  border-color: #ccc;
  border-radius: 10px;
  box-shadow: none;
  outline: 0 none;
  

}
#fields{
  float: left;
  
}
.submit{
  width: 90px;
  height: 35px;
  background-color:  #428bca;
  border-radius: 5px;
  cursor:pointer;
  color: #fff;
  border: none;
  margin-bottom: 10px;
  margin-right: 30px;
  float: right;

}
.submit:hover{
  background-color: #337ab7;
}
#move{
  padding-left: 130px;
}
input:focus{
  border: 1px solid #428bca;
    box-shadow: 1px 1px 1px #428bca;
    outline: 0 none;
  transition: .5s;
}
#contact,#email,#id,#description,#price,#quantity{
width: 200px;
height: 30px;
border-radius: 5px;
border: 1px solid #cccccc;
margin-left: 40px;
margin-bottom: 10px;
padding-left: 10px;
}

#contact{
  width: 250px;
}

#email{
  width: 250px;
}
#price{
  width: 90px;
  margin-left: 20px;
}
.datespan{
  margin-left: 40px;
}
#success{
  margin-left: 400px;
  color: green;
}
#id{
  width: 50px;
}
#description{
  margin-left: 20px;
}
#quantity{
  width: 90px;
}
    </style>
</head>
<body>

    
    <h4>Select Below</h4>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter">

<div ng-controller="productslistController">
    <div id='table-scroll'>
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        <!-- <th>Product ID</th>-->
                        <th>Item Name</th>
                        <th>Supplier</th>
                        <th>Supplier's Price</th>
                        <th>Description</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" ng-click="showInEdit(product)" ng-repeat="product in data | filter:searchFilter">
                       <!-- <td><a class="click" ng-click="showInEdit(product)">{{product.product_id}}</a></td> -->
                        <td><a class="click" ng-click="showInEdit(product)">{{product.product_name}}</td>
                        <td><a class="click" ng-click="showInEdit(product)">{{product.supplier}}</td>
                        <td><a class="click" ng-click="showInEdit(product)">{{product.price}}</td>
                        <td><a class="click" ng-click="showInEdit(product)">{{product.description}}</td>
                       
                    </tr>
                </tbody>
            </table>
            
          </div>
        </div>



<div id="dlgbox">
    <div id="dlg-header" ><h3>Add New Item to Inventory</h3>
      
    </div>
    
    <div id="dlg-body">
    <h2></h2>
    <form id="products" method="post" action="../php/addItemToInventory.php">
      <input type="text" name="product_id" id="id" ng-model="selectedProduct.product_id" hidden required><br/>
          <h5><center>Click row in table to fill the fields.</center></h5>
         Product<input type="text" name="product_name" id="contact" ng-model="selectedProduct.product_name"  required><br/>
         Supplier<input type="text" name="supplier" id="contact" ng-model="selectedProduct.supplier" ><br/>
         Description<input type="text" name="description" id="description" ng-model="selectedProduct.description" ><br />
         Selling Price<input type="text" name="price" id="price" ng-model="selectedProduct.price" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));" autocomplete="off" required><br/>
         Quantity<input type="text" class="addQuantity" name="stock_in" id="quantity" onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));" autocomplete="off" required><br/>
         
         
         
      <input id="submit" class="submit" type="submit" name="submit" value="Add">
    </form>
    </div>
    <div id="dlg-footer">
        <br/><br/>
        
    </div>
</div>

<script src="../js/angular.min.js"></script>
<script src="../js/angular-route.min.js"></script>
<script src="../js/app.js"></script>

<script type="text/javascript">
      


 $(document).ready(function(){

    
    $('#products').submit(function(){
          

                  $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                                    $('h2').html(data);
                            }

                  });

                event.preventDefault();
         });
});﻿


</script>