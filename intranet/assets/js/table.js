//tabela de visualização
$(document).ready(function(){
	$(".data-table").dataTable({
		"oLanguage": {
			"sSearch": '<label style="margin-left:5%"><i class="fa fa-filter"></i> Filtrar: </label>',
			"sInfo": "Exibindo: _START_ até _END_ | Total: _TOTAL_ registros",
			"sInfoEmpty": "Exibindo 0 registros",
			"sZeroRecords": "Nenhum registro encontrado!",
			"sInfoFiltered":"(Pesquisado em _MAX_ registros)"			
		},
		"sScrollY": "400px",
		"sScrollX": "100%",
		"sScrollXInner": "100%",
		"bPaginate": false,
		"aaSorting": [[0,"asc"]]
	});
	$(".data-table-consrecom").dataTable({
		"oLanguage": {
			'sSearch': '<label style="margin-left:5%"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Nº Recom:&nbsp;</label><input type="text" name="pesq" class="form-control campo4 btn-padrao input-sm in-line" placeholder="Digite o nº da RECOM" autofocus><button type="submit" name="consultar" class="btn btn-primary btn-sm btn-padrao">Buscar</button><div class="in-line">&nbsp;&nbsp;&nbsp;<i class="fa fa-filter"></i> Filtrar: ',
			"sInfo": "Exibindo: _START_ até _END_ | Total: _TOTAL_ registros",
			"sInfoEmpty": "Exibindo 0 registros",
			"sZeroRecords": "Nenhum registro encontrado!",
			"sInfoFiltered":"(Pesquisado em _MAX_ registros)"			
		},
		"sScrollY": "400px",
		"sScrollX": "100%",
		"sScrollXInner": "100%",
		"bPaginate": false,
		"aaSorting": [[7,"asc"]]
	});
	$(".data-table-gerrecom").dataTable({
		"oLanguage": {
			"sSearch": '<label style="margin-left:5%"><i class="fa fa-filter"></i> Filtrar: </label>',
			"sInfo": "Exibindo: _START_ até _END_ | Total: _TOTAL_ registros",
			"sInfoEmpty": "Exibindo 0 registros",
			"sZeroRecords": "Nenhum registro encontrado!",
			"sInfoFiltered":"(Pesquisado em _MAX_ registros)"			
		},
		"sScrollY": "400px",
		"sScrollX": "100%",
		"sScrollXInner": "100%",
		"bPaginate": false,
		"aaSorting": [[0,"desc"]]
	});
	$(".data-table-nosorting").dataTable({
		"oLanguage": {
			"sSearch": '<label style="margin-left:5%"><i class="fa fa-filter"></i> Filtrar: </label>',
			"sInfo": "Exibindo: _START_ até _END_ | Total: _TOTAL_ registros",
			"sInfoEmpty": "Exibindo 0 registros",
			"sZeroRecords": "Nenhum registro encontrado!",
			"sInfoFiltered":"(Pesquisado em _MAX_ registros)"			
		},
		"sScrollY": "400px",
		"sScrollX": "100%",
		"sScrollXInner": "100%",
		"bPaginate": false,
		"aaSorting": false
	});
	
	
	$(".dataTables_filter").addClass('row');
	$(".dataTables_filter label").first().focus().addClass('container conteudo');
	$(".dataTables_filter input").addClass('form-control in-line input-sm campo4');	
	//$(".dataTables_filter input:search").append("</div>");
	
	 $("#cod0").mask('ZZZZZZ', {
        translation: {
          'Z': {
            pattern: /[0-9]/, optional: true
          }
        }
     });      
	 $("#qtd0").mask("###.###.##0,00", {reverse: true});
	 $("#un0").mask('ZZZ', {
    	translation: {
	      'Z': {
	        pattern: /[A-Z,a-z]/, optional: true
	      }
	    }
	  });
	 $("#cc0").mask('ZZZZZZZZZZ', {
    	translation: {
	      'Z': {
	        pattern: /[A-Z,a-z]/, optional: true
	      }
	    }
	  });
	  

    $('.deletareg').click(function(){
        if(confirm("Deseja realmente remover a permissão deste usuário nessa tela?")) return true; else return false;
    });

});

