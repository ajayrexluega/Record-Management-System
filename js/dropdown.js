

   /* $(document).ready(function(){
        // Show hide popover
        $(".show-sub").click(function(){
            $(this).find(".dropdown-menu").slideToggle("fast");
        });
    });
    $(document).on("click", function(event){
        var $trigger = $(".show-sub");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $(".dropdown-menu").slideUp("fast");
        }            
    }); */


   $(document).ready(function(e)
    {

       $('.show-sub').click(function(e){
        
        $('.active').removeClass('active').children('ul').slideUp('slow');
        $(this).addClass('active');
        $(this).children('ul').slideToggle('slow');


        });



       $(".show-sub ul").click(function(e){
           e.stopPropagation();

       });

    });
