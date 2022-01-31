<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Peticione[]|\Cake\Collection\CollectionInterface $peticiones
 */
?>
<div class="peticiones index content">
    <h3><?= __('Mis Firmas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('titulo') ?></th>
                <th><?= $this->Paginator->sort('firmantes') ?></th>
                <th><?= $this->Paginator->sort('estado') ?></th>
                <th><?= $this->Paginator->sort('categoria_id') ?></th>
                <th><?= $this->Paginator->sort('users_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('updated') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($peticiones as $peticione): ?>
                <tr>
                    <td><?= $this->Number->format($peticione->id) ?></td>
                    <td><?= h($peticione->titulo) ?></td>
                    <td><?= $this->Number->format($peticione->firmantes) ?></td>
                    <td><?= h($peticione->estado) ?></td>
                    <td><?= $peticione->has('categoria_id') ? $this->Html->link($peticione->categoria_id, ['controller' => 'Categorias', 'action' => 'view', $peticione->categoria_id]) : '' ?></td>
                    <td><?= $this->Number->format($peticione->users_id) ?></td>
                    <td><?= h($peticione->created) ?></td>
                    <td><?= h($peticione->updated) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $peticione->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peticione->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peticione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peticione->id)]) ?>
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
