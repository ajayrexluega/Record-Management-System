<script src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
        
        

            var my_date_format = function(){
    var d = new Date();
    var month = ['Jan ', 'Feb ', 'Mar ', 'Apr ', 'May ', 'Jun ', 'Jul ', 'Aug ', 'Sep ', 'Oct ', 'Nov ', 'Dec '];
    var date = d.getDate() + " " + month[d.getMonth()] + ", " + d.getFullYear();
    var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
    return (time + " " +date);  
};

var my_time_format = function(){
    var d = new Date();
    var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
    return (time);  
};

//console.log(my_date_format());
// output 6 Jul, 2014 11:28 am

$('#times').html(my_date_format);


        

})
</script>
<body>
<span id="times"></span>
</body>