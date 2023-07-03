<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicio $servicio
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h1>Contador de servicios en rango de fechas</h1>
            <p>El número de servicios en el rango de fechas es: <?php echo $serviceCount; ?></p>
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Servicio'), ['action' => 'edit', $servicio->servicioId], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Servicio'), ['action' => 'delete', $servicio->servicioId], ['confirm' => __('Are you sure you want to delete # {0}?', $servicio->servicioId), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Servicio'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Servicio'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="servicio view content">
            <h3><?= h($servicio->servicioId) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($servicio->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($servicio->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo') ?></th>
                    <td><?= h($servicio->costo) ?></td>
                </tr>
                <tr>
                    <th><?= __('ServicioId') ?></th>
                    <td><?= $this->Number->format($servicio->servicioId) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>