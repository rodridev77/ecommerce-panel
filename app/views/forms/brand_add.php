<!-- Add-Modal -->
<div class="modal fade" id="brand-addform" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Brand</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container" id="add-modal-content">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 mb-3">
                            <form method="POST" id="brand-form">
                                <div class="form-group">
                                    <label for="brand-provider">Fornecedor</label>
                                    <select class="form-control" id="brand-provider" name="brand-provider"  required="">

                                    </select>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-12">
                                        <label for="brand-name">Marca: </label>
                                        <input type="text" class="form-control" name="brand-name" id="brand-name" required="required" value="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-12" id="items-check">

                                    </div>
                                </div>

                                <div class="form-row justify-content-center">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-dark enviar" name="enviar" onclick="brand_add()">Salvar</button>
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
