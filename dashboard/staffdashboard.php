<?php
include '../php/session.php';
include '../php/monitorMembershipupdate.php';
include '../php/monitorSubscriptionupdate.php';

if(isset($_SESSION) ){
        if(!$_SESSION['username']=='admin'){
                header("Location:../index.php?id=access_forbidden");
        }
}else{
header("Location:../adminpanel/admin.php?id=access_forbidden");
}
?>
<html ng-app="myApp">
<head>
	<title>Staff's Dashboard</title>
	<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="../css/jquery-ui.css">
	
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
	
	<script src="../js/angular.min.js"></script>
	<script type="text/javascript" src="../js/app.js"></script>
	<script src="../js/angular-route.min.js"></script>

	
<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$('#timeDate').load('../dashboard/time.php')
			},1000);

		});
	</script>
	
</head>
<body>

	<header>

		<div class="logo"><a href="#/profile"><span>WORKOUT </span>FITNESS CENTER</a>

			<span id="timeDate" class="time">00 : 00 : 00 PM</span>


		</div>
		
		<div class="user">Welcome,  <?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; echo "!"; ?></div>
	</header>
	<div id="container">

		<nav>
			<ul>
				<li class="show-sub walkin"><a>Walk-In<span class="sub-arrow"></span></a>
					<ul>
						   	<li><a href="#/">Log</a></li>
    						<li><a href="#/loglist" my-refresh>Log List</a></li>
    						<li><a id="load" href="#/subscriptionMonitoring">Customer Records</a></li>
    						
					  </ul>  
					 
				</li>
				<li class="show-sub member"><a>Membership<span class="sub-arrow"></span></a>				
 					 <ul>
						   	<li><a id="load" href="#/addmember">Add Member</a></li>
    						<li><a href="#/memberslist">Members List</a></li>
    						<!--<li><a href="#/addsubscription">Add Subscription</a></li>-->
					  </ul>       
				</li>

				<li class="show-sub monitoring"><a>Monitoring<span class="sub-arrow"></span></a>				
 					 <ul>
						   	
    						<li><a href="#/membershipMonitoring">Membership</a></li>
    						<!--<li><a href="#/outofStock">Out of Stocks</a></li>-->
    						<!--<li><a href="#/stocksExpiration">Stocks Expiration</a></li>-->
    						
					  </ul>       
				</li>

				<!--<li class="show-sub gymfees"><a href="#/gymfees">Manage Gym Fee<span class="sub-arrow"></span></a>
						<ul>
						   	<li><a href="#/gymsales">Gym Payment</a></li>
    						<li><a >Add Gym Fee</a></li>
    						
					  </ul> 
					

				</li>-->

				<li class="show-sub sales"><a>Purchase Item<span class="sub-arrow"></span></a>

					<ul>
						   	
    						<li><a href="#/productsales">Customer Purchase Item</a></li>
    						<!--<li><a href="#/suppliersales">Purchase Item to Supplier</a></li>-->
					  </ul>  

				</li>
				<li class="show-sub inventory"><a>Inventory<span class="sub-arrow"></span></a>

					<ul>
						   	<li><a href="#/inventorylist">Item Stocks</a></li>
    						<!--<li><a href="#/delivery">Add New Item Stocks</a></li>
    						<li><a href="#/updatestocks">Add Stocks in Existing Item</a></li>-->
    						<!--<li><a href="#/addItemInventory">Add Stocks</a></li>-->
    						<!--<li><a href="#/returnItems">Return Item</a></li>-->
					  </ul>  

				</li>
				<!--<li class="show-sub supplier"><a>Supplier<span class="sub-arrow"></span></a>

					<ul>
						   	<li><a href="#/addsupplier">Add Supplier</a></li>
    						<li><a href="#/addsupplierproduct">Add Supplier's Product</a></li>
    						<li><a href="#/purchasedItemsSupplier">Purchased Orders</a></li>
    						<li><a href="#/deliveredItems">Delivered Items</a></li>
    						<li><a href="#/productslist">Products List</a></li>
					  </ul>  

				</li>-->
				<li class="show-sub report"><a>Reports<span class="sub-arrow"></span></a>

					<ul>
						   	<li><a href="#/walkinReport">Walk-in Report</a></li>
    						<li><a href="#/inventoryReport">Inventory Report</a></li>
    						<li><a href="#/salesReport">Sales Report</a></li>
					  </ul>  

				</li>
				<!--<li class="show-sub useraccounts"><a>User Accounts<span class="sub-arrow"></span></a>

					<ul>
						   	<li><a href="#/addnewaccount">Add New Account</a></li>
    						<li><a href="#/userslist">List of Users</a></li>
    						
					  </ul>  

				</li>-->
				<li class="show-sub account"><a>Account Settings<span class="sub-arrow"></span></a>

					<ul>
						   	<li><a href="#/profile">Profile</a></li>
    						<li><a href="#/changepass">Change Password</a></li>
    						<li><a href="" onclick="btnLogoutYes()">Logout</a></li>
					  </ul>  

				</li>
			</ul>
			<p id="logoutYesNo">Are you sure you want to Logout?<button id="logoutYes" onclick="btnLogoutYes()">Yes</button><button id="logoutNo" onclick="btnLogoutNo()">No</button></p>
		</nav>

		<div id="content">
			<div id="showcontent" ng-view>
			</div>
			
		</div>
	</div>
	

<script type="text/javascript" src="../js/dropdown.js"></script>
<script type="text/javascript">
function Logout(){

       
         var yesNo = document.getElementById("logoutYesNo");
          yesNo.style.display = "block";

          
       
    }

    function btnLogoutYes(){

                  window.location.assign("../php/logout.php");
                  yesNo.style.display = "none";
                  disable.style.display = "none";
                  

    }

    function btnLogoutNo(){
         var yesNo = document.getElementById("logoutYesNo");
          yesNo.style.display = "none";


    }

</script>
	
</body>
</html>