<?php


return <<<REGEXP
[
  {
    "t": "工作台",
    "url": "admin/page/desktop"
  },
  {
    "t": "分类设置",
    "url": "",
    "child": [
      {
        "t": "文章分类",
        "url": "admin/class/article.html?cate_id=6"
      },
      {
        "t": "客户分类",
        "url": "admin/class/article.html?cate_id=7"
      },
      {
        "t": "产品分类",
        "url": "admin/class/article.html?cate_id=1"
      },
      {
        "t": "演示分类",
        "url": "admin/class/article.html?cate_id=2"
      },
      {
        "t": "问题分类",
        "url": "admin/class/article.html?cate_id=3"
      },
      {
        "t": "工程案例分类",
        "url": "admin/class/article.html?cate_id=5"
      },
      {
        "t": "资料分类",
        "url": "admin/class/article.html?cate_id=8"
      }
    ]
  },
  {
    "t": "文章管理",
    "url": "",
    "child": [
      {
        "t": "文章列表",
        "url": "article/list.html"
      }
    ]
  },
  {
    "t": "用户管理",
    "url": "",
    "child": [
      {
        "t": "用户列表",
        "url": "userManage/list.html"
      }
    ]
  },
  {
    "t": "客户管理",
    "url": "",
    "child": [
      {
        "t": "客户列表",
        "url": "clientManage/list.html"
      }
    ]
  },
  {
    "t": "团队管理",
    "url": "",
    "child": [
      {
        "t": "团队成员列表",
        "url": "team/list.html"
      }
    ]
  },
  {
    "t": "解决方案",
    "url": "",
    "child": [
      {
        "t": "方案列表",
        "url": "solution/list.html"
      }
    ]
  },
  {
    "t": "产品管理",
    "url": "",
    "child": [
      {
        "t": "产品列表",
        "url": "product/list.html"
      }
    ]
  },
  {
    "t": "产品演示",
    "url": "",
    "child": [
      {
        "t": "产品演示列表",
        "url": "productdemo/list.html"
      }
    ]
  },
  {
    "t": "常见问题管理",
    "url": "",
    "child": [
      {
        "t": "常见问题列表",
        "url": "question/list.html"
      }
    ]
  },
  {
    "t": "工程案例管理",
    "url": "",
    "child": [
      {
        "t": "工程案例列表",
        "url": "projectcase/list.html"
      }
    ]
  },
  {
    "t": "资料下载管理",
    "url": "",
    "child": [
      {
        "t": "资料列表",
        "url": "profiledownload/list.html"
      }
    ]
  },
  {
    "t": "蓝科生活相册",
    "url": "",
    "child": [
      {
        "t": "相册列表",
        "url": "life/list.html"
      }
    ]
  },
  {
    "t": "首页案例展示",
    "url": "",
    "child": [
      {
        "t": "首页案例列表",
        "url": "indexdemo/list.html"
      }
    ]
  },
  {
    "t": "会员案例管理",
    "url": "",
    "child": [
      {
        "t": "会员案例列表",
        "url": "vip/list.html"
      }
    ]
  },
  {
    "t": "会员产品管理",
    "url": "",
    "child": [
      {
        "t": "会员产品列表",
        "url": "vipproduction/list.html"
      }
    ]
  }
]
REGEXP;
