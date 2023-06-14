<?php
function ci_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
        echo '<div class="row">';
        echo '<div class="col-lg-12">';
        echo '<div class="ltn__pagination-area text-center">';
        echo '<div class="ltn__pagination">';
        echo "<ul>";
        if($paged > 1) echo "<li><a href='".get_pagenum_link($paged - 1)."'><i class='fas fa-angle-double-left'></i></a></li>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>1</a></li>";
        if($paged > 2+$range) echo "<li><a href='#'>...</a></li>";  
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class='active' ><a href='".get_pagenum_link($i)."'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
            }
        }
        if ($paged+$range+1 < $pages) echo "<li><a href='#'>...</a></li>";  
        if ($paged < $pages-$range &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>".$pages."</a></li>";  
        if ($paged < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'><i class='fas fa-angle-double-right'></i></a></li>";
        echo "</ul>\n";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
     }
}