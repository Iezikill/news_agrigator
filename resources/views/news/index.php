<?php foreach ($news as $n): ?>
    <div style="border: 1px solid green">
        <h2><?=$n['title']?></h2>
        <p><?=$n['description']?></p>
        <div style = "margin-bottom:16px; font-weight: bold"> Category
            <a
               href="<?=route('news.categories', ['id' => $n['category_id']])?>"
               style = "text-transform: uppercase; margin-top:4px; font-weight: bold">
                   <?=$n['category_name']?>
           </a>
        </div>
        <div style = "margin-bottom:6px"><strong><?=$n['author']?> (<?=$n['created_at']?>)</strong></div>
        <a style = "display:block; margin-bottom:10px" href="<?=route('news.show', ['id' => $n['id']])?>">Далее</a>
    </div>
<?php endforeach; ?>
