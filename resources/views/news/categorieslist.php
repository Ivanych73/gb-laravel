<h3>News categories</h2>
    <ul>
        <?php foreach ($categoriesList as $value) : ?>
            <li>
                <a href="<?= route('news.list', ['id' => $value['id']]) ?>"><?= $value['title'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>