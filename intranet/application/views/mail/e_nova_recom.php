<?php
    // corpo do email
    $message = "<html><head>
    <meta http-equiv=Content-Type content=text/html; charset=UTF-8>
    </head>
    <body>
        <table width=787 align=center border=0 cellpadding=0 cellspacing=0>
            <tr> 
              <td width=452 height=50 valign=middle bgcolor=#CCCCCC><strong><font size=6>.: e-DOC</font></strong></td>
              <td width=153 align=center valign=middle bgcolor=#CCCCCC>&nbsp;</td>
            <td width=182 align=center valign=middle bgcolor=#CCCCCC><font size=3 face=Verdana, Arial, Helvetica, sans-serif><b><strong>N&ordm;&nbsp;&nbsp; 
                &nbsp;".$num_recom."</strong></font></td>
            </tr>
            <tr> 
              <td height=28 valign=middle><div align=left><font size=2 face=Verdana, Arial, Helvetica, sans-serif>
              <b>Enviado em &nbsp;".converte_data_br($data)."</b></font></div></td>
            </tr>
            <tr valign=middle> 
              <td height=28><font color=#666666 size=2 face=Verdana, Arial, Helvetica, sans-serif>Requer Visto: &nbsp;&nbsp;&nbsp;&nbsp;<strong>".$nome_ger_dest."</strong></font></td>
            </tr>
            <tr> 
              <td height=28 valign=middle><font color=#000000 size=2 face=Verdana, Arial, Helvetica, sans-serif>Solicitante: 
                &nbsp;&nbsp;&nbsp; <strong>".$nome_req."</strong>&nbsp;[ id:&nbsp;".$ip." ]</font></td>
            </tr>
          </table>
          <table width=787 border=0 align=center cellpadding=0 cellspacing=0>
            <tr>
              <td colspan=8 align=center valign=middle><strong><font color=#000000 size=2 face=Verdana,>REQUISICAO DE COMPRAS</font></strong></td>
            </tr>
            <tr valign=middle>
              <td width=38 align=center valign=bottom bgcolor=#666666><font color=#FFFFFF><strong>Item</strong></font></td>
              <td width=108 align=center valign=bottom bgcolor=#666666><font color=#FFFFFF><strong>C&oacute;digo</strong></font></td>
              <td width=77 height=23 align=center valign=bottom bgcolor=#666666><font color=#FFFFFF><strong>Quantidade</strong></font></td>
              <td width=67 align=center valign=bottom bgcolor=#666666><font color=#FFFFFF><strong>Unidade</strong></font></td>
              <td width=393 height=23 valign=bottom bgcolor=#666666><font color=#FFFFFF><strong>Descri&ccedil;&atilde;o</strong></font></td>
              <td width=100 align=left valign=bottom bgcolor=#666666><font color=#FFFFFF><strong>C. Custo</strong></font></td>
              <td width=70 align=right valign=bottom bgcolor=#666666><font color=#FFFFFF><strong>Prazo</strong></font></td>
            </tr>";
             for($i = 0; $i< $numLinha; $i++) {
                $message .= "<tr valign=top>
                  <td align=center valign=top>".$p_itens_array['id_item'][$i]."</td>
                  <td height=22 align=center valign=top>".$p_itens_array['cod'][$i]."</td>
                  <td height=22 align=center valign=top><label></label>".$p_itens_array['qtd'][$i]."</td>
                  <td height=22 align=center valign=top>".$p_itens_array['un'][$i]."</td>
                  <td height=22 align=left valign=top>".$p_itens_array['des'][$i]."</td>
                  <td height=22 align=left valign=top>".$p_itens_array['cc'][$i]."</td>
                  <td height=22 align=right valign=top>".$p_itens_array['pra'][$i]."</td>
                <tr valign=top>";
             }
             $message .= "<tr valign=top>
              <td height=28 valign=middle>    
              <td valign=middle><font size=2 face=Verdana, arial, helvetica, sans-serif><b><strong>Observacao:</strong></b></font>    
              <td height=28 colspan=5 align=center valign=top>&nbsp;</td>
            <tr valign=top>
              <td height=28 valign=middle>      
              <td height=28 colspan=6 valign=middle><font size=2 face=Verdana, arial, helvetica, sans-serif>".$msg."</font>
                <label></label>
            <tr valign=middle>
              <td colspan=2>          </tr>
            
            <tr valign=top>
              <td height=11 colspan=7 align=right bgcolor=#CCCCCC><font color=#666666 size=2>IMP - 026 -REV.02</font></td>
            </tr>
        </table>
    </body>
    </html>";
?>