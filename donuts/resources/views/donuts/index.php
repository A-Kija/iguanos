<h1>Donuts List</h1>
<div class="container">
  <div class="row">
    <?php foreach ($donuts as $donut) : ?>
        <div class="col-4">
            <div class="one-donut">
                <div class="title">
                    <?= $donut['title'] ?>
                </div>
                <div class="donut">
                    <?= $donut['title'] ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
  </div>
</div>