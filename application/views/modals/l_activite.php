<div class="modal fade" id="l_activite">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
            /*
             * Dans un modal du type 'liste déroulante',
             * on part du principe que les arguements sont donnés à la vue
             * (via 'Static_pages')
             */
            $this->load->library('form_validation');
            echo validation_errors();
            echo form_open('verify_filter/l_activite');
            $types = array('je', 'n\{ai', 'pas', 'encore', 'fini', 'cette', 'partie', 'il', 'est', 'plus', 'que', 'temps', 'pour', 'moi', 'de', 'la', 'finir');
            ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Saison de l'activite</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <label for="lieu_act">Lieu de l'activite : </label>
                        <select  class="select form-control" id="lieu_act">
                            <?php
                            foreach ($types as $value) {
                                echo "<option class=\"form-control\">$value</option>" . PHP_EOL;
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Allons-y !</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->