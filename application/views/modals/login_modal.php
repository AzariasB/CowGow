<div class="modal fade" id="connexion">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Connexion</h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('verifylogin'); ?>
                <p><input type="text" class="span3 form-control" name="pseudo" placeholder="Pseudo" autofocus=""></p>
                <p><input type="password" class="span3 form-control" name="passwd" placeholder="Password"></p>
                <div class="left">
                    <button type="submit" class="btn btn-primary">Connexion</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->