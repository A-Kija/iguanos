<div class="container">
  <div class="row  justify-content-center">
    <div class="col-5">
        <div class="card mt-5">
            <div class="card-header">
                Confirm delete
            </div>
            <div class="card-body">
                <form method="POST" action="<?= URL . 'donuts/destroy/' . $donut['id'] ?>">
                    <h5 class="card-title">Do you really want to delete?</h5>
                    <p class="card-text">You about to delete <b><?= $donut['title'] ?></b> with <i><?= $donut['hole'] ?>cm</i> hole</p>
                    <div class="mt-5">
                    <button type="submit" class="btn btn-danger">YES, DELETE</button>
                    <a href="<?= URL . 'donuts' ?>" class="btn btn-success">NO, GO BACK</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>