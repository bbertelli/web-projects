<script type="text/javascript">

    var pedido_original = 0;
    var pedido_alterado = 0;

    function GanhaFocoInput(id){
        $("#ped"+id).mask('ZZZZZZ', {
            translation: {
              'Z': {
                pattern: /[0-9]/, optional: true
              }
            }
        });
    }
	
	function PerdeFocoInput(id){
        document.getElementById('ped'+id).disabled = true;
        $("#"+id).attr( "class", "fa fa-pencil" );
        $("#"+id).attr( "name", "btn_validar" );
        pedido_alterado = $("#ped"+id).val();
        document.getElementById('ped'+id).value = pedido_original;
        
    }
    
    function MouseOverBtn(btn){
        btn.name = "btn_editar";  
    }

	
	function InserirPedido(btn){
	     var linha = btn.id;
	     var id_recom = $("#id_recom").val();  	     
	     pedido_original = $("#ped"+linha).val();

	     $("#ped"+linha).mask('ZZZZZZ', {
            translation: {
              'Z': {
                pattern: /[0-9]/, optional: true
              }
            }
         });
	         
	     if(btn.name == "btn_editar"){
	       btn.setAttribute("class","gl-dark-green fa fa-check");
	       document.getElementById('ped'+linha).disabled = false;
	       document.getElementById('ped'+linha).focus();
	     }else if(btn.name == "btn_validar"){
	       btn.setAttribute('href', "../../recom/mudar_pedido_item/"+linha+"/"+pedido_alterado+"/"+id_recom);
	     }
	}
	
    function ValidarCompra(btn){
        
        var linha    = btn.id;
        var id_recom = $("#id_recom").val(); 
        var pedido   = $("#ped"+linha).val();      
        $("#error").empty();
        var msg = '';
        msg = '<div class="alert alert-danger" role="alert">';
        var ok = true;
            
        if($("#ped"+linha).val() == ''){
            msg = msg + '<p>O campo PEDIDO é obrigatório e deve ser menor que 6 caracteres.<br />';
            ok = false;
        }
             
        if(!ok){
            msg += '</div>';
            $("#error").append(msg);
            document.getElementById('ped'+linha).focus();
         }else{   
           
            btn.setAttribute('href', "../../recom/comprar_item_recom/"+linha+"/"+pedido+"/"+id_recom);
         }
    }        
	
</script>