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
            <?= $this->Html->link(__('Edit Habitacion'), ['action' => 'edit', $habitacion->habitacionId], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Habitacion'), ['action' => 'delete', $habitacion->habitacionId], ['confirm' => __('Are you sure you want to delete # {0}?', $habitacion->habitacionId), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Habitacion'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Habitacion'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="habitacion view content">
            <h3><?= h($habitacion->habitacionId) ?></h3>
            <table>
                <tr>
                    <th><?= __('HabitacionId') ?></th>
                    <td><?= $this->Number->format($habitacion->habitacionId) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero') ?></th>
                    <td><?= $this->Number->format($habitacion->numero) ?></td>
                </tr>
                <tr>
                    <th><?= __('ClienteId') ?></th>
                    <td><?= $this->Number->format($habitacion->clienteId) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
