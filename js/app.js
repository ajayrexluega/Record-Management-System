var myApp = angular.module('myApp', ['ngRoute']);

myApp.filter('positive', function() {
        return function(input) {
            if (!input) {
                return 0;
            }

            return Math.abs(input);
        };
    });


myApp.config(function ($routeProvider){

	$routeProvider
    //walkin

	.when('/', {
		templateUrl: '../dashboard/pages/walkinLog.php',
		controller: 'mainController'

	})

	.when('/loglist', {
		templateUrl: '../dashboard/pages/loglist.php',
		controller: 'loglistController',

		

	})

    //membership

	.when('/addmember', {
		templateUrl: 'pages/addmember.php',
		controller: 'addmemberController',

		

	})

	.when('/memberslist', {
		templateUrl: 'pages/memberslist.php',
		controller: 'memberslistController',

		

	})

    .when('/addsubscription', {
        templateUrl: 'pages/addsubscription.php',
        controller: 'subscriptionsController',

        

    })

    //gym fees

    .when('/gymfees', {
        templateUrl: 'pages/gymfees.php',
        controller: 'gymfeesController',

        

    })

    //monitoring

    .when('/subscriptionMonitoring', {
        templateUrl: 'pages/monitorSubscription.php',
        controller: 'subscriptionMonitoringController',

        

    })

    .when('/membershipMonitoring', {
        templateUrl: 'pages/monitorMembership.php',
        controller: 'membershipMonitoringController',

        

    })

    .when('/outofStock', {
        templateUrl: 'pages/outofstocklist.php',
        controller: 'outofStockController',

        

    })

    .when('/stocksExpiration', {
        templateUrl: 'pages/stocksExpiration.php',
        controller: 'stocksExpirationController',

        

    })



    //sales

    .when('/gymsales', {
        templateUrl: 'pages/gymsales.php',
        controller: 'gymsalesController',

        

    })

    .when('/productsales', {
        templateUrl: 'pages/productsales.php',
        controller: 'productsalesController',

        

    })

    .when('/proceed', {
        templateUrl: 'pages/paymentqueue.php',
        controller: 'paymentQueueController',

        

    })

    .when('/suppliersales', {
        templateUrl: 'pages/suppliersales.php',
        controller: 'suppliersalesController',

        

    })

    .when('/proceedsupplier', {
        templateUrl: 'pages/supplierpaymentqueue.php',
        controller: 'supplierQueueController',

        

    })

    //supplier

    .when('/addsupplier', {
        templateUrl: 'pages/addsupplier.php',
        controller: 'supplierController',

        

    })

    .when('/addsupplierproduct', {
        templateUrl: 'pages/addsupplierproduct.php',
        controller: 'addsupplierproductController',

        

    })

    .when('/purchasedItemsSupplier', {
        templateUrl: 'pages/purchasedItemsSupplier.php',
        controller: 'purchasedItemsSupplierController',

        

    })

    .when('/proceedDeliverypage', {
        templateUrl: 'pages/proceedDeliverypage.php',
        controller: 'proceedDeliverypageController',

        

    })

    .when('/deliveredItems', {
        templateUrl: 'pages/deliveredItems.php',
        controller: 'deliveredItemsController',

        

    })



    /*.when('/productslist', {
        templateUrl: 'pages/productslist.php',
        controller: 'productslistController',

        

    })*/

    //inventory

    .when('/inventorylist', {
        templateUrl: 'pages/inventorylist.php',
        controller: 'inventorylistController',

        

    })

    .when('/delivery', {
        templateUrl: 'pages/delivery.php',
        controller: 'deliveryController',

        

    })

     .when('/updatestocks', {
        templateUrl: 'pages/addnewstocks.php',
        controller: 'updatestocksController',

        

    })

     .when('/addItemInventory', {
        templateUrl: 'pages/addItemInventory.php',
        controller: 'addItemInventoryController',

        

    })

     .when('/returnItems', {
        templateUrl: 'pages/returnItems.php',
        controller: 'returnItemsController',

        

    })

     //user accounts

     .when('/addnewaccount', {
        templateUrl: 'pages/addnewaccount.php',
        controller: 'addnewaccountController',

        

    })
      .when('/userslist', {
        templateUrl: 'pages/userslist.php',
        controller: 'userslistController',

        

    })

      //account settings

       .when('/profile', {
        templateUrl: 'pages/profile.php',
        controller: 'profileController',

        

    })

       .when('/changepass', {
        templateUrl: 'pages/changepass.php',
        controller: 'changepassController',

        

    })

       //report

       .when('/walkinReport', {
        templateUrl: 'pages/walkinReport.php',
        controller: 'loglistController',

        

    })
       .when('/inventoryReport', {
        templateUrl: 'pages/inventoryReport.php',
        controller: 'inventorylistController',

        

    })
       .when('/salesReport', {
        templateUrl: 'pages/salesReport.php',
        controller: 'salesVaultController',

        

    })



	


});



