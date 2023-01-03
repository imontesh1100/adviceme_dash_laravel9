<div id="modal_add" class="modal fade" tabindex="-1" aria-labelledby="modal_add" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">{{$modalTitle}}</h5>
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
                                    <label for="translate" class="">Traduccion</label>
                                     <input name="translate" required="" id="translate" type="text" class="is-touched is-pristine av-valid form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn blue-cs-bg waves-effect waves-light text-white">Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>