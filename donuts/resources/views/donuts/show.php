<div class="container">
  <div class="row  justify-content-center">
    <div class="col-5">
        <div class="card mt-5">
            <div class="card-header">
            <?= $donut['title'] ?>
            </div>
            <div class="card-body">
            <div class="one-donut">
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
                <div class="desc">
                <?= $donut['desc'] ?>
                </div>
                <div class="buttons">
                    <a href="<?= URL . 'donuts/' ?>" class="btn btn-outline-info">ALL</a>
                    <a href="<?= URL . 'donuts/edit/' . $donut['id'] ?>" class="btn btn-outline-success">EDIT</a>
                    <a href="<?= URL . 'donuts/delete/' . $donut['id'] ?>" class="btn btn-outline-danger">DELETE</a>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div>