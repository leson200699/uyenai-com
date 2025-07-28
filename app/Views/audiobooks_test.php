<!DOCTYPE html>
<html>
<head>
    <title>Test Audiobooks Data</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .debug { background: #ffffd9; border: 1px solid #e6db55; padding: 15px; margin-bottom: 20px; }
        .book { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Test Audiobooks Data</h1>
    
    <div class="debug">
        <h2>Debug Info:</h2>
        <?php if(isset($debug)): ?>
            <ul>
                <li>Count: <?= $debug['count'] ?></li>
                <li>Model class: <?= $debug['model_class'] ?></li>
                <li>Table: <?= $debug['table'] ?></li>
            </ul>
        <?php endif; ?>
        
        <h3>Raw Data:</h3>
        <pre><?php print_r($audiobooks ?? 'No audiobooks variable'); ?></pre>
    </div>
    
    <h2>Audiobooks List:</h2>
    <?php if (isset($audiobooks) && !empty($audiobooks)): ?>
        <?php foreach ($audiobooks as $book): ?>
            <div class="book">
                <h3><?= $book['title'] ?></h3>
                <p>Author: <?= $book['author'] ?></p>
                <p>Status: <?= $book['status'] ? 'Visible' : 'Hidden' ?></p>
                <p>Created: <?= $book['created_at'] ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No audiobooks found.</p>
    <?php endif; ?>
</body>
</html> 