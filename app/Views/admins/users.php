<h4 class="is-block-title">Liste des utilisateurs Inscrits</h4>
<hr>
<div class="row no-margin">
    <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Code</th>
            <th>Date</th>
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
                <td><?= $data->name; ?></td>
                <td><?= $data->phone; ?></td>
                <td><?= $data->email; ?></td>
                <td><?= $data->uniqid; ?></td>
                <td><span class="is-indication"><?= $data->dateFormat($data->add_date); ?></span></td>
                <td>
                    <div class="btn-group">
                        <?php if($data->state == 1 ): ?>
                            <a href="<?= $data->admins('users/edit/'.$data->users_id); ?>"
                               class="btn btn-default btn-sm" data-toggle="tooltip"
                               title="Desactiver"><i class="fa fa-close"></i>
                            </a>
                        <?php elseif($data->state == 0 ): ?>
                            <a href="<?= $data->admins('users/edit/'.$data->users_id); ?>"
                               class="btn btn-default btn-sm" data-toggle="tooltip"
                               title="Activer"><i class="fa fa-check"></i>
                            </a>
                        <?php endif; ?>
                        <a href="<?= $data->admins('users/delete/'.$data->users_id); ?>"
                           class="btn btn-danger btn-sm" data-toggle="tooltip"
                           title="Supprimer"><i class="fa fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>