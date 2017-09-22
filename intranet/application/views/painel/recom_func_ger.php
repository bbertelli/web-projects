<script type="text/javascript">
	var itens_array = [];
	
	function CriarArray(){
	    var id_recom = $("#id_recom").val();       
	    var numLinhas = $('#products-table tr').length-1;
	    
	    document.getElementById('marcador').value=$('#products-table tr').length-1;            
	    var j = 1;
	    for(var i = 0; i < numLinhas; i++) {
	        var id_item = $('#id_item_'+j).text();
	        itens_array.push([id_item, 1]);
	        j++;
	    }
	}        
	
	function AprovarItens(btn){
	    var linha = btn.id;
	    
	    if($("#marcador").val() <= 1){
	        $('#desmarcar_todos').removeClass("btn btn-xs btn-danger").addClass("btn btn-xs btn-primary");
	        $('#desmarcar_todos').text('Aprovar todos');
	        $('#desmarcar_todos').attr('name', 'marcar_todos');  
	    }else if($("#marcador").val() == itens_array.length-1){
	        $('#desmarcar_todos').removeClass("btn btn-xs btn-primary").addClass("btn btn-xs btn-danger");
	        $('#desmarcar_todos').text('Reprovar todos'); 
	        $('#desmarcar_todos').attr('name', 'desmarcar_todos');
	    }
	
	    if(btn.name == "Marcar"){                                                                                 
	        itens_array[linha-1][1] = "9";
	        btn.setAttribute("class","table-actions gl-red fa fa-thumbs-down fa-2x"); 
	        btn.name="Desmarcar";
	        document.getElementById('marcador').value--;                   
	    }else{
	        itens_array[linha-1][1] = "1";
	        btn.setAttribute("class","table-actions gl-dark-green fa fa-thumbs-up fa-2x"); 
	        btn.name="Marcar";
	        document.getElementById('marcador').value++;  
	    }                        
	    document.getElementById('desmarcar_todos').focus();                            
	}
	
	function AprovarTodosItens(btn){
	
	    if(btn.name == "marcar_todos"){
	        for(var i = 0; i < itens_array.length; i++) {
	            itens_array[i][1] = "1";
	            var linha = i+1;
	            $('#'+linha).removeClass("table-actions gl-red fa fa-thumbs-down fa-2x").addClass("table-actions gl-dark-green fa fa-thumbs-up fa-2x");
	        }                                                       
	        btn.setAttribute("class","btn btn-xs btn-danger");
	        $('#desmarcar_todos').text('Reprovar todos'); 
	        btn.name="desmarcar_todos";
	    }else{
	        for(var i = 0; i < itens_array.length; i++) {
	            itens_array[i][1] = "9";
	            var linha = i+1;
	            $('#'+linha).removeClass("table-actions gl-dark-green fa fa-thumbs-up fa-2x").addClass("table-actions gl-red fa fa-thumbs-down fa-2x");
	        }                                                       
	        btn.setAttribute("class","btn btn-xs btn-primary");
	        $('#desmarcar_todos').text('Aprovar todos');  
	        btn.name="marcar_todos";
	    }
	    document.getElementById('desmarcar_todos').focus();
	}
	
	function AtualizarRecom(btn){
	   var json_itens_array = JSON.stringify(itens_array);
	   
	   document.getElementById('itens_array').value = json_itens_array;
	   document.getElementById('nlinha').value = itens_array.length;
	   $("#form_visualizar_recom").submit();
	}
</script>