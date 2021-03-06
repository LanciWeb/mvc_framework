<form action="" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
  <?php if ($team->logo) : ?>
    <img src="/<?= $team->logo ?>" alt="<?= $team->name ?>" />
  <?php endif; ?>
  <div class="input-group mb-3 mt-2">
    <label class="input-group-text" for="logo">Scudetto</label>
    <input type="file" class="form-control" id="logo" name="logo">
  </div>

  <div class="mb-3 has-validation">
    <label for="name" class="form-label">Nome squadra</label>
    <input type="text" class="form-control <?php if ($errors['name']) echo 'is-invalid' ?>" id="name" name="name" required value="<?= $team->name ?>">
    <div class="invalid-feedback">
      <?= $errors['name'] ?>
    </div>
  </div>

  </div>
  <div class="mb-3">
    <label for="city" class="form-label">Citt&agrave;</label>
    <input type="text" class="form-control" id="city" name="city" value="<?= $team->city ?>">
  </div>
  <div class="mb-3">
    <label for="points" class="form-label">Punti</label>
    <input type="number" class="form-control" id="points" name="points" min="0" max="110" step="1" value="<?= $team->points ?>">
  </div>
  <div class="mb-3">
    <label for="goal_diff" class="form-label">Differenza reti</label>
    <input type="number" class="form-control" id="goal_diff" name="goal_diff" min="-50" max="60" step="1" value="<?= $team->goal_diff ?>">
  </div>
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">Salva</button>
  </div>
</form>