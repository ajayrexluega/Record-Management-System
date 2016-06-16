<?php 
  session_start();

  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];

?>
<head>
     <!-- <link rel="stylesheet" type="text/css" href="../css/walkinLog.css"> -->
</head>

<style type="text/css">
body{
    background-color: #eee;

}
.goto{
    background-color: #ccc;
   
    padding-top: 5px;
}
.fname, .lname{
    border: 1px solid #cccccc;
  border-radius: 5px;
  padding-left: 20px;
  width: 180px;
  height: 25px;
  margin-top: 25px;
  font-size: 12pt;
  background-size: 40px;

}
fieldset{
  border-color: #ccc;
  border-radius: 10px;
  box-shadow: none;
  outline: 0 none;

}
#fields{
  float: left;
  padding: 20px;
  
}
#fields2{
  float: right;
  padding: 20px;
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

}
.submit:hover{
  background-color: #337ab7;
}
#move{
  margin-top: 10px;
  padding-left: 50px;
}
input:focus{
  border: 1px solid #428bca;
    box-shadow: 1px 1px 1px #428bca;
    outline: 0 none;
  transition: 1s;
}

#table-wrapper {
  position:relative;
}
#table-scroll {
  float: right;
  height:500px;
  width: 720px;
  overflow:auto;  
  margin-top:20px;
}
#table-wrapper table {
  width:720px;
    
}
#table-wrapper table * {
  border-bottom: 1px solid #ccc;
  color:black;
  
}
#table-wrapper table thead th .text {
  position: absolute;   
  top:-20px;
  z-index:2;
  height:25px;
  width: 290px;
  
}
#tr {
margin-left: auto;
margin-right: auto;

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

#gender{
  border: 1px solid #cccccc;
  border-radius: 5px;
  padding-left: 20px;
  width: 120px;
  height: 42px;
  
  font-size: 17pt;
  background-size: 40px;

}
#clickrow:hover{
    background-color: #C4CACC;
}
td{
    padding-top: 10px;
    cursor: pointer;
}
table{
    border-collapse: collapse;
    border-spacing: 0;

}


#white-background{
            display: none;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #fefefe;
            opacity: 0.7;
            z-index: 9999;
        }

        #dlgbox{
            /*initially dialog box is hidden*/
            display: none;
            position: fixed;
            width: 280px;
            z-index: 9999;
            border-radius: 10px;
            background-color: #7c7d7e;
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
        #yes{
            float: left;
        }

        /* AVAIL */


#white-background2{
            display: none;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #fefefe;
            opacity: 0.7;
            z-index: 9999;
        }

        #dlgbox2{
            /*initially dialog box is hidden*/
            display: none;
            position: fixed;
            width: 700px;
            z-index: 9999;
            border-radius: 10px;
            background-color: #7c7d7e;
        }

        #dlg-header2{
            background-color: #6d84b4;
            color: white;
            font-size: 20px;
            padding: 10px;
            margin: 10px 10px 0 10px;
        }

        #dlg-body2{
            background-color: white;
            color: black;
            font-size: 14px;
            padding: 10px;
            margin: 0 10px 0 10px;
        }

        #dlg-footer2{
            background-color: #f2f2f2;
            text-align: right;
            padding: 10px;
            margin: 0 10px 10px 10px;
        }

        #dlg-footer2 button{
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
        #yes{
            float: left;
        }


        /*  SINGLE DAY  */
        #white-background3{
            display: none;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #fefefe;
            opacity: 0.7;
            z-index: 9999;
        }

        #dlgbox3{
            /*initially dialog box is hidden*/
            display: none;
            position: fixed;
            width: 400px;
            z-index: 9999;
            border-radius: 10px;
            background-color: #7c7d7e;
        }

        #dlg-header3{
            background-color: #6d84b4;
            color: white;
            font-size: 20px;
            padding: 10px;
            margin: 10px 10px 0 10px;
        }

        #dlg-body3{
            background-color: white;
            color: black;
            font-size: 14px;
            padding: 10px;
            margin: 0 10px 0 10px;
        }

        #dlg-footer3{
            background-color: #f2f2f2;
            text-align: right;
            padding: 10px;
            margin: 0 10px 10px 10px;
        }

        #dlg-footer3 button{
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
        #yes{
            float: left;
        }

        /* AVAIL FORM */

        #fname,#lname{
          margin-left: 40px;
        }
        #mname{
          margin-left: 20px;
        }
        #age{
          margin-left: 20px;
        }
        #contact{
          margin-left: 45px;

        }
        #gender2{
          margin-left: 55px;

        }
        #pment{
          margin-left: 140px;
        }
        #amount{
          margin-left: 20px; width: 80px;
        }
        #cash{
          margin-left: 10px; width: 80px;
        }


</style>

<body>
  <div ng-controller="loglistWalkinController">