//tabela de inserção
(function($) {

  // remove linha
  RemoveTableRow = function(handler) {
    var tr = $(handler).closest('tr');

    tr.fadeOut(400, function(){ 
      tr.remove();
      GetRowValue(); 
    }); 
    return false;
  };
  
  // adiciona linha
  AddTableRow = function() {
      
      var numLinha = CountRow();
      var newRow = $("<tr>");
      var cols = "";

       cols += '<td class="col-md-1"><input type="text" id="cod'+numLinha+'" name="cod'+numLinha+'" placeholder="000000" value="" class="form-control form-control-table"></td>';
	   cols += '<td class="col-md-1"><input type="text" id="qtd'+numLinha+'" name="qtd'+numLinha+'" placeholder="0,00" value="" class="form-control form-control-table"></td>';
	   cols += '<td class="col-md-1"><input type="text" id="un'+numLinha+'" name="un'+numLinha+'" placeholder="___" value="" class="form-control form-control-table"></td>';
	   cols += '<td class="col-md-1"><input type="text" id="des'+numLinha+'" name="des'+numLinha+'" placeholder="Digite o nome do material" value="" class="form-control form-control-table"></td>';
	   cols += '<td class="col-md-1"><input type="text" id="cc'+numLinha+'" name="cc'+numLinha+'" placeholder="C.Custo" value="" class="form-control form-control-table"></td>';
	   cols += '<td class="col-md-2"><div class="input-group date form_date form-control-table" data-date="" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">';
	   cols += '<input type="text" id="pra'+numLinha+'" name="pra'+numLinha+'" value="" class="form-control form-control-table" readonly="">';
	   cols += '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></td>';
	   cols += "<script type='text/javascript'>$('.form_date').datetimepicker({language:  'pt-BR',weekStart: 1,todayBtn:  1,autoclose: 1,todayHighlight: 1,startView: 2,minView: 2,forceParse: 0});</script>";      
      
      cols += '<td class="actions">';
      cols += '<button class="btn btn-xs btn-warning" style="margin-top: 6px; margin-left: 3px;" onclick="RemoveTableRow(this)" type="button"><i class="fa fa-minus-circle"></i> Remover</button>';
      cols += '</td>';
      
     $("#cod"+numLinha).mask('ZZZZZZ', {
        translation: {
          'Z': {
            pattern: /[0-9]/, optional: true
          }
        }
      });
	 $("#qtd"+numLinha).mask("###.###.##0,00", {reverse: true});
	 $("#un"+numLinha).mask('ZZZ', {
    	translation: {
	      'Z': {
	        pattern: /[A-Z,a-z]/, optional: true
	      }
	    }
	  });
	 $("#cc"+numLinha).mask('ZZZZZZZZZZ', {
    	translation: {
	      'Z': {
	        pattern: /[A-Z,a-z]/, optional: true
	      }
	    }
	  });
      
      newRow.append(cols);

      $("#products-table").append(newRow);
      GetRowValue();
      return false;
  };
  
  GetTableError = function() {
  	 $("#error").empty();
  	 var msg = '';
  	 msg = '<div class="alert alert-danger" role="alert">';
  	 var nCampo = CountRow()-1;
  	 var nLinha = CountRow();
  	 var ok = true;
  	 var j = 0;

  	 for(var i = 0; i < nLinha; i++){
  	 	j = i+1;
  	 	if($("#cod"+i).val() == '' || $("#cod"+i).val().length > 6){
  	 		msg = msg + '<p>O campo CÓDIGO, da linha: '+ j + ' é obrigatório e deve ser menor que 6 caracteres.<br />';
  	 		ok = false;
  	 	}
  	 	if($("#qtd"+i).val() == '' || $("#qtd"+i).val().length > 12){
  	 		msg = msg + '<p>O campo QUANTIDADE, da linha: '+ j + ' é obrigatório e deve ser menor que 12 caracteres.<br />';
  	 		ok = false;
  	 	}
  	 	if($("#un"+i).val() == '' || $("#un"+i).val().length > 3){
  	 		msg = msg + '<p>O campo UNIDADE, da linha: '+ j + ' é obrigatório e deve ser menor que 3 caracteres.<br />';
  	 		ok = false;
  	 	}
  	 	if($("#des"+i).val() == '' || $("#des"+i).val().length > 70){
  	 		msg = msg + '<p>O campo DESCRIÇÃO, da linha: '+ j + ' é obrigatório e deve ser menor que 70 caracteres.<br />';
  	 		ok = false;
  	 	}
  	 	if($("#cc"+i).val() == '' || $("#cc"+i).val().length > 10){
  	 		msg = msg + '<p>O campo CENTRO DE CUSTO, da linha: '+ j + ' é obrigatório e deve ser menor que 10 caracteres.<br />';
  	 		ok = false;
  	 	}
  	 	
  	 }
  	 
  	 if($("#id_ger").val() == 0){
  	 		msg = msg + '<p>Escolha uma opção para o campo GERÊNCIA<br />';
  	 		ok = false;
  	 }
  	 
  	 if($("#id_sup").val() == 0){
  	 		msg = msg + '<p>Escolha uma opção para o campo REPLICAR PARA<br />';
  	 		ok = false;
  	 }
  	 
  	 if($("#id_sup").val().length > 520){
  	 		msg = msg + '<p>O campo MENSAGEM deve ser menor que 520 caracteres.<br />';
  	 		ok = false;
  	 }
  	 
  	 
  	 if(ok){
  	 	document.getElementById('validado').value = 1;
  	 	$("#form_recom").submit();
  	 }else{
  	 	msg += '</div>';
  	 	$("#error").append(msg);
  	 }
  };	  
  
  // conta quantidade de linhas
  CountRow = function() {
  	var rowCount = $('#products-table tr').length - 2;
  	//console.log(rowCount);
  	return rowCount;
  };
  
  // adiciona o valor de linhas no campo hidden
  GetRowValue = function() {
  	var numLinha = CountRow();
  	document.getElementById('linha').value = numLinha;
  };
  
  
   
})(jQuery);