myApp.controller('userslistController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedUser={ id:"", firstname:"",lastname:"",gender:"", address:"",contact:"",email:"",type:"",status:"",
            username:"", password:"", secret_question:"",secret_answer:"" };

            $http.get("../php/userslistdata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(user_accounts){
                $scope.selectedUser = user_accounts;
     };

                

 }]);

myApp.controller('mainController', ['$scope', '$log','$location','$route', function($scope, $route,$log){



}]);

myApp.controller('profileController', ['$scope', '$log','$location','$route', function($scope, $route,$log){



}]);

myApp.controller('loglistController', ['$scope', '$http', function ($scope, $http) {
            
	

            $scope.data=[];
            $scope.selectedMember={ firstname:"",lastname:"",gender:"",type:"" };

            $http.get("../php/loglistajax.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(member){
                $scope.selectedMember = member;
     };

                

 }]);

myApp.controller('loglistWalkinController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedWalkin={id:"", firstname:"",lastname:"",gender:""};

            $http.get("../php/loglistajaxwalkin.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(walkin_member){
                $scope.selectedWalkin = walkin_member;
     };


 }]);

myApp.controller('loglistWalkinReportController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedWalkin={id:"", firstname:"",lastname:"",gender:""};

            $http.get("../php/loglistajaxwalkinReport.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(walkin_member){
                $scope.selectedWalkin = walkin_member;
     };


 }]);


myApp.controller('addmemberController', ['$scope', '$http', function ($scope, $http) {
        $http.get("../php/addmemberfeedata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

        
    }]);


//OUT OF STOCK CONTROLLER
myApp.controller('outofStockController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            

            $http.get("../php/outofstocks.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(outofStock){
                $scope.selectedOItem = outofStock;
     };

 }]);

myApp.controller('memberslistController', ['$scope', '$http', function ($scope, $http) {
            
	

            $scope.data=[];
            $scope.selectedMember={ firstname:"",lastname:"",gender:"",type:"" };

            $http.get("../php/membershipdata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(member){
                $scope.selectedMember = member;
     };

 }]);


//MONITORING

myApp.controller('subscriptionMonitoringController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedCustomer={ firstname:"",lastname:"",gender:"",type:"" };

            $http.get("../php/monitorSubscriptiondata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(customer_avail){
                $scope.selectedCustomer = customer_avail;
     };

 }]);

myApp.controller('membershipMonitoringController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedMember={ firstname:"",lastname:"",gender:"",type:"" };

            $http.get("../php/monitorMembershipdata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(member){
                $scope.selectedMember = member;
     };

 }]);


//GYM FEE


myApp.controller('gymsalesController', ['$scope', '$http', function ($scope, $http) {
            
    
            $scope.gymsales = 'gym payment';
            $scope.data=[];
            $scope.selectedMember={ firstname:"",lastname:"",gender:"",type:"" };

            $http.get("../php/gymsales.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(sales){
                $scope.selectedMember = sales;
     };

        
 }]);


myApp.controller('productsalesController', ['$scope', '$http', function ($scope, $http) {
            
    
            
            $scope.data=[];
            $scope.selectedItem={ product_name:"",price:"",available_stocks:""};

            $http.get("../php/inventorydata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(inventory){
                $scope.selectedItem = inventory;

     };

     

        
 }]);


