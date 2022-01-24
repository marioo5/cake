<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Peticione $peticione
 * @var \Cake\Collection\CollectionInterface|string[] $categorias
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */

$categoria = array(
    '1' => 'Sanidad',
    '2' => 'Medio ambiente',
    '3' => 'Educación',
    '4' => 'Justicia económica',
    '5' => 'Refugiados',
    '6' => 'Derechos de las mujeres',
    '7' => 'Lgtb',
    '8' => 'Alimentación',
    '9' => 'Patrimonio cultural'
);
?>
<div class="cCenterPanel" tabindex="-1">
    <div class="container">
        <div class=" row contentPanel">
            <div class="col-lg-12">
                <div data-region-name="content">
                    <div class="grouped-form">
                        <div class="title slds-p-around_small slds-col slds-size_12-of-12 slds-small-size_12-of-12 slds-medium-size_12-of-12 slds-large-size_12-of-12">
                            <h1 class="headerLabel">Deseo añadir una petición</h1>
                        </div>
                        <?= $this->Form->create($peticione, ['type'=>'file']) ?>
                            <div class="grouped-form">
                                <div class="control-group" data-view="components/input" data-type="email" data-name="email" data-autocorrect="off" data-autocapitalize="off" data-placeholder="Título" data-autofocus="true" data-value="" data-render="true">
                                    <div class="control">
                                        <label class="uiLabel-left form-element__label uiLabel" for="304:343;a"><span class="" data-aura-rendered-by="625:0">Dale un título</span>
                                            <span class="required " title="obligatorio" data-aura-rendered-by="305:343;a">*</span>
                                            <span class="input bg-brighter">
                                                 <?php
                                                 echo $this->Form->text('titulo', [
                                                    'placeholder' => 'Título que deseas darle a tu petición'
                                                ]);
                                                 ?>

                                                </span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control">
                                        <label class="uiLabel-left form-element__label uiLabel" for="304:343;a"><span class="" data-aura-rendered-by="625:0">Descripción</span>
                                            <span class="required " title="obligatorio" data-aura-rendered-by="305:343;a">*</span>
                                        </label>
                                       <?php
                                        echo $this->Form->textarea('descripcion',['class' => 'textarea', 'id' => '304:343;a', 'col' => '20', 'rows' => '5','placeceholder' => 'Describe las personas afectadas y el problema qu enfrentanLos lectores son más propensos a tomar acción cuando comprenden quien está realmente afectado.
                                        Describe la soluciónExplica qué tiene que pasar y quién puede marcar la diferencia. Deja claro qué pasa si ganas o pierdes.
                                        Hazlo personalEs más probable que los lectores firmen y apoyen tu petición si dejas claro por qué te importa.
                                        Respeta a los demásNo hagas bullying, ni utilices un discurso de odio, violento o falso.'])?>

                                </div>
                                <div class="control-group">
                                    <div class="control">
                                        <label class="uiLabel-left form-element__label uiLabel" for="304:343;a"><span class="" data-aura-rendered-by="625:0">Destinatario</span>
                                            <span class="required " title="obligatorio" data-aura-rendered-by="305:343;a">*</span>
                                        </label>
                                        <?= $this->form->textarea('destinatario',[ 'class' => 'textarea', 'id' => '304:343;a', 'placeholder' => 'Elige el destinatario o destinatarios a los que dirigir tu petición.']) ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control">
                                        <label class="uiLabel-left form-element__label uiLabel" for="304:343;a"><span class="" data-aura-rendered-by="625:0">Seleciona una categoria para tu
                                                petición</span>
                                            <span class="required " title="obligatorio" data-aura-rendered-by="305:343;a">*</span>
                                        </label>
                                        <?php echo $this->Form->select('categoria', $categoria);?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control"><label class="uiLabel-left form-element__label uiLabel" for="304:343;a"><span class="">Sube una imagen</span>
                                            <span class="required " title="obligatorio">*</span>
                                        </label>
                                        <?= $this->Form->file('photo',['class' => 'btn phxxl'])?>
                                    </div>
                                </div>
                                <div class="control-group mtm mbn">
                                    <div class="control">
                                    <?= $this->Form->button('Submit',['value' => 'Confirmar petición', 'class' => 'btn btn-full btn-action btn-big js-login-button']) ?>

                                    </div>
                                </div>
                            </div>
                         <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 hidden-sm hidden-xs mts mbxxl">
                <div class="txt-c mbl mts mtxxxl">
                </div>
            </div>
        </div>
    </div>
</div>


