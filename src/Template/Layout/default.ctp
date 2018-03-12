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

$cakeDescription = 'CakePHP: the rapid development php framework';
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
        <?= $this->Html->meta('icon') ?>
        
            <!-- BootstrapJquery -->
        <?= $this->Html->css('bootstrap.min.css');?>
        <?= $this->Html->script('jquery.min.js');?>
        <?=  $this->Html->script('bootstrap.min.js');?>
        
            <!-- Basic css et utils Cake-->
        <?= $this->Html->css('base.css') ?>
        <?= $this->Html->css('cake.css') ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        <a href="/csport/truc/contact?controler=contact">Contact</a>
        <a href="/csport/truc/equipe?controler=equipe">Equipe</a>
        <a href="/csport/truc/mentions?controler=mentions">Mentions légales</a>
        <a href="/csport/truc/faq?controler=faq">FAQ</a>
    </footer>
    </body>
</html>
