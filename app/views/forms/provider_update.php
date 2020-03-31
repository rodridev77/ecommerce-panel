<!-- Add-Modal -->
<div class="modal fade" id="prov-editform" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Provider</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container" id="add-modal-content">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 mb-3">
                            <form method="POST" id="prov-form">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-12">
                                        <label for="prov-name">Name: </label>
                                        <input type="text" class="form-control" name="prov-name" id="prov-name" required="required" value="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-12">
                                        <label for="prov-cnpj">CNPJ: </label>
                                        <input type="text" class="form-control" name="prov-cnpj" id="prov-cnpj" required="required" value="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-12">
                                        <label for="prov-email">Email: </label>
                                        <input type="email" class="form-control" name="prov-email" id="prov-email" required="required" value="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-12">
                                        <label for="prov-fone">Fone: </label>
                                        <input type="text" class="form-control" name="prov-fone" id="prov-fone" required="required" value="">
                                    </div>
                                </div>

                                <div class="form-row justify-content-center">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-dark enviar" name="enviar" onclick="prov_update()">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
