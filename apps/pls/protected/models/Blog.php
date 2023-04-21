<?php
/**
 * Created by Josh L. Rogers.
 * Copyright (c) 2023 All Rights Reserved.
 * 4/21/23
 *
 * Blog.php
 *
 *
 *
 **/

class Blog extends CFormModel
{
    public static function getUpdates()
    {
        $blog	            = simplexml_load_file('https://supereval.com/blog/category/supereval-updates/feed');
        $content            = null;
        $blog_slider_count  = Yii::app()->params['blogSliderCount'];

        for ($i = 0; $i < $blog_slider_count; $i++) {
            $content .= '
				<div class="col-md-6"><div class="bubble">' . ($i+1) . '. <a href="' . $blog->channel->item[$i]->link . '">' . $blog->channel->item[$i]->title . '</a></div></div>
			';
        }

        return $content;
    }

    public static function getLatestBlog()
    {
        $blog	    	= simplexml_load_file('https://supereval.com/blog/feed');
        $content    	= null;
        $link			= $blog->channel->item[0]->link;
        $title			= $blog->channel->item[0]->title;
        $description	= $blog->channel->item[0]->description;

        $content .= '
            <h3><a style="color: white;" href="' . $link . '">' . $title . '</a></h3>
            <div class="row"><div class="col-md-12 bubble">' . $description . '</div></div>
        ';

        return $content;
    }
}