myApp.controller('paymentQueueController', ['$scope', '$http', function ($scope, $http) {
            
    
            
            $scope.data=[];
            $scope.selectedQueue={ id:"", product_name:"",price:"",available_stocks:"",description:""};

            $http.get("../php/paymentQueuedataItem.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(payment_queue){
                $scope.selectedQueue = payment_queue;
     };

     $scope.totalPrice = function(){
            var total = 0;
            for(count=0;count<$scope.data.length;count++){
                total += parseFloat($scope.data[count].total_amount,10);
            }
            return total.toFixed(2);
        };

        
 }]);


myApp.controller('suppliersalesController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedProduct={ product_id:"", product_name:"",supplier:"",price:"",description:"" };

            $http.get("../php/suppliersalesdata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(products){
                $scope.selectedProduct = products;
     };

               

 }]);


myApp.controller('supplierQueueController', ['$scope', '$http', function ($scope, $http) {
            
    
            
            $scope.data=[];
            $scope.selectedQueue={ id:"", product_name:"",price:"",available_stocks:""};

            $http.get("../php/paymentQueuedata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(payment_queue){
                $scope.selectedQueue = payment_queue;
     };

     $scope.totalPrice = function(){
            var total = 0;
            for(count=0;count<$scope.data.length;count++){
                total += parseInt($scope.data[count].total_amount,10);
            }
            return total;
        };

        
 }]);


myApp.controller('gymfeesController', ['$scope', '$http', function ($scope, $http) {
   
                
            $scope.data= [];
            $scope.selectedGymfee={ id:"",gym_typ:"",gym_fee:"" };
            
             $http.get("../php/gymfees.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(gym_fees){
                $scope.selectedGymfee = gym_fees;
                  };

                
}]);

