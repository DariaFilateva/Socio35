<?php
function pagination($all, $lim, $prev, $curr_link, $curr_css, $link, $add)
{
    // осуществляем проверку, чтобы выводимые первая и последняя страницы
    // не вышли за границы нумерации
    $first = $curr_link - $prev;
    if ($first < 1) $first = 1;
    $last = $curr_link + $prev;
    if ($last > ceil($all/$lim)) $last = ceil($all/$lim);
 
    // начало вывода нумерации
    // выводим первую страницу
    $y = 1;
    if ($first > 1) echo "<a href='{$link}{$add}page={$y}'>1</a> ";
    // Если текущая страница далеко от 1-й (>10), то часть предыдущих страниц
    // скрываем троеточием
    // Если текущая страница имеет номер до 10, то выводим все номера
    // перед заданным диапазоном без скрытия
    $y = $first - 1;
    if ($first > 4) {
        echo "<a href='{$link}{$add}page={$y}'>...</a> ";
    } else {
        for($i = 2;$i < $first;$i++){
            echo "<a href='{$link}{$add}page={$i}'>$i</a> ";
        }
    }
    // отображаем заданный диапазон: текущая страница +-$prev
    for($i = $first;$i < $last + 1;$i++){
        // если выводится текущая страница, то ей назначается особый стиль css
        if($i == $curr_link) { ?>
 
            <span><?php echo $i; ?></span>
        <?php } else {
            $alink = "<a href='{$link}";
            if($i != 1) $alink .= "{$add}page={$i}";
            $alink .= "'>$i</a> ";
            echo $alink;
        }
    }
    $y = $last + 1;
    // часть страниц скрываем троеточием
    if ($last < ceil($all / $lim) && ceil($all / $lim) - $last > 2) echo "<a href='{$link}{$add}page={$y}'>...</a> ";
    // выводим последнюю страницу
    $e = ceil($all / $lim);
    if ($last < ceil($all / $lim)) echo "<a href='{$link}{$add}page={$e}'>$e</a>";
}
?>