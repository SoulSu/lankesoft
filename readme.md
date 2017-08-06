


### TODO

1. 会员案例管理
2. 会员产品管理
3. 需要将所有上传的接口加上form参数 `thumbnail` 缩略图
4. 管理员退出时需要刷新


### 分页代码

```
<div class="row">
    <div class="col-sm-12 text-center">
        <!--分页 S-->
        <div class="pager">
        <?php $this->widget('CLinkPagerCustom',array(
            'header' => '',
            'firstPageLabel' => '首页',
            'lastPageLabel' => '最后一页',
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'pages' => $pages,
            'maxButtonCount'=>3,
            'htmlOptions' =>array('class'=>''),
            'nextPageCssClass' => '',
            'previousPageCssClass' => '',
        ));?>
        </div>
        <!--分页 E-->
    </div>
</div>
```

### 省市区接口

1. 获取所有 `admin/comm/area`
2. 省份 `admin/comm/provice`
3. 城市份 `admin/comm/city?proviceId=5400`