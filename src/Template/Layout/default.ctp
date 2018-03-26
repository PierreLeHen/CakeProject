<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CAP SPORTS';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <!-- Favicon -->
    <?= $this->Html->meta(
        'favicon.ico',
        '/favicon.ico',
        ['type' => 'icon']
    );
    ?>

    <!-- BootstrapJquery -->
    <?= $this->Html->css('bootstrap.min.css'); ?>
    <?= $this->Html->script('jquery.min.js'); ?>
    <?= $this->Html->script('bootstrap.min.js'); ?>


    <!-- Basic css et utils Cake-->
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
</nav>
<?= $this->Flash->render() ?>
<div class="background_header">
    <p>Démogé - Juin de Faucal - Le Hen - Marchand, Options B, E et F-</p>
    <p class="text-align-r"><a href="http://projetweb.capcoursier.fr/">http://projetweb.capcoursier.fr/</a></p></p>
</div>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
    <p><?= $this->html->link("Contact", ["controller" => "Main", "action" => "contact"]) ?>
        <?= $this->html->link("Equipe", ["controller" => "Main", "action" => "equipe"]) ?>
        <?= $this->html->link("Faq", ["controller" => "Main", "action" => "faq"]) ?>
        <?= $this->html->link("Mentions légales", ["controller" => "Main", "action" => "mentions"]) ?>
        <?= $this->html->link("GIT", ["controller" => "Main", "action" => "git"]) ?>
    </p>

</footer>
</body>
</html>
