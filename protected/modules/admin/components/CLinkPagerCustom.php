<?php

class CLinkPagerCustom extends CLinkPager
{

    protected function createPageUrl($page)
    {
        return "#" . ltrim($this->getPages()->createPageUrl($this->getController(),$page),'/');
    }

}