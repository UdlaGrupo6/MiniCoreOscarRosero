<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Perro> $perro
 */
?>
<div class="perro index content">
    <?= $this->Html->link(__('New Perro'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Perro') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('perroId') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('size') ?></th>
                    <th><?= $this->Paginator->sort('vacunas') ?></th>
                    <th><?= $this->Paginator->sort('dieta') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($perro as $perro): ?>
                <tr>
                    <td><?= $this->Number->format($perro->perroId) ?></td>
                    <td><?= h($perro->nombre) ?></td>
                    <td><?= h($perro->size) ?></td>
                    <td><?= h($perro->vacunas) ?></td>
                    <td><?= h($perro->dieta) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $perro->perroId]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $perro->perroId]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $perro->perroId], ['confirm' => __('Are you sure you want to delete # {0}?', $perro->perroId)]) ?>
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