myApp.controller('gymfeelistController', ['$scope', '$http', function ($scope, $http) {
   
               
            $scope.data=  {
    repeatSelect: null,
    availableOptions: [ {gym_type:'', gym_fee:''} ],
   };

            
             $http.get("../php/gymfees.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                
}]);


myApp.controller('gymfeelist2Controller', ['$scope', '$http', function ($scope, $http) {
   
               
            $scope.data=  {
    repeatSelect: null,
    availableOptions: [ {gym_type:'', gym_fee:''} ],
   };

            
             $http.get("../php/gymfees2.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                
}]);


myApp.controller('subscriptionsController', ['$scope', '$http', function ($scope, $http) {
   
                
            $scope.data= [];
            $scope.selectedSubscription={ id:"",subscription_name:"",description:"" };
            
             $http.get("../php/subscriptions.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(subscription){
                $scope.selectedSubscription = subscription;
                  };

                
}]);

myApp.controller('subscriptionlistController', ['$scope', '$http', function ($scope, $http) {
   
               
            $scope.data=  {
    repeatSelect: null,
    availableOptions: [ {subscription_name:'', description:''} ],
   };

            
             $http.get("../php/subscriptions.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                
}]);


myApp.controller('supplierController', ['$scope', '$http', function ($scope, $http) {
            
    
            
            $scope.data=[];
            $scope.selectedSupplier={ supplier_name:"",supplier_address:"",contact:"",email:"" };

            $http.get("../php/supplierdata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(suppliers){
                $scope.selectedSupplier = suppliers;
     };

                

 }]);


myApp.controller('addsupplierproductController', ['$scope', '$http', function ($scope, $http) {
            
    
            
            $scope.data=[];
            $scope.selectedSupplier={ supplier_name:"",supplier_address:"",contact:"",email:"" };

            
             $http.get("../php/supplierdata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(suppliers){
                   $scope.selectedSupplier = suppliers;
                    };




            
 }]);

myApp.controller('productslistController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedProduct={ product_id:"", product_name:"",supplier:"",price:"+",description:"" };

            $http.get("../php/supplierproductdata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(product){
                $scope.selectedProduct = product;
     };

               

 }]);

myApp.controller('purchasedItemsSupplierController', ['$scope', '$http', function ($scope, $http) {
   
               
            $scope.data=[];
            $scope.selectOrderedItemsSupplier={id:'', pi_number:'', order_date:'', amount:'', processed_by:''};
            

            
             $http.get("../php/ordered_items_supplier.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(orderedItemsSupplier){
                $scope.selectedOrderedItemsSupplier = orderedItemsSupplier;
                     };

                
}]);

myApp.controller('purchasedItemslistController', ['$scope', '$http', function ($scope, $http) {
   
               
            $scope.data=[];
            $scope.selectOrderedItemsSupplier={id:'', pi_number:'', order_date:'', amount:'', processed_by:''};

            
             $http.get("../php/purchasedItemSList.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(orderedItemsSupplier){
                $scope.selectedOrderedItemsSupplier = orderedItemsSupplier;
                     };

                
}]);

myApp.controller('proceedDeliverypageController', ['$scope', '$http', function ($scope, $http) {
   
               
            $scope.data=[];
            $scope.selectedProcessItem={product_name:'', description:'', quantity:''};

            
             $http.get("../php/proceedDeliverydata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(processDelivery){
                $scope.selectedProcessItem = processDelivery;
                     };

                
}]);

myApp.controller('deliveredItemsController', ['$scope', '$http', function ($scope, $http) {
   
               
            $scope.data=[];
            $scope.selectedDeliveredItem={id:"",pi_number:"", product_id:"", product_name:"",quantity:"",description:"",
            delivered_date:"",approved_by:"",supplier:"",quantity_received:"" };

            
             $http.get("../php/delivered_itemsdb.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(delivered_items){
                $scope.selectedDeliveredItem = delivered_items;
                     };

                
}]);


myApp.controller('deliveredItemsController2', ['$scope', '$http', function ($scope, $http) {
   
               
            $scope.data=[];
            $scope.selectedDeliveredItem={id:"",pi_number:"", product_id:"", product_name:"",quantity:"",description:"",
            delivered_date:"",approved_by:"",supplier:"",quantity_received:"",available_quantity:"" };

            
             $http.get("../php/delivered_itemsdb_inventory.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(delivered_items){
                $scope.selectedDeliveredItem = delivered_items;
                     };

                
}]);


myApp.controller('inventorylistController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedProduct={ product_id:"", product_name:"",available_stocks:"",price:"",description:"" };

            $http.get("../php/inventorydata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(inventory){
                $scope.selectedProduct = inventory;
     };
                
     

 }]);

myApp.controller('stocksExpirationController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedProduct={ product_id:"", product_name:"",available_stocks:"",price:"",description:"",exp_date:"",status:"" };

            $http.get("../php/stocksExpirationdata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(inventory){
                $scope.selectedProduct = inventory;
     };
                
     

 }]);


myApp.controller('deliveryController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedProduct={ product_id:"", product_name:"",supplier:"",price:"",description:"" };

            $http.get("../php/supplierproductdata.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(product){
                $scope.selectedProduct = product;
     };

                

 }]);

myApp.controller('updatestocksController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedProduct={ product_id:"", product_name:"",available_stocks:"",description:"" };

            $http.get("../php/addnewstockdatatable.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(product){
                $scope.selectedProduct = product;
     };

                

 }]);

myApp.controller('addItemInventoryController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedProduct={ product_id:"", product_name:"",available_stocks:"",description:"" };

            $http.get("../php/addnewstockdatatable.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(product){
                $scope.selectedProduct = product;
     };

                

 }]);


myApp.controller('returnItemsController', ['$scope', '$http', function ($scope, $http) {
            
    

            $scope.data=[];
            $scope.selectedProduct={ product_id:"", product_name:"",available_stocks:"",description:"" };

            $http.get("../php/inventorylist.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(product){
                $scope.selectedProduct = product;
     };

                

 }]);



myApp.controller('salesVaultController', ['$scope', '$http', function ($scope, $http) {
            
    
            $scope.gymsales = 'gym payment';
            $scope.data=[];
            $scope.selectedProductSales={ id:"",or_number:""};

            $http.get("../php/gymsales.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(sales){
                $scope.selectedProductSales = sales;
     };

        
 }]);