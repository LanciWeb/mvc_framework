<header>
  <div class="d-flex mb-5">
    <figure><img src="https://upload.wikimedia.org/wikipedia/it/f/f5/Logo_Serie_A_TIM_2019.png" alt="Serie A" /></figure>
    <h1>Serie A 2020/21</h1>
  </div>
</header>

<section>
  <?php if (empty($teams)) : ?>
    <div class="alert alert-info" role="alert">
      Nessuna squadra trovata
    </div>
  <?php else : ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Squadra</th>
          <th scope="col">Punti</th>
          <th scope="col">D/R</th>
          <th scope="col">Citt&agrave;</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i = 0; $i < count($teams); $i++) : ?>
          <tr>
            <th scope="row"><?= $i + 1 ?></th>
            <td>
              <div class="d-flex align-items-center">
                <figure>
                  <img src="<?= $teams[$i]['logo'] ?>" />
                </figure> <?= $teams[$i]['name'] ?>
              </div>
            </td>
            <td><?= $teams[$i]['points'] ?></td>
            <td><?= $teams[$i]['goal_diff'] ?></td>
            <td><?= $teams[$i]['city'] ?></td>
            <td></td>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>
  <?php endif; ?>
</section>