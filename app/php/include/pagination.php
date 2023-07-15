<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 9;
$offset= $limit * ($page - 1 );
$ceil = ceil(countRow('amis_ru_goods')/$limit) ;
$goods = selectAllGoodsForPages('amis_ru_goods', $limit, $offset);
?>
<div class="cards__pagination">
    <div class="pagination">

        <div class="pagination__inner">
            <!-- <a class="pagination__arrow pagination__arrow--disabled" href="#">
                <img class="pagination__arrow-icon" src="" alt="arrow-left" />
            </a> -->

            <ul class="pagination__list">

                <?php if($page > 1  AND $page < $ceil): ?>
                    
               
                <li class="pagination__list-item">

                    <a class="pagination__list-num" href="?page=<?=($_GET['page'] - 1);?>"><?=$_GET['page'] - 1;?></a>

                </li>
                <li class="pagination__list-item">

                    <a class="pagination__list-num pagination__list-num--active"
                        href="?page=<?=$_GET['page'];?>"><?=$_GET['page'];?></a>

                </li>
                <li class="pagination__list-item">
                    <a class="pagination__list-num" href="?page=<?=($page +1);?>"><?=$page + 1;?></a>
                </li>

                <a class="pagination__arrow" href="?page=<?=$ceil;?>">
                    <img class="pagination__arrow-icon" src="images/icons/arrow-right.svg" alt="arrow-right" />
                </a>
                <?php elseif($page == 1): ?>
                <li class="pagination__list-item">
                    <a class="pagination__list-num pagination__list-num--active" href="?page=1"><?=$page;?></a>
                </li>
                <li class="pagination__list-item">
                    <a class="pagination__list-num" href="?page=<?=($page +1);?>"><?=$page + 1;?></a>
                </li>
                <li class="pagination__list-item">
                    <a class="pagination__list-num" href="?page=<?=($page +2);?>"><?=$page + 2;?></a>
                </li>
                <a class="pagination__arrow" href="?page=<?=$ceil;?>">
                    <img class="pagination__arrow-icon" src="images/icons/arrow-right.svg" alt="arrow-right" />
                </a>

                <?php elseif($_GET['page'] == $ceil): ?>
                <li class="pagination__list-item">
                    <a class="pagination__list-num" href="?page=<?=($page - 2);?>"><?=$page - 2;?></a>
                </li>
                <li class="pagination__list-item">
                    <a class="pagination__list-num" href="?page=<?=($page - 1);?>"><?=$page - 1;?></a>
                </li>

                <li class="pagination__list-item">
                    <a class="pagination__list-num pagination__list-num--active"
                        href="?page=<?=$ceil;?>"><?=$ceil;?></a>
                </li>

                <?php endif; ?>


            </ul>

        </div>
    </div>
</div>