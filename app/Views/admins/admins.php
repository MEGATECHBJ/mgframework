<a href="<?= $this->entity()->admins('admins/create'); ?>" class="btn btn-success pull-right">Ajouter un administrateur</a>
<h4 class="is-block-title">Liste des administrateurs</h4>
<hr>
<div class="row no-gutters">
    <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom d'utilisateur</th>
            <th>Email</th>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Droits</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $nbre = 0;
        foreach ($admins AS $data):
            $nbre++;
            ?>
            <tr>
                <td><?= $nbre; ?></td>
                <td><?= $data->username; ?></td>
                <td><?= $data->email; ?></td>
                <td><?= $data->name; ?></td>
                <td><?= $data->phone; ?></td>
                <td>
                    <?php if($data->userright == 1 ): ?> Super Administrateur
                    <?php elseif($data->userright == 2 ): ?> Administrateur
                    <?php elseif($data->userright == 3 ): ?> Rédacteur
                    <?php else: ?> Utilisateur
                    <?php endif; ?>
                </td>
                <td>
                    <div class="btn-group">
                        <a href="<?= $this->entity()->admins('admins/'.$data->id.'/edit') ?>"
                           class="btn btn-secondary btn-sm" title="modifier">
                            <img src="<?= $this->entity()->img_file('icons/bx-pencil.svg') ?>" width="15" class="is-light" alt="">
                        </a>
                        <a href="#" data-toggle="modal" data-target="#delete<?= $data->id ?>"
                           class="btn btn-danger btn-sm" title="supprimer">
                            <img src="<?= $this->entity()->img_file('icons/bx-trash.svg') ?>" width="15" class="is-light" alt="">
                        </a>
                    </div>
                </td>
            </tr>
            <?= $this->entity()->confirm($data->id, $url, 'delete', 'Voulez-vous vraiment supprimez cette ligne ?') ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
