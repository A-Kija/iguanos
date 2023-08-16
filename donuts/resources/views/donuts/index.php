<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Donuts List</h1>
        </div>
    </div>
</div>

<div class="container">
  <div class="row">
    <?php foreach ($donuts as $donut) : ?>
        <div class="col-md-4 col-sm-12">
            <div class="one-donut">
                <div class="title">
                    <?= $donut['title'] ?>
                </div>
                <div class="donut">
                    <?php foreach($coatings as $coating) : ?>
                        <?php if ($coating['id'] == $donut['coating']) : ?>
                            <div class="body" style="background:<?= $coating['color'] ?>;">
                                <div class="hole" style="width:<?= 30 + $donut['hole'] * 5 ?>px;height:<?= 30 + $donut['hole'] * 5 ?>px;">
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
                <div class="buttons">
                    <a href="<?= URL . 'donuts/show/' . $donut['id'] ?>" class="btn btn-outline-secondary">VIEW</a>
                    <?php if (check(['admin'])) : ?>
                    <a href="<?= URL . 'donuts/edit/' . $donut['id'] ?>" class="btn btn-outline-secondary">EDIT</a>
                    <a href="<?= URL . 'donuts/delete/' . $donut['id'] ?>" class="btn btn-outline-secondary">DELETE</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
  </div>
</div>