<div id="wtf">


      <div id="fields" >
      <form id="member" method="post" action="../php/walkinLoginsert.php">
        <fieldset style="width:300; border-width:1px;" align="center"   >
      <legend><h3>Walk-in Log</h3></legend>
        <div id="move"><p id="get_member"></p></div>
        
       <input class="fname" type='text' name='firstname' id='firstname' placeholder="First Name" autocomplete="off" required/>

      </br><input class="lname" type='text' name='lastname' id='lastname' placeholder="Last Name" autocomplete="off" required /></br>
      <input class="lname" type='text' name='middlename' id='lastname' placeholder="Middle Name" autocomplete="off" required /></br>

      </br><label for="male">Male  </label><input type="radio" name="gender" id="male" required value="Male" />
         <label for="female">Female  </label><input type="radio" name="gender" id="female" value="Female" /><br /><br />

         <div ng-controller="gymfeelist2Controller">

          <label for="repeatSelect">--Please Select--</label><br/>
    <select id="repeatSelect" ng-model="data.repeatSelect">
      <option id="type" ng-repeat="gym_fees in data" value="{{gym_fees.id}}">{{gym_fees.gym_type}} {{gym_fees.type}}</option>
    </select>

    <input type="text" name="walkintype" value="{{data.repeatSelect}}" hidden>

  <br/>

       
         
         
         
         
         <input type="text" name="processby" value="<?php echo $firstname . ' ' . $lastname ?>" hidden>
         

      <br><br><input class="submit" type="submit" name="submit">
    </fieldset>
      </form>
      </div>


      
      
</div>


    
    <h3>Log List today</h3>
    <input class="filter" type="text" ng-model="searchFilter" placeholder="Filter">
    
    <div id='table-scroll'>
      
      <div id='table-wrapper'>
<table id='table12'>
                <thead id='top'>
                    <tr>
                        
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th>Time-in</th>
                        
                        <th>Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr id="clickrow" ng-click="showInEdit(walkin_member)" onclick="showDialog()" ng-repeat="walkin_member in data | filter:searchFilter">
                        
                        <td>{{walkin_member.firstname}}</td>
                        <td>{{walkin_member.lastname}}</td>
                        <td>{{walkin_member.gender}}</td>
                        <td>{{walkin_member.time}}</td>
                        
                        <td>{{walkin_member.datestamp}}</td>
                        
                    </tr>
                </tbody>
            </table>
          </div>
        </div>



<div id="white-background">
</div>

        <div id="dlgbox">
    <div id="dlg-header"><h3 id="delSuccess">Time-out?</h3>
    
  </div>
    <div id="dlg-body">
    <div id="move"><p id="updatesuccess"></p></div>
    <form id="non-member" method="post" action="../php/walkinLoginsertnmember.php" hidden>

        
      
        <div id="move"><p id="get_nmember"></p></div>
       <input class="fname" type='text' name='firstname' id='firstname' ng-model="selectedWalkin.firstname" placeholder="First Name" required hidden/>

      <input class="lname" type='text' name='lastname' id='lastname' ng-model="selectedWalkin.lastname" placeholder="Last Name" required hidden/>

    <input type="text" name="gender" id="gender" ng-model="selectedWalkin.gender" required hidden/>
         <!--<label for="female">Female  </label><input type="radio" name="gender" id="female" value="Female" /><br />-->
         <input type="hidden" name="date" id="date2" value="">
         <input type="hidden" name="time" id="time2" value="">
         
         

      <input class="submit" type="submit" name="submit" hidden>

      </form>
    </div>
    <div id="dlg-footer">
        <button id="yes">Yes</button>
        <button onclick="dlgExit()">Exit</button>
    </div>
</div>




<!--   AVAIL   -->


<div id="white-background2">
</div>

        <div id="dlgbox2">
    
    <div id="dlg-header2"><h3 id="delSuccess">Avail Program</h3>
  </div>
    <div id="dlg-body2">
    <div id="move"><p id="updatesuccess2"></p></div>
    <div id="move"><p id="get_nmember2"></p></div>
    <form id="avail_reg" method="post" action="../php/.php" >



        


      </form>
    </div>
    <div id="dlg-footer2">
        
        <button onclick="dlgExit()">Exit</button>
    </div>
</div>


<!--  SINGLE DAY  -->


<div id="white-background3">
</div>

        <div id="dlgbox3">
    
    <div id="dlg-header3"><h3 id="delSuccess">Walkin Payment</h3>
  </div>
    <div id="dlg-body3">
    <div id="move"><p id="updatesuccess3"></p></div>
    <div id='move'><p id='get_nmember3'></p></div>
    <form id='walkin' method='post' action='../php/walkinOneday.php' >


     </form> 

    
    </div>
    <div id="dlg-footer3">
        
        <button onclick="dlgExit()">Exit</button>
    </div>
</div>



