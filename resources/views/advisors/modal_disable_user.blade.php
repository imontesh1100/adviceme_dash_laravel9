<div id="modal_disable_user" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Disable User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetForm('disableForm')"></button>
            </div>
            <div class="modal-body">
                <h5>Confirm please</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus unde maxime quae pariatur cupiditate consequatur molestias modi minus sed exercitationem magni ipsam voluptas itaque aperiam velit at dolores, voluptatibus officiis!</p>
                <form action="#" method="post" class="av-valid" id="disableForm">
                    <input type="hidden" name="advisorID" id="advisorID" value="">
                    <div class="form-row">
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="tags" class="">Reason</label>
                                    <select name="disabledOption" required class="form-select is-untouched is-pristine av-valid form-control">
                                        <option>Photoshop</option>
                                        <option>illustrator</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal" onclick="resetForm('disableForm')">Close</button>
                <button type="button" class="btn btn-danger waves-effect waves-light">Disabled</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>