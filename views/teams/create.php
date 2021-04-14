<header class="mb-5">
  <div class="d-flex align-items-center justify-content-between">
    <h1>Crea nuova squadra</h1>
    <a href="/teams" class="btn btn-secondary">Indietro</a>
  </div>
  <hr />
</header>

<section>
  <form action="" method="POST" class="needs-validation" novalidate>
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
    <button type="submit" class="btn btn-primary">Salva</button>
  </form>
</section>