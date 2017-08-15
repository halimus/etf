/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () { 
    
    /**
     * 
     */
    $('.bloc').click(function () {
       var id = $(this).attr('rel');
       $(".bloc_" + id).slideToggle("fast");
        var cls = $(this).find("i").attr('class');
        $(this).find("i").removeClass();
        if (cls === 'fa fa-minus'){
            $(this).find("i").addClass('fa fa-plus');
        }
        else{
            $(this).find("i").addClass('fa fa-minus');
        }
        return false;
    });
    
});

