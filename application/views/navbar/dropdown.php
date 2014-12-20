<li class="dropdown">
    <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
        <?php echo $pseudo ?>
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
        <li><a href="#">Options</a></li>
        <li class="divider"></li>
        <li><?php echo anchor(site_url('User/logout'), 'Deconnexion')?></li>
    </ul>
</li>