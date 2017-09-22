(function($) {
 //\'Deseja realmente excluir este GRUPO?\'

   	ConfirmMsg = function(msg,link) {
   		
    	bootbox.confirm(msg, function(result) {
  			if(result){
  				window.location.replace(link);
  			}else{
  				console.log("cancelou");
  			}
		}); 
    };
})(jQuery);