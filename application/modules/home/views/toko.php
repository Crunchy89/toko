<div class="card mt-5 mb-5">
    <div class="row no-gutters">
        <div class="col-md-4">
            <div class="container p-2">
                <iframe class="card-img" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=116.33682757616045%2C-8.704717393304053%2C116.33982092142108%2C-8.703121298992107&amp;layer=mapnik&amp;marker=-8.703919346998928%2C116.33832424879074" style="border: 1px solid black"></iframe><br /><small><a href="https://www.openstreetmap.org/?mlat=-8.70392&amp;mlon=116.33832#map=19/-8.70392/116.33832&amp;layers=N">View Larger Map</a></small>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <table>
                    <tr>
                        <th>
                            <h3>Nama Toko</h3>
                        </th>
                        <td>
                            <h3>: <?= $toko->nama ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <h3>Alamat Toko</h3>
                        </th>
                        <td>
                            <h3>: <?= $toko->alamat ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <h3>Email</h3>
                        </th>
                        <td>
                            <h3>: <?= $toko->email ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <h3>Telepon Toko</h3>
                        </th>
                        <td>
                            <h3>: <?= $toko->no_telp ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <h3>Media Sosial</h3>
                        </th>
                        <td>
                            <h3>:
                                <?php foreach ($medsos as $rows) : ?>
                                    <a href="<?= $rows->link ?>" class="btn <?= $rows->warna ?>"><i class="<?= $rows->icon ?>"></i></a>
                                <?php endforeach; ?>
                            </h3>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>