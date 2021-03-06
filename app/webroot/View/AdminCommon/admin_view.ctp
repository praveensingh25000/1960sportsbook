<?php if (!empty($fields)) : ?>

    <div class="<?php echo $pluralName; ?> view">    
        <h2><?php echo $singularName; ?></h2>
        <?php if (isset($noTranslation)): ?>
            <div>No translation for this language, <?php echo $this->Html->link('create', array('action' => 'edit', $this->params['pass'][0])); ?></div>
        <?php else: ?>    

            <table class="items" cellpadding="0" cellspacing="0">
                <?php $i = 1; ?>
                <?php foreach ($fields[$model] as $key => $value): ?>
                    <?php
                    $class = '';
                    if ($i++ % 2 == 0)
                        $class = 'alt';
                    ?>
                    <tr>
                        <th class="specalt"><?php echo Inflector::humanize($key); ?></th>
                        <td><?php echo $value; ?></td>
                    </tr>

                <?php endforeach; ?>

            </table>


        <?php endif; ?>
    </div>
<?php endif; ?>