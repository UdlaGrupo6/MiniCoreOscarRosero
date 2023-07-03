<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Habitacion $habitacion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Habitacion'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="habitacion form content">
            <?= $this->Form->create($habitacion) ?>
            <fieldset>
                <legend><?= __('Add Habitacion') ?></legend>
                <?php
                    echo $this->Form->control('numero');
                    echo $this->Form->control('clienteId');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
