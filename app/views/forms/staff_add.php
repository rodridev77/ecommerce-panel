<!-- Add-Modal -->
<div class="modal fade" id="staff-addform" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Staff</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container" id="add-modal-content">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 mb-3">
                            <form method="POST" id="staff-form">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-12">
                                        <label for="staff-name">Staff Name: </label>
                                        <input type="text" class="form-control" name="staff-name" id="staff-name"  required="required">
                                    </div>
                                </div>

                                <div class="form-row justify-content-center">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-dark enviar" name="send" onclick="staff_add()">Salvar</button>
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
