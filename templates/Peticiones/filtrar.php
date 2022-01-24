<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Peticione[]|\Cake\Collection\CollectionInterface $peticiones
 */
?>
<div class="peticiones index content">
    <?= $this->Html->link(__('New Peticione'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Peticiones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('titulo') ?></th>
                    <th><?= $this->Paginator->sort('firmantes') ?></th>
                    <th><?= $this->Paginator->sort('estado') ?></th>
                    <th><?= $this->Paginator->sort('categorias_id') ?></th>
                    <th><?= $this->Paginator->sort('users_id') ?></th>
                    <th><?= $this->Paginator->sort('photo') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('updated') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peticione as $peticiones): ?>
                <tr>
                    <td><?= h($peticiones->titulo) ?></td>
                    <td><?= $this->Number->format($peticiones->firmantes) ?></td>
                    <td><?= h($peticiones->estado) ?></td>
                    <td><?= $peticiones->has('categoria') ? $this->Html->link($peticiones->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $peticiones->categoria->id]) : '' ?></td>
                    <td><?= $this->Number->format($peticiones->users_id) ?></td>
                    <td><?= $this->Html->image('/webroot/files/peticiones/photo/'.$peticiones->photo, ['alt' => 'CakePHP']);?></td>
                    <td><?= h($peticiones->created) ?></td>
                    <td><?= h($peticiones->updated) ?></td>
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