<div class="container">
  <div class="row  justify-content-center">
    <div class="col-5">
        <div class="card mt-5">
            <div class="card-header">
                Edit Donut
            </div>
            <div class="card-body">
                <form method="POST" action="<?= URL . 'donuts/update/' . $donut['id'] ?>">
                    <h5 class="card-title">Edit this sweet and cute donut</h5>
                    <p class="card-text">Edit type of donut with chocolate coating or powdered sugar</p>
                    <div class="mb-3">
                        <label class="form-label">Donut title</label>
                        <input type="text" class="form-control" name="title" value="<?= $donut['title'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Donut coating</label>
                        <select class="form-select" name="coating">
                        <?php foreach ($coatings as $coating) : ?>
                            <option value="<?= $coating['id'] ?>" <?= $coating['id'] == $donut['coating'] ? 'selected' : '' ?>><?= $coating['title'] ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="extra" name="extra" <?= $donut['extra'] == 'on' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="extra">
                                Extra coating
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">About Donut</label>
                        <textarea class="form-control" rows="3" name="desc"><?= $donut['desc'] ?>"</textarea>
                    </div>
                    <div class="mb-3" id="--hole">
                        <label class="form-label">Donut hole (2-15 cm): <b><?= $donut['hole'] ?></b><i>cm</i></label>
                        <input type="range" class="form-range" min="2" max="15" name="hole" value="<?= $donut['hole'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="<?= URL . 'donuts' ?>" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>