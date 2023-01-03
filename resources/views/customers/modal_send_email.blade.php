<div id="modal_email" class="modal fade" tabindex="-1" aria-labelledby="modal_email" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Send E-mail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form novalidate="" action="#" method="get" class="av-valid">
                    <div class="form-row">
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name" class="">Name</label>
                                    <input name="name" required="" id="name" type="text" class="is-touched is-pristine av-valid form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="tags" class="">Subject</label>
                                    <select multiple="" name="tags" required="" id="tags" class="form-select is-untouched is-pristine av-valid form-control">
                                        <option>Photoshop</option>
                                        <option>illustrator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="msg" class="">Message</label>
                                    <textarea name="msg" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success waves-effect waves-light">Send</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>