<?php    
   /**  
    * jishujiaocheng
    * @package custom   
    */    
Typecho_Widget::widget('Widget_Stat')->to($stat);
$this->need('header.php');?>   
<main id="main" class="main">
  <div class="main-inner">
    <div id="content" class="content">
 <section id="posts" class="posts-collapse">
      <span class="archive-move-on"></span>

<?php $this->widget('Widget_Archive@fenlei', 'pageSize=10000&type=category','mid=4')->to($archives); 
            $year=0; $mon=0; $i=0; $j=0;        
            while($archives->next()):
            $year_tmp = date('Y',$archives->created);
             $mon_tmp = date('m',$archives->created);
             $y=$year; $m=$mon;
             if ($year != $year_tmp) {   
                 $year = $year_tmp;   
                 //输出年份   
                 $output .= '<div class="collection-title">
             <h2>技术分享 <small>列表</small></h2>
        </div>
        '; //输出年份   
           }   
             //输出文章日期和标题   
            $output .='<article class="post post-type-normal" itemscope itemtype="http://schema.org/Article">
    <header class="post-header">
      <h1 class="post-title">
            <a class="post-title-link" href="'.$archives->permalink .'" itemprop="url">
                <span itemprop="name">'. $archives->title .'</span>
            </a>
      </h1>
      <div class="post-meta">
      <time class="post-time" itemprop="dateCreated" datetime="'.date('c',$archives->created).'" content="'.date('yy-m-d',$archives->created).'">
            '.date('m-d',$archives->created).'
          </time>
      </div>
    </header>
  </article>
  ';
        endwhile;   
        echo $output;   
        ?>
</section>
</div>
</div>
<?php $this->need('sidebar.php'); ?>
</main>
<?php $this->need('footer.php'); ?>