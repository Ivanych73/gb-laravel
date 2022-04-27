<h3>All news in category <?= $categoryTitle ?></h3>
<ul>
    <?php foreach ($newsList as $value) : ?>
        <li>
            <ul>
                <li><a href="<?= route('news.detail', ['id' => $value['id']]) ?>"><?= $value['title'] ?></a></li>
                <li><?= $value['author'] ?></li>
                <li><?= $value['annotation'] ?></li>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>