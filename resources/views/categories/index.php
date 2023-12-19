<h2>News categories</h2>

<?php foreach ($categories as $item): ?>
    <div style="display: flex">
        <h3 style = "text-transform: uppercase; margin:12px 0px"><?=$item['name']?></h3>
        <a style = "padding-top: 14px; margin-left:12px"
           href="<?=route('news.categories', ['id' => $item['id']])?>">News...</a>
    </div>
<?php endforeach; ?>
