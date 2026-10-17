<?php
require __DIR__ . '/includes/layout.php';
$notice = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') { csrf_require(); $notice = true; }   // design preview only, nothing is saved

page_start('Log in', 'max-w-xl');
echo h1('Log in');
?>
<form method="post" class="mt-8 space-y-5 bg-charcoal border-2 border-paper/40 p-6 slab">
  <?= csrf_field() ?>
  <?php if ($notice): ?><p class="bg-hazard text-asphalt font-mono font-bold p-3" role="status">Accounts are part of the full build. Nothing was saved.</p><?php endif; ?>
  <label class="block"><span class="font-mono text-sm">Email</span>
    <input name="email" type="email" required autocomplete="email" class="mt-1 w-full bg-asphalt border-2 border-paper/60 px-4 py-3 font-mono focus:border-hazard"></label>
  <label class="block"><span class="font-mono text-sm">Password</span>
    <input name="password" type="password" required autocomplete="current-password" class="mt-1 w-full bg-asphalt border-2 border-paper/60 px-4 py-3 font-mono focus:border-hazard"></label>
  <button class="bg-blood font-stencil uppercase text-lg px-6 py-3 slab press">Log in</button>
  <p class="font-mono text-sm text-paper/70">No account yet? <a class="text-hazard underline" href="register.php">Sign up</a></p>
</form>
<?php page_end();
