<script type="text/javascript">

    var receber_alterado = 0;

    function PerdeFocoInput(id){        
        receber_alterado = $("#qtdrec"+id).val();
        document.getElementById('qtdrec'+id).value = '';
    }
	
    function ValidarReceber(btn){
        
        var linha    = btn.id;
        var id_recom = $("#id_recom").val(); 
        var receber  = $("#qtdrec"+linha).val();
        var saldo    = $("#saldo"+linha).val();      
        $("#error").empty();
        var msg = '';
        msg = '<div class="alert alert-danger" role="alert">';
        var ok = true;
        console.log(receber);
        
        if(receber_alterado > saldo){
            msg = msg + '<p>Valor à RECEBER deve ser menor ou igual ao SALDO!<br />';
            ok = false; 
        }else if(receber_alterado <= 0){
            msg = msg + '<p>Campo RECEBER vazio, digite a quantidade!<br />';
            ok = false;
        }
             
        if(!ok){
            msg += '</div>';
            $("#error").append(msg);
            document.getElementById('qtdrec'+linha).focus();
         }else{
            saldo_atual = saldo - receber_alterado;   
            btn.setAttribute('href', "../../recom/receber_item_recom/"+linha+"/"+saldo_atual+"/"+id_recom);
         }
    }        
	
</script>