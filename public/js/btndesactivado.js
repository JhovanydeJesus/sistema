$(document).ready(function(){

     $('input[type="submit"]').attr('disabled','disabled');

     $('input[type="text"]').keypress(function(){

            if($(this).val() != ''){

               $('input[type="submit"]').removeAttr('disabled');

            }
           

     });

 });
