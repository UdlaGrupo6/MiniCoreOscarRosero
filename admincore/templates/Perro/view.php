<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Perro $perro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Perro'), ['action' => 'edit', $perro->perroId], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Perro'), ['action' => 'delete', $perro->perroId], ['confirm' => __('Are you sure you want to delete # {0}?', $perro->perroId), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Perro'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Perro'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="perro view content">
            <h3><?= h($perro->perroId) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($perro->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Size') ?></th>
                    <td><?= h($perro->size) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vacunas') ?></th>
                    <td><?= h($perro->vacunas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dieta') ?></th>
                    <td><?= h($perro->dieta) ?></td>
                </tr>
                <tr>
                    <th><?= __('PerroId') ?></th>
                    <td><?= $this->Number->format($perro->perroId) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