<script type="text/javascript">

    $(document).ready(function(){
    
    

      var my_date_format = function(){
    
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();
        /*var output = ((''+day).length<2 ? '0' : '') + day  + '/' +
        ((''+month).length<2 ? '0' : '') + month + '/' +
        d.getFullYear();*/
        var output = d.getFullYear()  + '-' +
        ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day
        ;

        return (output);

    //var d = new Date();
    //var month = ['Jan ', 'Feb ', 'Mar ', 'Apr ', 'May ', 'Jun ', 'Jul ', 'Aug ', 'Sep ', 'Oct ', 'Nov ', 'Dec '];
    //var date = d.getDate() + " " + month[d.getMonth()] + ", " + d.getFullYear();
    //var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
    //return (date);  
};

var my_time_format = function(){
    var d = new Date();
    var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
    return (time);  
};

//console.log(my_date_format());
// output 6 Jul, 2014 11:28 am
  
    

         $('#member').submit(function(e){

            $('#date').val(my_date_format);
            $('#time').val(my_time_format);


                  $.ajax({
                           data: $(this).serialize(),
                           type: $(this).attr('method'),
                           url: $(this).attr('action'),
                           success: function(data){
                              window.location.replace('#/loglist');
                              window.location.replace('#/');
                                    $('#walkin').html(data);
                                    $('#avail_reg').html(data);
                            }

                  });

                  $("#member")[0].reset();
          
                e.preventDefault();
         });
         $('#yes').click(function(){

              var date = $('#date2').val(my_date_format);
              var time = $('#time2').val(my_time_format);
              
          
              

                  $.ajax({
                           data: $('#non-member').serialize(),
                           type: $('#non-member').attr('method'),
                           url: $('#non-member').attr('action'),
                           success: function(data){
                            window.location.replace('#/loglist');
                              window.location.replace('#/');
                                    $('#get_nmember').html(data);
                            }

                  });

                  $("#non-member")[0].reset();
                event.preventDefault();
         });

        

         $('#walkin').submit(function(e){

          
          

                    $('#date4').val(my_date_format);
                    $('#time4').val(my_time_format);


                          $.ajax({
                                   data: $(this).serialize(),
                                   type: $(this).attr('method'),
                                   url: "../php/walkinOneday.php",
                                   success: function(data){

                                            $('#updatesuccess3').html(data);
                                    }

                          });
                            

                e.preventDefault();
         });



$('#avail_reg').submit(function(e){

          
          var a = parseInt($('#amount').val(),10);
          var c = parseInt($('#cash').val(),10);

          var proceedwalkin = $('#123').val();
          var proceedpayment = $('#321').val();

          if(proceedpayment == 'proceedpayment'){

            $.ajax({
                           data: $(this).serialize(),
                           type: "POST",
                           url: "../php/proceedPaymentAvail.php",
                           success: function(data){
                            $('#updatesuccess2').html(data);
                                    
                            }

                  });

                  

          }

          else if(proceedwalkin == 'proceedwalkin'){

            var date = $('#date3').val(my_date_format);
              var time = $('#time3').val(my_time_format);
              var fname = $('#fname123').val();
              var lname = $('#lname123').val();
              var gender = $('#gender123').val();
          
              

                  $.ajax({
                           data: $(this).serialize(),
                           type: "POST",
                           url: "../php/proceedwalkin.php",
                           success: function(data){
                            window.location.replace('#/loglist');
                              window.location.replace('#/');
                                    
                            }

                  });

                  $("#avail_reg")[0].reset();


          }else{

             if(a <= c){

                    $('#date3').val(my_date_format);
                    $('#time3').val(my_time_format);


                          $.ajax({
                                   data: $(this).serialize(),
                                   type: $(this).attr('method'),
                                   url: "../php/addnewrecordAavail.php",
                                   success: function(data){

                                            $('#updatesuccess2').html(data);
                                    }

                          });
                          var z = document.getElementById("avail_reg");
                            z.style.display = "none";


                  }else{
                    $('#updatesuccess2').html('<b>Not enough cash.</b>');
                  }


          }


                   

          
                  
          
                e.preventDefault();
         });
         

      

});﻿




function dlgExit(){
        dlgHide();
        location.href = "#/l";
        location.href = "#/";
    }

    function dlgHide(){
        var whitebg = document.getElementById("white-background");
        var dlg = document.getElementById("dlgbox");
        whitebg.style.display = "none";
        dlg.style.display = "none";
    }

    function showDialog(){
        var whitebg = document.getElementById("white-background");
        var dlg = document.getElementById("dlgbox");
        whitebg.style.display = "block";
        dlg.style.display = "block";

        var winWidth = window.innerWidth;

        dlg.style.left = (winWidth/2) - 300/2 + "px";
        dlg.style.top = "150px";
    }

    function showDialog2(){
        var whitebg = document.getElementById("white-background2");
        var dlg = document.getElementById("dlgbox2");
        whitebg.style.display = "block";
        dlg.style.display = "block";

        var winWidth = window.innerWidth;

        dlg.style.left = (winWidth/2) - 600/2 + "px";
        dlg.style.top = "10px";
    }

    function showDialog3(){
        var whitebg = document.getElementById("white-background3");
        var dlg = document.getElementById("dlgbox3");
        whitebg.style.display = "block";
        dlg.style.display = "block";

        var winWidth = window.innerWidth;

        dlg.style.left = (winWidth/2) - 600/2 + "px";
        dlg.style.top = "110px";
    }


  </script>

</body>