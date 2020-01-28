
<div class="box-body">
    <div class="table-responsive">
        <table id="Empresas" class="table table-hover no-wrap" data-page-size="10">
            <thead>
                <tr class="bg-primary">
                    <td colspan="2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#incluirEmpresas">Adicionar Empresa</button>
                    </td>							
                    <td colspan="9">
                        <div class="text-right">
                            <ul class="pagination"> </ul>
                        </div>
                    </td>
                </tr>
                <tr class="bg-secondary">
                    <th>BranchId</th>
                    <th>Codigo Empresa</th>
                    <th>Empresa</th>
                    <th>Cnpj</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($Empresas as $param){
                        echo($param["STATUS"] == 1 ? '<tr class="bg-success">' : "<tr>");
                    ?>
                        
                            <td class="align-middle"><?php echo($param["BRANCHID"]); ?></td>
                            <td class="align-middle"><?php echo($param["CODIGO_EMPRESA"]); ?></td>
                            <td class="align-middle"><?php echo($param["EMPRESA"]); ?></td>
                            <td class="align-middle"><?php echo($param["CNPJ"]); ?></td>
                            <td class="align-middle">
                                <div class="btn-group align-middle" role="group" aria-label="ParamBtn">
                                    <button id="AlterarParametro<?php echo($param["id"]); ?>" data-toggle="modal" data-target="#EditarEmpresa-<?php echo($param["ID"]); ?>" class="btn btn-blue ti ti-settings" title="Parametros Empresa"></button>
                                    <a href="Model/TabelasApoio.php?op=3&acao=del&id=<?php echo($param["ID"]); ?>" id="excluirParametro<?php echo($param["ID"]); ?>" class="btn btn-danger ti ti-trash" title="Excluir Empresa"></a>
                                </div>
                            </td>
                        </tr>

                        
                        <div class="modal fade" id="EditarEmpresa-<?php echo($param["ID"]); ?>" tabindex="-1" role="dialog" aria-labelledby="EditarEmpresa<?php echo($param["id"]); ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="get" action="Model/TabelasApoio.php" id="frmParam<?php echo($param["ID"]); ?>" name="frmParam<?php echo($param["ID"]); ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="EditarEmpresa<?php echo($param["ID"]); ?>">Parametro BranchId (<?php echo($param["BRANCHID"]); ?>)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">  

                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-empresa-tab-<?php echo($param["ID"]); ?>" data-toggle="tab" href="#nav-empresa<?php echo($param["ID"]); ?>" role="tab" aria-controls="nav-empresa<?php echo($param["ID"]); ?>" aria-selected="true">Empresa</a>
                                                <a class="nav-item nav-link" id="nav-comercial-tab-<?php echo($param["ID"]); ?>" data-toggle="tab" href="#nav-comercial<?php echo($param["ID"]); ?>" role="tab" aria-controls="nav-comercial<?php echo($param["ID"]); ?>" aria-selected="false">Comercial</a>
                                                <a class="nav-item nav-link" id="nav-logistica-tab-<?php echo($param["ID"]); ?>" data-toggle="tab" href="#nav-logistica<?php echo($param["ID"]); ?>" role="tab" aria-controls="nav-logistica<?php echo($param["ID"]); ?>" aria-selected="false">Logistica</a>
                                                <a class="nav-item nav-link" id="nav-perfil-tab-<?php echo($param["ID"]); ?>" data-toggle="tab" href="#nav-perfil<?php echo($param["ID"]); ?>" role="tab" aria-controls="nav-perfil<?php echo($param["ID"]); ?>" aria-selected="false">Perfil</a>
                                                <a class="nav-item nav-link" id="nav-token-tab-<?php echo($param["ID"]); ?>" data-toggle="tab" href="#nav-token<?php echo($param["ID"]); ?>" role="tab" aria-controls="nav-token<?php echo($param["ID"]); ?>" aria-selected="false">Token</a>
                                                <a class="nav-item nav-link" id="nav-detalhesA-tab-<?php echo($param["ID"]); ?>" data-toggle="tab" href="#nav-detalhesA<?php echo($param["ID"]); ?>" role="tab" aria-controls="nav-detalhesA<?php echo($param["ID"]); ?>" aria-selected="false">Detalhes 1</a>
                                                <a class="nav-item nav-link" id="nav-detalhesB-tab-<?php echo($param["ID"]); ?>" data-toggle="tab" href="#nav-detalhesB<?php echo($param["ID"]); ?>" role="tab" aria-controls="nav-detalhesB<?php echo($param["ID"]); ?>" aria-selected="false">Detalhes 2</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-empresa<?php echo($param["ID"]); ?>" role="tabpanel" aria-labelledby="nav-empresa-tab<?php echo($param["ID"]); ?>">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Rede</label>
                                                        <input type="text" class="form-control" id="rede" name="rede" value="<?php echo($param["REDE"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Codigo Empresa</label>
                                                        <input type="text" class="form-control" id="cdEmpresa" name="cdEmpresa" value="<?php echo($param["CODIGO_EMPRESA"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Empresa</label>
                                                    <input type="text" class="form-control" id="empresa" name="empresa" value="<?php echo($param["EMPRESA"]); ?>">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Cnpj</label>
                                                        <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo($param["CNPJ"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Codigo Cliente</label>
                                                        <input type="text" class="form-control" id="cdCliente" name="cdCliente" value="<?php echo($param["CODIGO_CLIENTE"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Empresa Matriz</label>
                                                        <input type="text" class="form-control" id="cdMatriz" name="cdMatriz" value="<?php echo($param["EMPRESA_MATRIZ"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Cfop</label>
                                                        <input type="text" class="form-control" id="cfop" name="cfop" value="<?php echo($param["CFOP"]); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="nav-comercial<?php echo($param["ID"]); ?>" role="tabpanel" aria-labelledby="nav-comercial-tab<?php echo($param["ID"]); ?>">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="recipient-name" class="col-form-label">Representante</label>
                                                        <input type="text" class="form-control" id="representante" name="representante" value="<?php echo($param["CODIGO_REPRESENTANTE"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Codigo Comercial</label>
                                                        <input type="text" class="form-control" id="comercial" name="comercial" value="<?php echo($param["CONDICAO_COMERCIAL"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label" title="Informa que esta empresa sera responsavel por envio de preco e produtos.">Envia Varejo</label>
                                                        <select class="form-control input-sm" id="varejo" name="varejo" placeholder="Envia Varejo">
                                                            <option value="0" <?php echo($param["ENVIA_VAREJO_INTERNET"] == 0 ? "selected" : ""); ?>>Não</option>
                                                            <option value="1" <?php echo($param["ENVIA_VAREJO_INTERNET"] == 1 ? "selected" : ""); ?>>Sim</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Tab Preco De</label>
                                                        <input type="text" class="form-control" id="precoDe" name="precoDe" value="<?php echo($param["TAB_PRECO_DE"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Tab Preco Por</label>
                                                        <input type="text" class="form-control" id="precoPor" name="precoPor" value="<?php echo($param["TAB_PRECO_POR"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo($param["EMAIL"]); ?>">
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="nav-logistica<?php echo($param["ID"]); ?>" role="tabpanel" aria-labelledby="nav-logistica-tab<?php echo($param["ID"]); ?>">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Codigo Estoque</label>
                                                        <input type="text" class="form-control" id="estoque" name="estoque" value="<?php echo($param["CODIGO_ESTOQUE"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Codigo Saldo</label>
                                                        <input type="text" class="form-control" id="saldo" name="saldo" value="<?php echo($param["CODIGO_SALDO"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="recipient-name" class="col-form-label" title="Centro de Distribuição do Produto">Doca</label>
                                                        <input type="text" class="form-control" id="doca" name="doca" value="<?php echo($param["DOCA"]); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="nav-perfil<?php echo($param["ID"]); ?>" role="tabpanel" aria-labelledby="nav-perfil-tab<?php echo($param["ID"]); ?>">         
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Account Name</label>
                                                    <input type="text" class="form-control" id="account" name="account" value="<?php echo($param["ACCOUNT_NAME"]); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Seller</label>
                                                    <input type="text" class="form-control" id="seller" name="seller" value="<?php echo($param["SELLER"]); ?>">
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="nav-token<?php echo($param["ID"]); ?>" role="tabpanel" aria-labelledby="nav-token-tab<?php echo($param["ID"]); ?>">         
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label" title="Token de Autenticação a ApiHub">Token</label>
                                                    <input type="text" class="form-control" id="token" name="token" value="<?php echo($param["TOKEN"]); ?>">
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="nav-detalhesA<?php echo($param["ID"]); ?>" role="tabpanel" aria-labelledby="nav-detalhesA-tab<?php echo($param["ID"]); ?>">         
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Razão Social</label>
                                                    <input type="text" class="form-control" id="RazaoSocial" name="RazaoSocial" value="<?php echo($param["RazaoSocial"]); ?>">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">IE</label>
                                                        <input type="text" class="form-control" id="IE" name="IE" value="<?php echo($param["IE"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">IM</label>
                                                        <input type="text" class="form-control" id="IM" name="IM" value="<?php echo($param["IM"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="recipient-name" class="col-form-label">Codigo Gerente</label>
                                                        <input type="text" class="form-control" id="CodigoGerente" name="CodigoGerente" value="<?php echo($param["CodigoGerente"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="recipient-name" class="col-form-label">Codigo Caixa</label>
                                                        <input type="text" class="form-control" id="CodigoCaixa" name="CodigoCaixa" value="<?php echo($param["CodigoCaixa"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="recipient-name" class="col-form-label">Codigo Vendedor</label>
                                                        <input type="text" class="form-control" id="CodigoVendedor" name="CodigoVendedor" value="<?php echo($param["CodigoVendedor"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Endereço</label>
                                                    <input type="text" class="form-control" id="Endereco" name="Endereco" value="<?php echo($param["Endereco"]); ?>">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-8">
                                                        <label for="recipient-name" class="col-form-label">Bairro</label>
                                                        <input type="text" class="form-control" id="Bairro" name="Bairro" value="<?php echo($param["Bairro"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="recipient-name" class="col-form-label">Cep</label>
                                                        <input type="text" class="form-control" id="Cep" name="Cep" value="<?php echo($param["Cep"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label">Cidade</label>
                                                        <input type="text" class="form-control" id="Cidade" name="Cidade" value="<?php echo($param["Cidade"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="recipient-name" class="col-form-label">UF</label>
                                                        <input type="text" class="form-control" id="UF" name="UF" value="<?php echo($param["UF"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="recipient-name" class="col-form-label">Telefone</label>
                                                        <input type="text" class="form-control" id="Telefone" name="Telefone" value="<?php echo($param["Telefone"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Obs</label>
                                                    <input type="text" class="form-control" id="Obs" name="Obs" value="<?php echo($param["Obs"]); ?>">
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="nav-detalhesB<?php echo($param["ID"]); ?>" role="tabpanel" aria-labelledby="nav-detalhesB-tab<?php echo($param["ID"]); ?>">         
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">AppUser</label>
                                                    <input type="text" class="form-control" id="AppUser" name="AppUser" value="<?php echo($param["AppUser"]); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">AppPassword</label>
                                                    <input type="text" class="form-control" id="AppPassword" name="AppPassword" value="<?php echo($param["AppPassword"]); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">AppToken</label>
                                                    <input type="text" class="form-control" id="AppToken" name="AppToken" value="<?php echo($param["AppToken"]); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label" title="Logo da Empresa">Url Logo</label>
                                                    <input type="text" class="form-control" id="Logo" name="Logo" value="<?php echo($param["URL_LOGO"]); ?>">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label" title="Nome da Pltaforma Ecomm utilizada">Plataforma</label>
                                                        <input type="text" class="form-control" id="Plataforma" name="Plataforma" value="<?php echo($param["PLATAFORMA"]); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="recipient-name" class="col-form-label" title="Habilita o envio de notificações para esta empresa">Envia Email</label>
                                                        <select class="form-control input-sm" id="EnviaNotificacao" name="EnviaNotificacao" placeholder="Envia Email">
                                                            <option value="0" <?php echo($param["ENVIA_NOTIFICACAO"] == 0 ? "selected" : ""); ?>>Não</option>
                                                            <option value="1" <?php echo($param["ENVIA_NOTIFICACAO"] == 1 ? "selected" : ""); ?>>Sim</option>
                                                        </select>
                                                    </div>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="modal-footer">

                                            <div class="form-row">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($param["ID"]); ?>">
                                                    <input type="hidden" class="form-control" id="op" name="op" value="3">
                                                    <input type="hidden" class="form-control" name="acao" id="acao" value="udp">
                                                    <input type="hidden" class="form-control" name="branchid" id="branchid" value="<?php echo($param["BRANCHID"]); ?>">
                                                </div>
                        
                                                <div class="form-group col-md-6">
                                                    <label class="form-check-label input-sm" for="chkAtivo">Ativa Empresa</label>
                                                    <select class="form-control input-sm" id="ativo" name="ativo" placeholder="Ativa Empresa">
                                                        <option value="0" <?php echo($param["STATUS"] == 0 ? "selected" : ""); ?>>Não</option>
                                                        <option value="1" <?php echo($param["STATUS"] == 1 ? "selected" : ""); ?>>Sim</option>
                                                    </select>
                                                
                                                <div class="form-group ">
                                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-warning">Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </tbody>
        </table>


        <div class="modal fade" id="incluirEmpresas" tabindex="-1" role="dialog" aria-labelledby="incluirEmpresas" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="get" action="Model/TabelasApoio.php" id="frmParam" name="frmParam">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="incluirParametros">Incluir Empresas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">BranchId</label>
                                <input type="text" class="form-control" id="branchid" name="branchid" value="">

                                <label for="recipient-name" class="col-form-label">Codigo Empresa</label>
                                <input type="text" class="form-control" id="cdEmpresa" name="cdEmpresa" value="">

                                <label for="recipient-name" class="col-form-label">Empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa" value="">

                                <label for="recipient-name" class="col-form-label">Cnpj</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" value="">

                                <input type="hidden" class="form-control" id="id" name="id" value="">
                                <input type="hidden" class="form-control" id="op" name="op" value="3">
                                <input type="hidden" class="form-control" name="acao" id="acao" value="inc">
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-warning">Incluir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /. box -->
</div>
