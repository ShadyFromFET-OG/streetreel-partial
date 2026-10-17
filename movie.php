<?php
require __DIR__ . '/includes/layout.php';

$m = find_movie((int)($_GET['id'] ?? 0));
if (!$m) {
    http_response_code(404);
    page_start('Not found');
    echo h1('Reel not found');
    echo '<p class="mt-4 text-lg text-paper/80">That movie was pulled off the wall or never existed.</p>';
    echo '<a href="index.html#wall" class="inline-block mt-6 bg-blood font-stencil uppercase px-6 py-3 slab press">Back to the wall</a>';
    page_end();
    exit;
}
$id = $m['id'];
$inCart = in_array($id, cart_ids(), true);
$related = array_slice(array_values(array_filter(MOVIES, fn($r) => $r['genre_slug'] === $m['genre_slug'] && $r['id'] !== $id)), 0, 4);

page_start($m['title']);
?>
<div class="grid lg:grid-cols-12 gap-12">
  <div class="lg:col-span-5">
    <div class="relative tilt max-w-md mx-auto lg:mx-0" style="--r:-2deg">
      <span class="tape" style="left:50%;top:-14px;margin-left:-42px;--tr:4deg"></span>
      <img src="<?= e(poster_src($m)) ?>" alt="Poster for <?= e($m['title']) ?>" width="600" height="900" class="w-full aspect-[2/3] object-cover border-2 border-paper/30 shadow-[10px_10px_0_#000]">
    </div>
  </div>

  <div class="lg:col-span-7">
    <a href="index.html#wall" class="inline-block font-stencil uppercase text-sm border-2 border-paper/60 px-3 py-1 hover:border-hazard mb-5"><?= e($m['genre']) ?></a>
    <?= h1($m['title'], 'text-6xl sm:text-8xl') ?>
    <p class="font-marker text-hazard text-2xl mt-5 -rotate-1"><?= e($m['tagline']) ?></p>

    <dl class="mt-8 grid grid-cols-2 sm:grid-cols-4 border-2 border-paper/40 font-mono text-sm">
      <div class="p-3 border-r-2 border-paper/40"><dt class="text-paper/60">Released</dt><dd class="font-bold text-base"><?= (int)$m['year'] ?></dd></div>
      <div class="p-3 sm:border-r-2 border-paper/40"><dt class="text-paper/60">Runtime</dt><dd class="font-bold text-base"><?= (int)$m['runtime'] ?> min</dd></div>
      <div class="p-3 border-t-2 sm:border-t-0 border-r-2 border-paper/40"><dt class="text-paper/60">Rated</dt><dd class="font-bold text-base"><?= e($m['rating']) ?></dd></div>
      <div class="p-3 border-t-2 sm:border-t-0 border-paper/40"><dt class="text-paper/60">Director</dt><dd class="font-bold text-base"><?= e($m['director']) ?></dd></div>
    </dl>

    <p class="mt-8 max-w-prose text-lg leading-relaxed text-paper/90"><?= e($m['synopsis']) ?></p>

    <div class="mt-10 paper-sheet torn-b p-6 pb-10 max-w-lg -rotate-1">
      <p class="font-display font-black text-6xl leading-none"><?= money($m['price']) ?></p>
      <p class="mt-2 font-mono text-sm">Digital access. Pay once and it stays in your library.</p>
      <div class="mt-5" id="buyBox">
        <?php if ($inCart): ?>
          <a href="cart.php" class="inline-block bg-asphalt text-paper font-stencil uppercase px-6 py-3 slab press">Go to cart</a>
        <?php else: ?>
          <button id="addBtn" type="button" class="bg-blood text-paper font-stencil uppercase px-6 py-3 slab press">Add to cart</button>
        <?php endif; ?>
        <p id="msg" class="mt-3 font-mono text-sm font-bold" role="status"></p>
      </div>
    </div>
  </div>
</div>

<?php if ($related): ?>
<section class="mt-24">
  <h2 class="font-display font-black uppercase text-4xl sm:text-5xl leading-none mb-8">More from <?= e($m['genre']) ?></h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    <?php foreach ($related as $i => $r): ?>
      <a href="movie.php?id=<?= (int)$r['id'] ?>" class="block tilt" style="--r:<?= [-1.5, 1, -0.8, 1.6][$i % 4] ?>deg">
        <img src="<?= e(poster_src($r)) ?>" alt="Poster for <?= e($r['title']) ?>" loading="lazy" width="600" height="900" class="w-full aspect-[2/3] object-cover border-2 border-paper/25">
        <span class="block mt-2 font-display font-extrabold uppercase text-lg leading-none"><?= e($r['title']) ?></span>
        <span class="font-mono text-xs text-paper/70"><?= (int)$r['year'] ?>, <?= money($r['price']) ?></span>
      </a>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<script>
const addBtn = document.getElementById('addBtn');
if (addBtn) addBtn.addEventListener('click', async () => {
  try {
    await reelCart('add', <?= (int)$id ?>);
    document.getElementById('buyBox').innerHTML = '<a href="cart.php" class="inline-block bg-asphalt text-paper font-stencil uppercase px-6 py-3 slab press">Go to cart</a><p class="mt-3 font-mono text-sm font-bold" role="status">Added to your cart.</p>';
  } catch (e) { document.getElementById('msg').textContent = e.message; }
});
</script>
<?php page_end();
