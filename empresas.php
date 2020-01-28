<?php

  $title_page = "DashBoard - Empresas";
  require_once( "cabecalho.php");

  $sql = "SELECT E.ID,E.BRANCHID,E.REDE,E.CODIGO_EMPRESA,E.EMPRESA,E.CNPJ,E.CODIGO_ESTOQUE,E.CODIGO_SALDO,E.CODIGO_CLIENTE,E.TAB_PRECO_DE ".
                ",E.TAB_PRECO_POR,E.DOCA,E.CFOP,E.EMPRESA_MATRIZ,E.ACCOUNT_NAME,E.SELLER,E.CONDICAO_COMERCIAL,E.EMAIL,E.CODIGO_REPRESENTANTE ".
                ",E.ENVIA_VAREJO_INTERNET,E.TOKEN,E.CUSTOM1,E.CUSTOM2,E.CUSTOM3,E.CUSTOM4,E.CUSTOM5,E.DATA_ALTERACAO,E.STATUS ".
                ",D.RazaoSocial,D.IE,D.IM,D.CodigoGerente,D.CodigoCaixa,D.CodigoVendedor,D.Endereco,D.Bairro,D.Cep,D.Cidade,D.UF,D.Telefone ".
                ",D.Obs,D.AppUser,D.AppPassword,D.AppToken, D.ENVIA_NOTIFICACAO, D.URL_LOGO, D.PLATAFORMA ".
        "FROM EMPRESAS E LEFT JOIN EMPRESAS_DETALHES D ON E.BRANCHID=D.BranchId ORDER BY STATUS DESC";

  $Empresas = ExecuteConnectionQuery($sql);

?>


<div class="row">
    <div class="col-12">
        <div class="box b-3 border-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Empresas</h3>
            </div>

          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
</div>
<?php
  require_once "rodape.php";
?>
