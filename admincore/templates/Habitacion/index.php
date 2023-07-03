<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Habitacion> $habitacion
 */
?>
<div class="habitacion index content">
    <?= $this->Html->link(__('New Habitacion'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Habitacion') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('habitacionId') ?></th>
                    <th><?= $this->Paginator->sort('numero') ?></th>
                    <th><?= $this->Paginator->sort('clienteId') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($habitacion as $habitacion): ?>
                <tr>
                    <td><?= $this->Number->format($habitacion->habitacionId) ?></td>
                    <td><?= $this->Number->format($habitacion->numero) ?></td>
                    <td><?= $this->Number->format($habitacion->clienteId) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $habitacion->habitacionId]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $habitacion->habitacionId]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $habitacion->habitacionId], ['confirm' => __('Are you sure you want to delete # {0}?', $habitacion->habitacionId)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
