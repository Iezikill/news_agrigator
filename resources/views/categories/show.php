<?php foreach ($categories as $n): ?>
    <div style="border: 1px solid green">
        <h2><?=$n['title']?></h2>
        <p><?=$n['description']?></p>
        <!--        <p>--><?php //=$n['category_id']?><!--</p>-->
        <div> Category
            <p style = "text-transform: uppercase; margin-top:4px; font-weight: bold"><?=$n['category_name']?></p>
        </div>
        <div><strong><?=$n['author']?> (<?=$n['created_at']?>)</strong></div>
        <a href="<?=route('news.show', ['id' => $n['id']])?>">Далее</a>
    </div>
<?php endforeach; ?>
