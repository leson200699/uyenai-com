<?php if ($pager->hasPrevious()): ?>
    <a href="<?= $pager->getPrevious() ?>"
       class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">Trước</a>
<?php endif; ?>

<?php foreach ($pager->links() as $link): ?>
    <?php if ($link['active']): ?>
        <span class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-indigo-600 z-10"><?= $link['title'] ?></span>
    <?php else: ?>
        <a href="<?= $link['uri'] ?>"
           class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-300 hover:bg-gray-50"><?= $link['title'] ?></a>
    <?php endif; ?>
<?php endforeach; ?>

<?php if ($pager->hasNext()): ?>
    <a href="<?= $pager->getNext() ?>"
       class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">Sau</a>
<?php endif; ?> 